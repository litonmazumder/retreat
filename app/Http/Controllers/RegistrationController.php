<?php

namespace App\Http\Controllers;

use App\Mail\ParticipantOtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
use App\Models\Participant;
use App\Models\ParticipantOtp;

class RegistrationController extends Controller
{

    public function create()
    {
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                'unique:participants,email',
                function ($attribute, $value, $fail) {

                    $value = strtolower($value);

                    $allowedDomains = [
                        '@swisscontact.org',
                        '@swisscont.onmicrosoft.com',
                    ];

                    foreach ($allowedDomains as $domain) {
                        if (str_ends_with($value, $domain)) {
                            return;
                        }
                    }

                    $fail('Only Swisscontact email addresses are allowed.');
                },
            ],
            'designation' => 'nullable|string|max:150',
            'region' => 'required|string|max:100',
        ]);

        DB::beginTransaction();

        try {

            $event = Event::latest()->firstOrFail();

            Participant::create([
                'event_id'      => $event->id,
                'uuid'          => Str::uuid(),
                'first_name'    => $validated['first_name'],
                'last_name'     => $validated['last_name'],
                'email'         => strtolower($validated['email']),
                'designation'   => $validated['designation'] ?? null,
                'region'       => $validated['region'],
                'status'        => 'Active',
            ]);

            DB::commit();

            return redirect()
                ->route('participant.register')
                ->with('success', 'Participant registered successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Failed to register participant.');
        }
    }

    public function success(Participant $participant)
    {
        return view('registration.success', compact('participant'));
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([

    //         'first_name' => 'required|string|max:100',

    //         'last_name' => 'required|string|max:100',

    //         'email' => [
    //             'required',
    //             'email',
    //             'unique:participants,email',
    //             function ($attribute, $value, $fail) {

    //                 $value = strtolower($value);

    //                 $allowedDomains = [
    //                     '@swisscontact.org',
    //                     '@swisscont.onmicrosoft.com',
    //                 ];

    //                 foreach ($allowedDomains as $domain) {

    //                     if (str_ends_with($value, $domain)) {
    //                         return;
    //                     }
    //                 }

    //                 $fail('Only Swisscontact email addresses are allowed to register.');
    //             },
    //         ],

    //         'designation' => 'nullable|max:150',

    //         'project_name' => 'nullable|max:150',

    //         'country' => 'required|max:100',

    //     ]);

    //     DB::beginTransaction();

    //     try {

    //         $event = Event::latest()->firstOrFail();

    //         $participant = Participant::create([
    //             'event_id' => $event->id,
    //             'uuid' => Str::uuid(),
    //             'first_name' => $validated['first_name'],
    //             'last_name' => $validated['last_name'],
    //             'email' => strtolower($validated['email']),
    //             'designation' => $validated['designation'],
    //             'project_name' => $validated['project_name'],
    //             'country' => $validated['country'],
    //             'status' => 'Active',
    //         ]);

    //         $otp = random_int(1000, 9999);

    //         $participant->otps()->create([
    //             'otp_hash' => Hash::make($otp),
    //             'expires_at' => now()->addMinutes(10),
    //         ]);

    //         DB::commit();

    //         Mail::to($participant->email)
    //             ->queue(new ParticipantOtpMail($participant, $otp));

    //         return redirect()->route('registration.verify', $participant->uuid);

    //         } 

    //     catch (\Throwable $e) {

    //         DB::rollBack();

    //         dd($e->getMessage());
    //     }
    // }

    // public function showVerifyForm($uuid)
    // {
    //     $participant = Participant::where('uuid', $uuid)->firstOrFail();

    //     return view('registration.verify', compact('participant'));
    // }

    // public function verifyOtp(Request $request, string $uuid)
    // {
    //     $request->validate([
    //         'otp' => 'required|digits:4',
    //     ]);

    //     $participant = Participant::where('uuid', $uuid)->firstOrFail();

    //     if ($participant->email_verified_at) {
    //         return redirect()
    //             ->route('registration.success')
    //             ->with('success', 'Your email has already been verified.');
    //     }

    //     $otpRecord = $participant->otps()
    //         ->whereNull('verified_at')
    //         ->latest()
    //         ->first();

    //     if (! $otpRecord) {
    //         return back()->withErrors([
    //             'otp' => 'No active verification code found. Please request a new OTP.',
    //         ]);
    //     }

    //     if (now()->greaterThan($otpRecord->expires_at)) {
    //         return back()->withErrors([
    //             'otp' => 'Your verification code has expired. Please request a new OTP.',
    //         ]);
    //     }

    //     if (! Hash::check($request->otp, $otpRecord->otp)) {
    //         return back()->withErrors([
    //             'otp' => 'The verification code you entered is incorrect.',
    //         ]);
    //     }

    //     DB::transaction(function () use ($participant, $otpRecord) {

    //         $participant->update([
    //             'email_verified_at' => now(),
    //             'registration_status' => 'Approved',
    //         ]);

    //         $otpRecord->update([
    //             'verified_at' => now(),
    //         ]);

    //     });

    //     Mail::to($participant->email)
    //         ->queue(new ParticipantPassMail($participant));

    //     return redirect()->route('registration.success');
    // }
    
}
