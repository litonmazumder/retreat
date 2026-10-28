<?php

namespace App\Services;

use App\Models\Participant;
use Illuminate\Support\Carbon;

class RetreatMoodService
{
    public function forParticipant(Participant $participant): array
    {
        $timezone = config('retreat.timezone', 'Asia/Dhaka');
        $now = now($timezone);

        // 1. Activity-specific mood takes priority.
        $activities = $participant->carnivalActivities()
            ->where('carnival_activities.event_id', config('retreat.event_id', 1))
            ->where('carnival_activities.is_active', true)
            ->get();

        foreach ($activities as $activity) {
            if (!$activity->session_date) {
                continue;
            }

            $wave = $activity->pivot->wave ?? null;

            $startTime = match ($wave) {
                'wave_1' => $activity->wave_1_start_time,
                'wave_2' => $activity->wave_2_start_time,
                default => null,
            };

            $endTime = match ($wave) {
                'wave_1' => $activity->wave_1_end_time,
                'wave_2' => $activity->wave_2_end_time,
                default => null,
            };

            if (!$startTime || !$endTime) {
                continue;
            }

            $start = Carbon::parse(
                $activity->session_date . ' ' . $startTime,
                $timezone
            );

            $end = Carbon::parse(
                $activity->session_date . ' ' . $endTime,
                $timezone
            );

            if ($now->greaterThanOrEqualTo($start)
                && $now->lessThan($end)) {
                return [
                    'emoji' => $activity->mood_emoji ?? '🤩',
                    'message' => $activity->mood_message
                        ?? "You're enjoying {$activity->name}!",
                    'animation' => $activity->mood_animation ?? 'bounce',
                ];
            }
        }

        // 2. General retreat milestone mood.
        foreach (config('retreat.milestones', []) as $milestone) {
            if (empty($milestone['date'])
                || empty($milestone['start'])
                || empty($milestone['end'])) {
                continue;
            }

            $start = Carbon::parse(
                $milestone['date'] . ' ' . $milestone['start'],
                $timezone
            );

            $end = Carbon::parse(
                $milestone['date'] . ' ' . $milestone['end'],
                $timezone
            );

            if ($now->greaterThanOrEqualTo($start)
                && $now->lessThan($end)) {
                return [
                    'emoji' => $milestone['emoji'] ?? '😊',
                    'message' => $milestone['message']
                        ?? $milestone['title']
                        ?? 'Enjoy the retreat!',
                    'animation' => $milestone['animation'] ?? 'pulse',
                ];
            }
        }

        // 3. Day-specific fallback mood.
        $dayMoods = [
            '2026-11-03' => [
                'emoji' => '🧳',
                'message' => 'The retreat adventure begins!',
                'animation' => 'bounce',
            ],
            '2026-11-04' => [
                'emoji' => '🎉',
                'message' => 'Let’s make unforgettable memories!',
                'animation' => 'bounce',
            ],
            '2026-11-05' => [
                'emoji' => '🥹',
                'message' => 'Until we meet again!',
                'animation' => 'pulse',
            ],
        ];

            // Return the day-specific mood during the retreat.
            if (isset($dayMoods[$now->toDateString()])) {
                return $dayMoods[$now->toDateString()];
            }

            // Post-retreat mood.
            if ($now->greaterThan(
                Carbon::parse('2026-11-05 23:59:59', $timezone)
            )) {
                return [
                    'emoji' => '🏡',
                    'message' => 'Back to routine, carrying beautiful retreat memories!',
                    'animation' => 'pulse',
                ];
            }

            return [
                'emoji' => '😊',
                'message' => 'Your retreat adventure awaits!',
                'animation' => 'pulse',
            ];
    }
}
