<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{

    public function form(Request $request)
    {

        $participant = $request->attributes->get('participant');

        if (! $participant) {
            abort(403, 'Participant not authenticated.');
        }

        $now = now();

        $feedback = Feedback::query()
            ->where('status', 'Open')
            ->where('starts_at', '<=', $now)
            ->where('ends_at', '>=', $now)
            ->with([
                'questions' => function ($query) {
                    $query->orderBy('sort_order')
                        ->with('options');
                }
            ])
            ->first();

        if (!$feedback) {
            return view('dashboard.feedback.unavailable');
        }

        $questionIds = $feedback->questions->pluck('id');

        $alreadySubmitted = FeedbackAnswer::where('participant_id', $participant->id)
            ->whereIn('feedback_question_id', $questionIds)
            ->exists();

        if ($alreadySubmitted) {
            return redirect()->route('feedback.thank-you');
        }
        return view('dashboard.feedback.form', [
            'feedback' => $feedback,
        ]);
    }

    public function store(Request $request, Feedback $feedback)
    {

        $participant = $request->attributes->get('participant');

        if (! $participant) {
            abort(403, 'Participant not authenticated.');
        }


        /*
        |--------------------------------------------------------------------------
        | Feedback must be open
        |--------------------------------------------------------------------------
        */

        if ($feedback->status !== 'Open') {

            return back()->with(
                'error',
                'This feedback form is not currently open.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Get questions belonging to this feedback
        |--------------------------------------------------------------------------
        */

        $questions = $feedback->questions()
            ->with('options')
            ->orderBy('sort_order')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Validate that answers exist
        |--------------------------------------------------------------------------
        */

        $rules = [
            'answers' => ['required', 'array'],
        ];


        foreach ($questions as $question) {

            $field = "answers.{$question->id}";

            if ($question->required) {

                $rules[$field] = ['required'];

            } else {

                $rules[$field] = ['nullable'];
            }


            /*
            |--------------------------------------------------------------------------
            | Rating
            |--------------------------------------------------------------------------
            */

            if ($question->type === 'rating') {

                $rules[$field][] = 'integer';
                $rules[$field][] = 'between:1,5';
            }


            /*
            |--------------------------------------------------------------------------
            | Single choice
            |--------------------------------------------------------------------------
            */

            if ($question->type === 'single_choice') {

                $rules[$field][] = 'integer';

            }


            /*
            |--------------------------------------------------------------------------
            | Text
            |--------------------------------------------------------------------------
            */

            if (
                $question->type === 'short_text' ||
                $question->type === 'long_text'
            ) {

                $rules[$field][] = 'string';
                $rules[$field][] = 'max:160';

                $rules[$field][] = function ($attribute, $value, $fail) use ($question) {

                    $wordCount = preg_match_all(
                        '/\S+/u',
                        trim($value)
                    );

                    $maxWords = $question->type === 'short_text'
                        ? 15
                        : 25;

                    if ($wordCount > $maxWords) {

                        $fail(
                            "The answer may not contain more than {$maxWords} words."
                        );
                    }
                };
            }

        }

        $validated = $request->validate($rules);


        DB::transaction(function () use (
            $feedback,
            $participant,
            $questions,
            $validated
        ) {

            $answers = $validated['answers'];

            foreach ($questions as $question) {

                /*
                |--------------------------------------------------------------------------
                | Skip optional unanswered question
                |--------------------------------------------------------------------------
                */

                if (
                    ! array_key_exists($question->id, $answers) ||
                    $answers[$question->id] === null ||
                    $answers[$question->id] === ''
                ) {
                    continue;
                }


                $value = $answers[$question->id];


                /*
                |--------------------------------------------------------------------------
                | Rating
                |--------------------------------------------------------------------------
                */

                if ($question->type === 'rating') {

                    FeedbackAnswer::create([

                        'feedback_question_id' => $question->id,

                        'participant_id' => $participant->id,

                        'feedback_option_id' => null,

                        'answer_text' => null,

                        'answer_number' => (int) $value,

                        'submitted_at' => now(),

                    ]);

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | Single choice
                |--------------------------------------------------------------------------
                */

                if ($question->type === 'single_choice') {

                    /*
                    |--------------------------------------------------------------------------
                    | Make sure selected option belongs to this question
                    |--------------------------------------------------------------------------
                    */

                    $validOption = $question->options
                        ->firstWhere('id', (int) $value);


                    if (! $validOption) {

                        abort(
                            422,
                            'Invalid option selected.'
                        );
                    }


                    FeedbackAnswer::create([

                        'feedback_question_id' => $question->id,

                        'participant_id' => $participant->id,

                        'feedback_option_id' => $validOption->id,

                        'answer_text' => null,

                        'answer_number' => null,

                        'submitted_at' => now(),

                    ]);

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | Text answer
                |--------------------------------------------------------------------------
                */

                if (
                    $question->type === 'short_text' ||
                    $question->type === 'long_text'
                ) {

                    FeedbackAnswer::create([

                        'feedback_question_id' => $question->id,

                        'participant_id' => $participant->id,

                        'feedback_option_id' => null,

                        'answer_text' => trim($value),

                        'answer_number' => null,

                        'submitted_at' => now(),

                    ]);

                }

            }

        });


        /*
        |--------------------------------------------------------------------------
        | Success
        |--------------------------------------------------------------------------
        */

        return redirect()->route('feedback.thank-you')
            ->with('feedback_title', $feedback->title);
    }
    
}