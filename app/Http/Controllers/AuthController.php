<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\ParticipantOtpMail;
use App\Models\Participant;
use App\Models\ParticipantOtp;

class AuthController extends Controller
{
        public function login()
        {
            return view('auth.login');
        }

        public function authenticate(Request $request)
        {
            $validated = $request->validate([
                    'email' => [
                        'required',
                        'email',
                        function ($attribute, $value, $fail) {

                            $value = Str::lower($value);

                            $allowedDomains = [
                                '@swisscontact.org',
                                '@swisscont.onmicrosoft.com',
                            ];

                            $allowedEmails = [
                                'rhitchins@springfieldcentre.com',
                            ];

                            // Allow specific email addresses
                            if (in_array($value, $allowedEmails, true)) {
                                return;
                            }

                            // Allow approved domains
                            foreach ($allowedDomains as $domain) {
                                if (str_ends_with($value, $domain)) {
                                    return;
                                }
                            }

                            $fail('Please enter your Swisscontact email.');
                        },
                    ],
                ]);

            $participant = Participant::where(
                'email',
                Str::lower($validated['email'])
            )->first();

            if (! $participant) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'email' => 'This email address is not registered for the event.',
                    ]);
            }

            $otp = random_int(1000, 9999);

            $participant->otps()->create([
                'otp_hash' => Hash::make($otp),
                'expires_at' => now()->addMinutes(10),
            ]);

            Mail::to($participant->email)
                ->queue(
                    (new ParticipantOtpMail($participant, $otp))
                        ->onQueue('otp')
                );

            return redirect()->route('auth.verify', $participant);
        }

        public function resendOtp(Participant $participant)
        {
            // Prevent abuse (one resend every 60 seconds)
            $lastOtp = $participant->otps()->latest()->first();

            if ($lastOtp && $lastOtp->created_at->gt(now()->subSeconds(60))) {
                return back()->withErrors([
                    'otp' => 'Please wait 60 seconds before requesting another verification code.',
                ]);
            }

            // Remove previous OTPs
            $participant->otps()->delete();

            // Generate new OTP
            $otp = random_int(1000, 9999);

            $participant->otps()->create([
                'otp_hash'   => Hash::make($otp),
                'expires_at' => now()->addMinutes(10),
            ]);

            Mail::to($participant->email)
                ->queue(
                    (new ParticipantOtpMail($participant, $otp))
                        ->onQueue('otp')
                );

            return back()->with('success', 'A new verification code has been sent to your email address.');
        }

        public function showVerifyForm($uuid)
        {
            $participant = Participant::where('uuid', $uuid)->firstOrFail();
            return view('auth.verify', compact('participant'));
        }

        public function verifyOtp(Request $request, $uuid)
        {
            $participant = Participant::where('uuid', $uuid)->firstOrFail();
            $request->validate([
                'otp' => ['required', 'digits:4'],
            ]);

            if ($participant->email_verified_at) {
                return redirect()
                    ->route('dashboard')
                    ->with('success', 'Your email has already been verified.');
            }

            // dd(
            //     $participant->id,
            //     $participant->uuid,
            //     $participant->otps()->get()->toArray()
            // );

            $otpRecord = $participant->otps()
                ->whereNull('verified_at')
                ->latest()
                ->first();

            if (! $otpRecord) {
                return back()->withErrors([
                    'otp' => 'No active verification code found. Please request a new OTP.',
                ]);
            }

            if (now()->greaterThan($otpRecord->expires_at)) {
                return back()->withErrors([
                    'otp' => 'Your verification code has expired. Please request a new OTP.',
                ]);
            }

            if (! Hash::check($request->otp, $otpRecord->otp_hash)) {
                return back()->withErrors([
                    'otp' => 'The verification code you entered is incorrect.',
                ]);
            }

            DB::transaction(function () use ($participant, $otpRecord) {

                $participant->update([
                    'email_verified_at' => now(),
                ]);

                $otpRecord->update([
                    'verified_at' => now(),
                ]);
            });

            // Store participant in the session
            $request->session()->regenerate();
            $request->session()->put('participant_uuid', $participant->uuid);

            if (! $participant->profile_confirmed) {
                return redirect()->route('participant.details');
            }

            return redirect()->route('dashboard');
        }

        // public function resendOtp(Request $request)
        // {
        //     $request->validate([
        //         'email' => 'required|email',
        //     ]);

        //     $participant = Participant::where('email', $request->email)->first();

        //     if (!$participant) {

        //         return back()->withErrors([
        //             'email' => 'No registration was found with this email address.'
        //         ])->withInput();
        //     }

        //     Mail::to($participant->email)
        //             ->queue(new ParticipantPassMail($participant, true));

        //     return back()->with(
        //         'success',
        //         'Your participant ID has been resent successfully. Please check your inbox and spam/junk folder.'
        //     );
        // }


        public function infoDetails(Request $request)
        {
            $participant = $request->attributes->get('participant');

            return view('participant.info', compact('participant'));
        }

        public function confirmProfile(Request $request)
        {
            $participant = $request->attributes->get('participant');

            $participant->update([
                'profile_confirmed' => 1,
            ]);

            return redirect()->route('dashboard');
        }

        public function logout(Request $request)
        {
            $request->session()->forget('participant_uuid');

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()
                ->route('auth.login')
                ->with('success', 'You have been logged out successfully.');
        }
}
