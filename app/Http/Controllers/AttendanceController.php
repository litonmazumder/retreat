<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required|integer|min:1|max:3',
        ]);

        $participant = $request->attributes->get('participant');

        $alreadySubmitted = Attendance::where('participant_id', $participant->id)
            ->where('day', $request->day)
            ->exists();

        if ($alreadySubmitted) {
            return back()->with('error', 'Attendance has already been submitted.');
        }

        Attendance::create([
            'participant_id' => $participant->id,
            'day' => $request->day,
            'checked_in_at' => now(),
        ]);

        return back()->with('success', 'Attendance confirmed successfully.');
    }

    public function attendanceCheck(Request $request)
    {
        $participant = $request->attributes->get('participant');

        $alreadySubmitted = Attendance::where('participant_id', $participant->id)
            ->where('day', $participant->day)
            ->exists();

        return view('participant.dashboard', compact(
            'participant',
            'alreadySubmitted'
        ));
    }

    public function export()
    {
        $participants = Participant::with('attendances')
            ->orderBy('first_name')
            ->get();

        $filename = 'attendance-report-' . now()->format('Y-m-d-His') . '.csv';

        return response()->streamDownload(function () use ($participants) {

            $handle = fopen('php://output', 'w');

            // UTF-8 BOM so Excel displays characters correctly
            fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($handle, [
                '#',
                'Participant',
                'Designation',
                'Country',
                'Day 1',
                'Day 1 Time',
                'Day 2',
                'Day 2 Time',
                'Attendance',
            ]);

            foreach ($participants as $index => $participant) {

                $day1 = $participant->attendances
                    ->firstWhere('day', 1);

                $day2 = $participant->attendances
                    ->firstWhere('day', 2);

                $total = collect([
                    $day1,
                    $day2,
                ])->filter()->count();

                $percentage = ($total / 2) * 100;

                fputcsv($handle, [
                    $index + 1,

                    trim(
                        $participant->first_name . ' ' .
                        $participant->last_name
                    ),

                    $participant->designation,

                    $participant->region,

                    $day1 ? 'Present' : 'Absent',

                    $day1?->checked_in_at
                        ? Carbon::parse(
                            $day1->checked_in_at
                        )->format('H:i')
                        : '',

                    $day2 ? 'Present' : 'Absent',

                    $day2?->checked_in_at
                        ? Carbon::parse(
                            $day2->checked_in_at
                        )->format('H:i')
                        : '',

                    $percentage . '%',
                ]);
            }

            fclose($handle);

        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
