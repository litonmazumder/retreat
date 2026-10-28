<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Feedback;
use App\Models\Participant;
use App\Models\CarnivalActivity;
use App\Services\RetreatMoodService;
use Carbon\Carbon;

class HomeController extends Controller
{

    // public function dashboard(Request $request)
    // {
    //     $participant = $request->attributes->get('participant');

    //     $currentDay = match (today()->toDateString()) {
    //             '2026-11-03' => 1,
    //             '2026-11-04' => 2,
    //             '2026-11-05' => 3,
    //             default => 1,
    //         };

    //         $seminarDays = [
    //         1 => Carbon::create(2026, 11, 3),
    //         2 => Carbon::create(2026, 11, 4),
    //         3 => Carbon::create(2026, 11, 5),
    //     ];    

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Attendance Opening Time
    //     |--------------------------------------------------------------------------
    //     */

    //     $attendanceOpen = [
    //         1 => Carbon::create(2026, 11, 4, 8, 30, 0),
    //         2 => Carbon::create(2026, 11, 5, 8, 30, 0),
    //     ];

    //     $attendanceClose = [
    //         1 => Carbon::create(2026, 11, 4, 17, 0, 0),
    //         2 => Carbon::create(2026, 11, 5, 17, 0, 0),
    //     ];

    //     $attendanceStatus = [];

    //     foreach ($attendanceOpen as $day => $openAt) {

    //         $closeAt = $attendanceClose[$day];

    //         $submitted = Attendance::where('participant_id', $participant->id)
    //             ->where('day', $day)
    //             ->whereDate('checked_in_at', $openAt)
    //             ->exists();

    //         $attendanceStatus[$day] = [
    //             'submitted' => $submitted,
    //             'enabled' => now()->greaterThanOrEqualTo($openAt)
    //                 && now()->lessThan($closeAt),
    //             'date' => $openAt->format('d M'),
    //         ];
    //     }

    //     $feedback = Feedback::where('event_id', $participant->event_id)
    //         ->where('status', 'Open')
    //         ->first();

    //     $mood = app(RetreatMoodService::class)
    //         ->forParticipant($participant);    

    //     return view('dashboard.index', compact(
    //         'participant',
    //         'attendanceStatus',
    //         'currentDay',
    //         'seminarDays',
    //         'mood',
    //         'feedback'
    //     ));
    // }

    
    public function dashboard(Request $request)
    {
        $participant = $request->attributes->get('participant');

        $timezone = 'Asia/Dhaka';
        $now = now($timezone);

        $currentDay = match ($now->toDateString()) {
            '2026-11-03' => 1,
            '2026-11-04' => 2,
            '2026-11-05' => 3,
            default => 1,
        };

        $seminarDays = [
            1 => Carbon::parse('2026-11-03', $timezone),
            2 => Carbon::parse('2026-11-04', $timezone),
            3 => Carbon::parse('2026-11-05', $timezone),
        ];

        /*
        |--------------------------------------------------------------------------
        | Retreat Schedule
        |--------------------------------------------------------------------------
        */

        $schedules = \App\Models\RetreatSchedule::where(
            'event_id',
            $participant->event_id
        )
            ->where('is_active', true)
            ->orderBy('schedule_date')
            ->orderBy('sort_order')
            ->orderBy('start_time')
            ->get()
            ->groupBy(fn ($schedule) => $schedule->schedule_date->format('Y-m-d'));

        /*
        |--------------------------------------------------------------------------
        | Attendance Opening Time
        |--------------------------------------------------------------------------
        */

        $attendanceOpen = [
            1 => Carbon::parse('2026-11-04 08:30:00', $timezone),
            2 => Carbon::parse('2026-11-05 08:30:00', $timezone),
        ];

        $attendanceClose = [
            1 => Carbon::parse('2026-11-04 17:00:00', $timezone),
            2 => Carbon::parse('2026-11-05 17:00:00', $timezone),
        ];

        $attendanceStatus = [];

        foreach ($attendanceOpen as $day => $openAt) {
            $closeAt = $attendanceClose[$day];

            $submitted = Attendance::where('participant_id', $participant->id)
                ->where('day', $day)
                ->whereDate('checked_in_at', $openAt->toDateString())
                ->exists();

            $attendanceStatus[$day] = [
                'submitted' => $submitted,
                'enabled' => $now->greaterThanOrEqualTo($openAt)
                    && $now->lessThan($closeAt),
                'date' => $openAt->format('d M'),
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Feedback
        |--------------------------------------------------------------------------
        */

        $feedback = Feedback::where('event_id', $participant->event_id)
            ->where('status', 'Open')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Participant Mood
        |--------------------------------------------------------------------------
        */

        return view('dashboard.index', compact(
            'participant',
            'attendanceStatus',
            'currentDay',
            'seminarDays',
            'schedules',
            'feedback'
        ));
    }


    public function info(Request $request)
    {
        $participant = $request->attributes->get('participant');

        return view('dashboard.info', compact('participant'));
    }

    
    public function index()
    {
        $participantUuid = session('participant_uuid');

        abort_unless($participantUuid, 403, 'Participant session not found.');

        $participant = Participant::where('uuid', $participantUuid)
            ->firstOrFail();

        // Display all active Carnival activities to everyone
        $activities = CarnivalActivity::where('event_id', 1)
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        // Check whether this participant is a facilitator
        $facilitatedActivities = $participant->facilitatedActivities()
            ->where('carnival_activities.event_id', 1)
            ->where('carnival_activities.is_active', true)
            ->get()
            ->keyBy('slug');

        if ($facilitatedActivities->isNotEmpty()) {
            // Facilitators: only their designated activities are eligible
            $assignedActivities = $facilitatedActivities;
        } else {
            // Regular participants: use their wave-based assignments
            $assignedActivities = $participant->carnivalActivities()
                ->where('carnival_activities.event_id', 1)
                ->where('carnival_activities.is_active', true)
                ->get()
                ->keyBy('slug');
        }

        return view('dashboard.carnival', compact(
            'participant',
            'activities',
            'assignedActivities'
        ));
    }


    public function feedback(Request $request)
    {
        $participant = $request->attributes->get('participant');

        return view('dashboard.feedback', compact('participant'));
    }

}
