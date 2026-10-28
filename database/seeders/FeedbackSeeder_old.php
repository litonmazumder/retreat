<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Feedback;
use App\Models\FeedbackOption;
use App\Models\FeedbackQuestion;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Event
        |--------------------------------------------------------------------------
        */

        $event = Event::where('slug', 'asia-seminar-2026')->firstOrFail();

        $eventDay1 = $event->eventDays()
            ->where('day_number', 1)
            ->firstOrFail();

        $eventDay2 = $event->eventDays()
            ->where('day_number', 2)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | DAY 1
        |--------------------------------------------------------------------------
        */

        $eventDay1 = Feedback::updateOrCreate(
            [   
                'event_id' => $event->id,
                'event_day_id' => $eventDay1->id
            ],
            [
                'title' => 'Day 1 Feedback',

                'description' =>
                    'Thank you for an exciting first day! This feedback takes about three minutes. Your feedback will help us adjust tomorrow and, where feasible, future Asia Seminars.',

                'status' => 'Open',

                'starts_at' => '2026-08-12 00:00:00',
                'ends_at' => '2026-08-12 23:59:59',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Day 1 - Session Ratings
        |--------------------------------------------------------------------------
        */

        $day1Sessions = [

            'Swisscontact Global Update',

            'SSA Overview',

            'World Café (Country Updates)',

            'Project to Capability: RMG Experience from Bangladesh',

            'Blended Finance & Impact Investment',

        ];

        foreach ($day1Sessions as $index => $session) {

            FeedbackQuestion::updateOrCreate(
                [
                    'feedback_id' => $eventDay1->id,
                    'sort_order' => $index + 1,
                ],
                [
                    'title' => "How useful/relevant was {$session} to you?",

                    'instruction' =>
                        '1 star = not useful/relevant at all; 5 stars = very useful/relevant.',

                    'type' => 'rating',

                    'required' => true,

                    'anonymous' => true,

                    'sort_order' => $index + 1,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Day 1 - Overall
        |--------------------------------------------------------------------------
        */

        FeedbackQuestion::updateOrCreate(
            [
                'feedback_id' => $eventDay1->id,
                'sort_order' => 6,
            ],
            [
                'title' => 'Overall, how would you rate Day 1?',

                'instruction' =>
                    '1 star = not useful/relevant at all; 5 stars = very useful/relevant.',

                'type' => 'rating',

                'required' => true,

                'anonymous' => true,

                'sort_order' => 6,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Day 1 - Presentation / Discussion Balance
        |--------------------------------------------------------------------------
        */

        $balanceQuestion = FeedbackQuestion::updateOrCreate(
            [
                'feedback_id' => $eventDay1->id,
                'sort_order' => 7,
            ],
            [
                'title' =>
                    'How was the balance between presentation and discussion today?',

                'instruction' => 'Select one.',

                'type' => 'single_choice',

                'required' => true,

                'anonymous' => true,

                'sort_order' => 7,
            ]
        );

        $balanceOptions = [

            'Too much presentation, not enough discussion',

            'Perfect',

            'Too much discussion, not enough content',

            'The issue was something else',

        ];

        foreach ($balanceOptions as $index => $option) {

            FeedbackOption::updateOrCreate(
                [
                    'feedback_question_id' => $balanceQuestion->id,
                    'sort_order' => $index + 1,
                ],
                [
                    'title' => $option,
                    'sort_order' => $index + 1,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Day 1 - Takeaway
        |--------------------------------------------------------------------------
        */

        FeedbackQuestion::updateOrCreate(
            [
                'feedback_id' => $eventDay1->id,
                'sort_order' => 8,
            ],
            [
                'title' =>
                    'Name one thing from today that you will take back to your country office.',

                'instruction' =>
                    'Your answer should be 15 words or fewer.',

                'type' => 'short_text',

                'required' => true,

                'anonymous' => true,

                'sort_order' => 8,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Day 1 - Keep
        |--------------------------------------------------------------------------
        */

        FeedbackQuestion::updateOrCreate(
            [
                'feedback_id' => $eventDay1->id,
                'sort_order' => 9,
            ],
            [
                'title' =>
                    'For tomorrow, name one thing the organisers should keep doing.',

                'instruction' =>
                    'Your answer should be 15 words or fewer.',

                'type' => 'short_text',

                'required' => true,

                'anonymous' => true,

                'sort_order' => 9,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Day 1 - Change
        |--------------------------------------------------------------------------
        */

        FeedbackQuestion::updateOrCreate(
            [
                'feedback_id' => $eventDay1->id,
                'sort_order' => 10,
            ],
            [
                'title' =>
                    'For tomorrow, name one thing the organisers should change.',

                'instruction' =>
                    'Your answer should be 15 words or fewer.',

                'type' => 'short_text',

                'required' => true,

                'anonymous' => true,

                'sort_order' => 10,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Day 1 Presentation
        |--------------------------------------------------------------------------
        */

        FeedbackPresentation::firstOrCreate(
            [
                'feedback_id' => $eventDay1->id,
            ],
            [
                'current_question_id' => null,

                'status' => 'Waiting',

                'show_results' => false,

                'started_at' => null,

                'finished_at' => null,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | DAY 2
        |--------------------------------------------------------------------------
        */

        $eventDay2 = Feedback::updateOrCreate(
            [
                'event_id' => $event->id,    
                'event_day_id' => $eventDay2->id
            ],
            [
                'title' => 'Day 2 Feedback',

                'description' =>
                    'This is the final feedback form. It takes about three minutes and covers both today and the seminar as a whole.',

                'status' => 'Draft',

                'starts_at' => '2026-08-13 00:00:00',
                'ends_at' => '2026-08-13 23:59:59',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Day 2 - Session Ratings
        |--------------------------------------------------------------------------
        */

        $day2Sessions = [

            'Private Sector Engagement (PSE) in Asia',

            'Financial Impact of the New Reality',

            'Contribution Agreements',

            'Comms in SSA',

            'Comms Group Work and Plenary',

        ];

        foreach ($day2Sessions as $index => $session) {

            FeedbackQuestion::updateOrCreate(
                [
                    'feedback_id' => $eventDay2->id,
                    'sort_order' => $index + 1,
                ],
                [
                    'title' =>
                        "How useful/relevant was {$session} to you?",

                    'instruction' =>
                        '1 star = not useful/relevant at all; 5 stars = very useful/relevant.',

                    'type' => 'rating',

                    'required' => true,

                    'anonymous' => true,

                    'sort_order' => $index + 1,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Day 2 - Overall
        |--------------------------------------------------------------------------
        */

        FeedbackQuestion::updateOrCreate(
            [
                'feedback_id' => $eventDay2->id,
                'sort_order' => 6,
            ],
            [
                'title' =>
                    'Overall, how would you rate Day 2?',

                'instruction' =>
                    '1 star = not useful/relevant at all; 5 stars = very useful/relevant.',

                'type' => 'rating',

                'required' => true,

                'anonymous' => true,

                'sort_order' => 6,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Day 2 - Objectives
        |--------------------------------------------------------------------------
        */

        $objectives = [

            'Shared Swisscontact global and regional strategic updates',

            'Enabled knowledge and experience exchange across country offices',

            'Created space to reflect on the changing landscape and emerging opportunities',

        ];

        foreach ($objectives as $index => $objective) {

            FeedbackQuestion::updateOrCreate(
                [
                    'feedback_id' => $eventDay2->id,
                    'sort_order' => 7 + $index,
                ],
                [
                    'title' =>
                        "How well did the seminar deliver on this objective: {$objective}",

                    'instruction' =>
                        '1 star = not useful/relevant at all; 5 stars = very useful/relevant.',

                    'type' => 'rating',

                    'required' => true,

                    'anonymous' => true,

                    'sort_order' => 7 + $index,
                ]
            );
        }

                /*
        |--------------------------------------------------------------------------
        | Day 2 - Event Quality
        |--------------------------------------------------------------------------
        */

        FeedbackQuestion::updateOrCreate(
            [
                'feedback_id' => $eventDay2->id,
                'sort_order' => 11,
            ],
            [
                'title' =>
                    'How would you rate the quality and organisation of the seminar?',

                'instruction' =>
                    '1 star = Poor; 5 stars = Excellent.',

                'type' => 'rating',

                'required' => true,

                'anonymous' => true,

                'sort_order' => 11,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Day 2 - Next Seminar Topic / Format
        |--------------------------------------------------------------------------
        */

        FeedbackQuestion::updateOrCreate(
            [
                'feedback_id' => $eventDay2->id,
                'sort_order' => 12,
            ],
            [
                'title' =>
                    'Share one topic or one format the next Asia Seminar should include.',

                'instruction' =>
                    'Your answer should be 15 words or fewer.',

                'type' => 'short_text',

                'required' => true,

                'anonymous' => true,

                'sort_order' => 12,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Day 2 - Organising Team
        |--------------------------------------------------------------------------
        */

        FeedbackQuestion::updateOrCreate(
            [
                'feedback_id' => $eventDay2->id,
                'sort_order' => 13,
            ],
            [
                'title' =>
                    'Anything you would like to say to the organising team?',

                'instruction' =>
                    'Share your compliments, criticism, something we got wrong, or something we missed.',

                'type' => 'long_text',

                'required' => false,

                'anonymous' => true,

                'sort_order' => 13,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Day 2 - Host Country
        |--------------------------------------------------------------------------
        */

        FeedbackQuestion::updateOrCreate(
            [
                'feedback_id' => $eventDay2->id,
                'sort_order' => 14,
            ],
            [
                'title' =>
                    'Which country would you like to see as the host of the next Asia Seminar?',

                'instruction' =>
                    'Write only the country name.',

                'type' => 'short_text',

                'required' => true,

                'anonymous' => true,

                'sort_order' => 14,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Day 2 Presentation
        |--------------------------------------------------------------------------
        */

        FeedbackPresentation::firstOrCreate(
            [
                'feedback_id' => $eventDay2->id,
            ],
            [
                'current_question_id' => null,

                'status' => 'Waiting',

                'show_results' => false,

                'started_at' => null,

                'finished_at' => null,
            ]
        );
    }
}