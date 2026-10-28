<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarnivalActivity;
use App\Models\Participant;
use Illuminate\Support\Facades\DB;

class CarnivalController extends Controller
{



    public function show(string $activity)
    {
        $participantUuid = session('participant_uuid');

        abort_unless($participantUuid, 403, 'Participant session not found.');

        $participant = Participant::where('uuid', $participantUuid)
            ->firstOrFail();

        $activityRecord = CarnivalActivity::where('event_id', 1)
            ->where('slug', $activity)
            ->where('is_active', true)
            ->firstOrFail();

        // Get the participant's assigned activity and wave.
        $eligibility = DB::table('carnival_eligibilities')
            ->where('participant_id', $participant->id)
            ->where('activity_id', $activityRecord->id)
            ->first();

        $wave = $eligibility->wave ?? null;

        // Get the session schedule from carnival_activities.
        $start_time = null;
        $end_time = null;

        if ($activityRecord->session_date && $wave === 'wave_1') {
            $startTimeValue = $activityRecord->wave_1_start_time;
            $endTimeValue = $activityRecord->wave_1_end_time;
        } elseif ($activityRecord->session_date && $wave === 'wave_2') {
            $startTimeValue = $activityRecord->wave_2_start_time;
            $endTimeValue = $activityRecord->wave_2_end_time;
        } else {
            $startTimeValue = null;
            $endTimeValue = null;
        }

        if ($activityRecord->session_date && $startTimeValue && $endTimeValue) {
            $start_time = \Illuminate\Support\Carbon::parse(
                $activityRecord->session_date . ' ' . $startTimeValue,
                'Asia/Dhaka'
            );

            $end_time = \Illuminate\Support\Carbon::parse(
                $activityRecord->session_date . ' ' . $endTimeValue,
                'Asia/Dhaka'
            );
        }

        // Check whether the participant facilitates this activity.
        $isFacilitator = DB::table('carnival_activity_facilitator')
            ->where('participant_id', $participant->id)
            ->where('activity_id', $activityRecord->id)
            ->exists();

        $facilitators = $activityRecord->assignedFacilitators()
            ->select(
                'participants.id',
                'participants.first_name',
                'participants.last_name'
            )
            ->orderBy('participants.first_name')
            ->get();

        // Get this participant's attendance confirmation.
        $attendance = DB::table('carnival_attendances')
            ->where('participant_id', $participant->id)
            ->where('activity_id', $activityRecord->id)
            ->first();

        $confirmed = $attendance !== null
            && $attendance->confirmed_at !== null;

        $wave1Participants = collect();
        $wave2Participants = collect();

        // Facilitators can view participant lists for their activity.
        if ($isFacilitator) {
            $getWaveParticipants = function (string $wave) use ($activityRecord) {
                return DB::table('carnival_eligibilities as ce')
                    ->join(
                        'participants as p',
                        'p.id',
                        '=',
                        'ce.participant_id'
                    )
                    ->leftJoin('carnival_attendances as ca', function ($join) {
                        $join->on('ca.participant_id', '=', 'ce.participant_id')
                            ->on('ca.activity_id', '=', 'ce.activity_id');
                    })
                    ->where('ce.activity_id', $activityRecord->id)
                    ->where('ce.wave', $wave)
                    ->select([
                        'p.id',
                        'p.first_name',
                        'p.last_name',
                        'p.email',
                        'ca.confirmed_at',
                        'ca.attended_at',
                    ])
                    ->orderBy('p.first_name')
                    ->orderBy('p.last_name')
                    ->get();
            };

            $wave1Participants = $getWaveParticipants('wave_1');
            $wave2Participants = $getWaveParticipants('wave_2');
        }

        return view('dashboard.carnival.show', [
            'participant' => $participant,
            'activity' => $activityRecord,
            'eligibility' => $eligibility,
            'wave' => $wave,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'facilitators' => $facilitators,
            'confirmed' => $confirmed,
            'isFacilitator' => $isFacilitator,
            'wave1Participants' => $wave1Participants,
            'wave2Participants' => $wave2Participants,
        ]);
    }



    public function confirmAttendance(string $activity)
    {
        $participantUuid = session('participant_uuid');

        abort_unless($participantUuid, 403, 'Participant session not found.');

        $participant = Participant::where('uuid', $participantUuid)
            ->firstOrFail();

        $activityRecord = CarnivalActivity::where('event_id', 1)
            ->where('slug', $activity)
            ->where('is_active', true)
            ->firstOrFail();

        // Verify that the participant is assigned to this activity
        // and retrieve their assigned wave.
        $eligibility = DB::table('carnival_eligibilities')
            ->where('participant_id', $participant->id)
            ->where('activity_id', $activityRecord->id)
            ->first();

        abort_unless(
            $eligibility,
            403,
            'You are not assigned to this activity.'
        );

        // Get the session date and wave-specific times from carnival_activities.
        $sessionDate = $activityRecord->session_date;
        $wave = $eligibility->wave;

        abort_unless(
            $sessionDate && in_array($wave, ['wave_1', 'wave_2'], true),
            403,
            'The session schedule is unavailable.'
        );

        if ($wave === 'wave_1') {
            $startTime = $activityRecord->wave_1_start_time;
            $endTime = $activityRecord->wave_1_end_time;
        } else {
            $startTime = $activityRecord->wave_2_start_time;
            $endTime = $activityRecord->wave_2_end_time;
        }

        abort_unless(
            $startTime && $endTime,
            403,
            'The session schedule is unavailable.'
        );

        // Combine DATE and TIME using the Dhaka timezone.
        $startDateTime = \Illuminate\Support\Carbon::parse(
            $sessionDate . ' ' . $startTime,
            'Asia/Dhaka'
        );

        $endDateTime = \Illuminate\Support\Carbon::parse(
            $sessionDate . ' ' . $endTime,
            'Asia/Dhaka'
        );

        $now = now('Asia/Dhaka');

        // The confirmation window opens at the start time.
        if ($now->lt($startDateTime)) {
            return redirect()->back()->with(
                'error',
                'Attendance confirmation opens at ' .
                $startDateTime->format('d M Y, h:i A') . '.'
            );
        }

        // The confirmation window closes at the end time.
        if ($now->gte($endDateTime)) {
            return redirect()->back()->with(
                'error',
                'The attendance confirmation window has closed.'
            );
        }

        // Check for an existing attendance record.
        $attendance = DB::table('carnival_attendances')
            ->where('participant_id', $participant->id)
            ->where('activity_id', $activityRecord->id)
            ->first();

        if ($attendance) {
            // Do not overwrite an existing confirmation or actual attendance.
            if ($attendance->confirmed_at !== null) {
                return redirect()->back()->with(
                    'success',
                    'Your attendance has already been confirmed.'
                );
            }

            DB::table('carnival_attendances')
                ->where('participant_id', $participant->id)
                ->where('activity_id', $activityRecord->id)
                ->update([
                    'confirmed_at' => $now,
                ]);
        } else {
            DB::table('carnival_attendances')->insert([
                'participant_id' => $participant->id,
                'activity_id' => $activityRecord->id,
                'confirmed_at' => $now,
                'attended_at' => null,
            ]);
        }

        return redirect()->back()->with(
            'success',
            'Your attendance confirmation has been recorded successfully.'
        );
    }



}
