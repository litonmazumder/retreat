<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Attendance;
use App\Models\Participant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function participants()
    {
        $participants = Participant::with('attendances')
            ->orderBy('region')
            ->orderBy('first_name')
            ->paginate(25);

        return view('admin.participants.index', compact('participants'));
    }

    public function attendance()
    {
            $participants = Participant::with('attendances')
            ->orderBy('region')
            ->orderBy('first_name')
            ->paginate(25);

        return view('admin.attendance.index', compact('participants'));
    }

    public function createParticipant()
    {
        return view('admin.participants.create');
    }

    public function storeParticipant(Request $request)
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
            // 'project_name' => 'nullable|string|max:150',
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
                // 'project_name'  => $validated['project_name'] ?? null,
                'region'        => $validated['region'],
                'status'        => 'Active',
            ]);

            DB::commit();

            return redirect()
                ->route('admin.participants.create')
                ->with('success', 'Participant registered successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Failed to register participant.');
        }
    }
}
