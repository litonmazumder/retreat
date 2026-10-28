<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackPresentation;
use Illuminate\Http\Request;

class FeedbackPresentationController extends Controller
{
    /**
     * Facilitator control screen.
     */
    public function control(Feedback $feedback)
    {
        $feedback->load([
            'questions.options',
            'presentation.currentQuestion',
        ]);

        $presentation = $feedback->presentation;

        return view('admin.feedback.control', compact(
            'feedback',
            'presentation'
        ));
    }


    /**
     * Start the live feedback session.
     */
    public function start(Feedback $feedback)
    {
        $feedback->load('questions');

        $presentation = FeedbackPresentation::firstOrCreate(
            [
                'feedback_id' => $feedback->id,
            ],
            [
                'status' => 'Waiting',
                'show_results' => false,
            ]
        );

        $firstQuestion = $feedback->questions()
            ->orderBy('sort_order')
            ->first();

        if (!$firstQuestion) {
            return back()->with(
                'error',
                'This feedback does not have any questions.'
            );
        }

        $presentation->update([
            'current_question_id' => $firstQuestion->id,
            'status' => 'Live',
            'show_results' => false,
            'started_at' => now(),
            'finished_at' => null,
        ]);

        return back()->with(
            'success',
            'Feedback session started.'
        );
    }


    /**
     * Move to the next question.
     */
    public function next(Feedback $feedback)
    {
        $presentation = $feedback->presentation;

        if (!$presentation) {
            return back()->with(
                'error',
                'Feedback presentation has not been started.'
            );
        }

        if ($presentation->status === 'Finished') {
            return back()->with(
                'error',
                'This feedback session has already finished.'
            );
        }

        $currentQuestion = $presentation->currentQuestion;

        $nextQuestion = $feedback->questions()
            ->when(
                $currentQuestion,
                fn ($query) =>
                    $query->where(
                        'sort_order',
                        '>',
                        $currentQuestion->sort_order
                    )
            )
            ->orderBy('sort_order')
            ->first();

        if (!$nextQuestion) {
            return back()->with(
                'error',
                'This is the last question.'
            );
        }

        $presentation->update([
            'current_question_id' => $nextQuestion->id,
            'status' => 'Live',
            'show_results' => false,
        ]);

        return back()->with(
            'success',
            'Moved to the next question.'
        );
    }


    /**
     * Move to the previous question.
     */
    public function previous(Feedback $feedback)
    {
        $presentation = $feedback->presentation;

        if (!$presentation) {
            return back()->with(
                'error',
                'Feedback presentation has not been started.'
            );
        }

        $currentQuestion = $presentation->currentQuestion;

        if (!$currentQuestion) {
            return back()->with(
                'error',
                'No current question is selected.'
            );
        }

        $previousQuestion = $feedback->questions()
            ->where(
                'sort_order',
                '<',
                $currentQuestion->sort_order
            )
            ->orderByDesc('sort_order')
            ->first();

        if (!$previousQuestion) {
            return back()->with(
                'error',
                'This is already the first question.'
            );
        }

        $presentation->update([
            'current_question_id' => $previousQuestion->id,
            'status' => 'Live',
            'show_results' => false,
        ]);

        return back()->with(
            'success',
            'Moved to the previous question.'
        );
    }


    /**
     * Tell participant/presentation screens to display results.
     */
    public function showResults(Feedback $feedback)
    {
        $presentation = $feedback->presentation;

        if (!$presentation) {
            return back()->with(
                'error',
                'Feedback presentation has not been started.'
            );
        }

        if (!$presentation->current_question_id) {
            return back()->with(
                'error',
                'No question is currently active.'
            );
        }

        $presentation->update([
            'show_results' => true,
        ]);

        return back()->with(
            'success',
            'Results are now being displayed.'
        );
    }


    /**
     * Finish the live feedback session.
     */
    public function finish(Feedback $feedback)
    {
        $presentation = $feedback->presentation;

        if (!$presentation) {
            return back()->with(
                'error',
                'Feedback presentation has not been started.'
            );
        }

        $presentation->update([
            'status' => 'Finished',
            'show_results' => false,
            'finished_at' => now(),
        ]);

        return back()->with(
            'success',
            'Feedback session has been finished.'
        );
    }

    public function presentation(Feedback $feedback)
    {
        $feedback->load([
            'questions.options',
            'presentation.currentQuestion',
        ]);

        return view('admin.feedback.presentation', compact(
            'feedback'
        ));
    }

    public function live()
    {
        $feedback = Feedback::where('status', 'Open')
            ->with([
                'questions.options',
                'presentation.currentQuestion',
            ])
            ->first();

        return view('dashboard.feedback.live', [
            'feedback' => $feedback,
        ]);
    }

    public function liveState(Feedback $feedback)
    {
        $feedback->load([
            'questions.options',
            'presentation.currentQuestion.options',
        ]);

        $presentation = $feedback->presentation;

        if (!$presentation) {
            return response()->json([
                'status' => 'Waiting',
                'show_results' => false,
                'question_id' => null,
                'question' => null,
                'question_number' => 0,
                'total_questions' => $feedback->questions->count(),
                'response_count' => 0,
            ]);
        }

        $question = $presentation->currentQuestion;

        $questionNumber = 0;
        $responseCount = 0;

        if ($question) {

            $questionNumber = $feedback->questions
                ->search(fn ($item) => $item->id == $question->id) + 1;

            $responseCount = $question->answers()->count();
        }

        return response()->json([
            'status' => $presentation->status,

            'show_results' => (bool) $presentation->show_results,

            'question_id' => $question?->id,

            'question' => $question ? [
                'id' => $question->id,
                'title' => $question->title,
                'type' => $question->type,
                'instruction' => $question->instruction,

                'options' => $question->options
                    ->values()
                    ->map(function ($option, $index) {
                        return [
                            'id' => $option->id,
                            'title' => $option->title,
                            'position' => $index + 1,
                        ];
                    })
                    ->values(),
            ] : null,

            'question_number' => $questionNumber,

            'total_questions' => $feedback->questions->count(),

            'response_count' => $responseCount,
        ]);
    }

    public function answer(Request $request, Feedback $feedback)
    {
            \Log::info('FEEDBACK ANSWER HIT', [
            'feedback_id' => $feedback->id,
            'payload' => $request->all(),
            'participant_id' => $request->attributes->get('participant')?->id,
        ]);

        $participant = $request->attributes->get('participant');

        /*
        |--------------------------------------------------------------------------
        | Get current live question
        |--------------------------------------------------------------------------
        */

        $presentation = $feedback->presentation;

        if (! $presentation || $presentation->status !== 'Live') {
            return response()->json([
                'message' => 'Feedback session is not currently live.',
            ], 403);
        }

        $question = $presentation->currentQuestion;

        if (! $question) {
            return response()->json([
                'message' => 'No question is currently active.',
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | Validate answer
        |--------------------------------------------------------------------------
        */

        $rules = match ($question->type) {

            'rating' => [
                'answer' => ['required', 'integer', 'between:1,5'],
            ],

            'single_choice' => [
                'answer' => ['required', 'integer'],
            ],

            'short_text' => [
                'answer' => ['required', 'string', 'max:500'],
            ],

            'long_text' => [
                'answer' => ['required', 'string', 'max:5000'],
            ],

            default => [
                'answer' => ['required'],
            ],
        };

        $validated = $request->validate($rules);

        /*
        |--------------------------------------------------------------------------
        | Validate option for single choice
        |--------------------------------------------------------------------------
        */

        if ($question->type === 'single_choice') {

            $validOption = $question->options()
                ->where('id', $validated['answer'])
                ->exists();

            if (! $validOption) {
                return response()->json([
                    'message' => 'Invalid option selected.',
                ], 422);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Prevent duplicate answer
        |--------------------------------------------------------------------------
        */

        $alreadyAnswered = FeedbackAnswer::where([
            'feedback_question_id' => $question->id,
            'participant_id' => $participant->id,
        ])->exists();

        if ($alreadyAnswered) {
            return response()->json([
                'message' => 'You have already answered this question.',
                'already_answered' => true,
            ], 409);
        }

        /*
        |--------------------------------------------------------------------------
        | Store answer
        |--------------------------------------------------------------------------
        */

        $answer = new FeedbackAnswer();

        $answer->feedback_question_id = $question->id;
        $answer->participant_id = $participant->id;

        if ($question->type === 'rating') {

            $answer->answer_number = $validated['answer'];

        } elseif ($question->type === 'single_choice') {

            $answer->feedback_option_id = $validated['answer'];

        } else {

            $answer->answer_text = $validated['answer'];
        }

        $answer->submitted_at = now();

        $answer->save();

        return response()->json([
            'success' => true,
            'message' => 'Your answer has been submitted.',
            'answer_id' => $answer->id,
            'question_id' => $question->id,
        ]);
    }
}