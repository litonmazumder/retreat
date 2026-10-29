<?php

namespace App\Http\Controllers;

use App\Models\RetreatRechargeClaim;
use App\Models\RetreatSchedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class RetreatRechargeController extends Controller
{
    public function claim(Request $request, int $scheduleId): JsonResponse
    {
        // Use the participant established by your existing auth middleware.
        $participant = $request->attributes->get('participant');

        if (!$participant) {
            return response()->json([
                'message' => 'Please log in to claim recharge points.',
            ], 401);
        }

        $now = Carbon::now('Asia/Dhaka');

        $result = DB::transaction(function () use (
            $participant,
            $scheduleId,
            $now
        ) {
            // Lock this schedule row so simultaneous claims are ranked safely.
            $schedule = RetreatSchedule::whereKey($scheduleId)
                ->lockForUpdate()
                ->first();

            if (!$schedule || !$schedule->is_active) {
                throw ValidationException::withMessages([
                    'schedule' => 'This session is unavailable.',
                ]);
            }

            // Eligibility is controlled entirely by the database.
            if (!$schedule->recharge_enabled) {
                throw ValidationException::withMessages([
                    'schedule' => 'Recharge is not enabled for this session.',
                ]);
            }

            // Participants may claim only sessions belonging to their event.
            if ((int) $schedule->event_id !== (int) $participant->event_id) {
                throw ValidationException::withMessages([
                    'schedule' => 'This session does not belong to your event.',
                ]);
            }

            if ($participant->status !== 'Active') {
                throw ValidationException::withMessages([
                    'participant' => 'Your participant account is inactive.',
                ]);
            }

            $sessionEnd = Carbon::parse(
                $schedule->schedule_date->format('Y-m-d') . ' ' .
                $schedule->end_time,
                'Asia/Dhaka'
            );

            $claimDeadline = $sessionEnd->copy()->addMinutes(5);

            if ($now->lt($sessionEnd) || $now->gt($claimDeadline)) {
                throw ValidationException::withMessages([
                    'claim' => 'The recharge window is closed.',
                ]);
            }

            // A participant can claim this schedule only once.
            $alreadyClaimed = RetreatRechargeClaim::where(
                'participant_id',
                $participant->id
            )->where('schedule_id', $schedule->id)->exists();

            if ($alreadyClaimed) {
                throw ValidationException::withMessages([
                    'claim' => 'You have already claimed this session.',
                ]);
            }

            // The schedule lock serializes ranking for this session.
            $rank = RetreatRechargeClaim::where(
                'schedule_id',
                $schedule->id
            )->count() + 1;

            $points = match (true) {
                $rank === 1 => 10,
                $rank === 2 => 8,
                $rank === 3 => 6,
                $rank <= 10 => 5,
                default => 2,
            };

            $claim = RetreatRechargeClaim::create([
                'participant_id' => $participant->id,
                'schedule_id' => $schedule->id,
                'points' => $points,
                'claim_rank' => $rank,
                'claimed_at' => $now,
            ]);

            return [
                'rank' => $rank,
                'points' => $points,
                'claimed_at' => $claim->claimed_at,
            ];
        }, 3);

        return response()->json([
            'message' => 'Recharge claimed successfully!',
            'rank' => $result['rank'],
            'points' => $result['points'],
            'claimed_at' => $result['claimed_at'],
        ]);
    }
}
