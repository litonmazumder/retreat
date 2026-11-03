<?php

namespace App\Services;

use App\Models\Participant;
use App\Models\RetreatSchedule;
use Illuminate\Support\Carbon;

class RetreatMoodService
{
    public function forParticipant(Participant $participant): array
    {
        $timezone = config('retreat.timezone', 'Asia/Dhaka');
        $now = now($timezone);

        // 1. Participant-specific Carnival activity mood.
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

        // 2. Current retreat schedule mood.
        $schedule = RetreatSchedule::query()
            ->where('event_id', config('retreat.event_id', 1))
            ->where('is_active', true)
            ->whereDate('schedule_date', $now->toDateString())
            ->where('start_time', '<=', $now->format('H:i:s'))
            ->where('end_time', '>', $now->format('H:i:s'))
            ->orderBy('sort_order')
            ->first();

        if ($schedule) {
            return [
                'emoji' => $schedule->icon ?: '😊',
                'message' => $this->scheduleMessage($schedule->title),
                'animation' => $this->scheduleAnimation($schedule->title),
            ];
        }

        // 3. General retreat milestone mood.
        foreach (config('retreat.milestones', []) as $milestone) {
            if (
                empty($milestone['date']) ||
                empty($milestone['start']) ||
                empty($milestone['end'])
            ) {
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

        // 4. Day-specific fallback moods.
        $dayMoods = [
            '2026-11-03' => [
                'emoji' => '🧳',
                'message' => 'The retreat adventure begins! Get ready for an amazing journey!',
                'animation' => 'bounce',
            ],
            '2026-11-04' => [
                'emoji' => '🎉',
                'message' => 'A day full of excitement, teamwork and unforgettable memories!',
                'animation' => 'bounce',
            ],
            '2026-11-05' => [
                'emoji' => '🥹',
                'message' => 'One last day together. Make every moment count!',
                'animation' => 'pulse',
            ],
        ];

        if (isset($dayMoods[$now->toDateString()])) {
            return $dayMoods[$now->toDateString()];
        }

        // 5. Post-retreat mood.
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

    /**
     * Schedule-specific mood messages.
     */
    private function scheduleMessage(string $title): string
    {
        return match ($title) {
            'Registration & Breakfast (Takeaway)' =>
                '☕ Fuel up! Your retreat adventure is about to begin!',

            'Departure from Dhaka' =>
                '🚌 Buckle up! The journey to Sarah Resort begins!',

            'Arrival and Venue Registration' =>
                '🏨 Welcome to Sarah Resort! Your retreat experience awaits!',

            'Opening Ceremony' =>
                '🤝 Let’s connect, celebrate and officially kick off the retreat!',

            'Lunch Break and Check-In' =>
                '🍽️ Enjoy your lunch and settle into your retreat stay!',

            'Papercuts' =>
                '🌍 Time to learn, create and make a positive impact!',

            'Fire & Safety' =>
                '🧯 Stay alert, stay safe and learn together!',

            'Team Photo' =>
                '📸 Big smiles! Let’s capture some unforgettable memories!',

            'Free Time & Venue Exploration' =>
                '🌿 Relax, explore and enjoy everything the resort has to offer!',

            'Dinner' =>
                '🍽️ Good food, great company and wonderful memories!',

            'Cultural Night' =>
                '🎭 Lights, performances and celebrations! Let the show begin!',

            'Breakfast' =>
                '☀️ Good morning! Start the day with fresh energy!',

            'Swisscontact Carnival' =>
                '🎪 Let the games, laughter and team spirit begin!',

            'Lunch' =>
                '🥗 Take a break, enjoy your meal and recharge!',

            'হই হই রই রই' =>
                '🤸 Get ready for excitement, laughter and loads of fun!',

            'Indoor to Outdoor Transition' =>
                '🌳 Time to step outside and get ready for more fun!',

            'Tic Tac Toe Relay' =>
                '❌⭕ Think fast, move smart and cheer for your team!',

            'Optional Afternoon Activities' =>
                '🪁 Choose your adventure and make the afternoon yours!',

            'Wellbeing Session' =>
                '🧘 Pause, breathe and give yourself a moment to recharge!',

            'Pack-Up' =>
                '🧳 Time to pack your belongings and your beautiful memories!',

            'Check-Out' =>
                '👋 One last look around before heading home!',

            'Departure for Dhaka' =>
                '🚌 Heading home with a heart full of retreat memories!',

            'তারা: Stargazing & Karaoke Night' =>
                '🌟 Under the stars, singing together and making magical memories!',

            default =>
                "✨ You're enjoying {$title}! Make every moment count!",
        };
    }

    /**
     * Choose an animation based on the activity.
     */
    private function scheduleAnimation(string $title): string
    {
        return match ($title) {
            'Departure from Dhaka',
            'Team Photo',
            'Swisscontact Carnival',
            'হই হই রই রই',
            'Tic Tac Toe Relay',
            'Cultural Night',
            'তারা: Stargazing & Karaoke Night' => 'bounce',

            'Wellbeing Session',
            'Free Time & Venue Exploration' => 'pulse',

            'Opening Ceremony',
            'Arrival and Venue Registration',
            'Dinner',
            'Lunch',
            'Lunch Break and Check-In',
            'Breakfast',
            'Registration & Breakfast (Takeaway)' => 'pulse',

            default => 'bounce',
        };
    }
}
