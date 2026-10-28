<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackAnswer;
use App\Models\FeedbackQuestion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FeedbackPresentationController extends Controller
{
    public function results(Feedback $feedback,FeedbackQuestion $question) 
    {
        /*
        |--------------------------------------------------------------------------
        | Make sure the question belongs to this feedback
        |--------------------------------------------------------------------------
        */

        abort_unless(
            $question->feedback_id === $feedback->id,
            404
        );


        /*
        |--------------------------------------------------------------------------
        | Total responses for this question
        |--------------------------------------------------------------------------
        */

        $totalResponses = FeedbackAnswer::where(
            'feedback_question_id',
            $question->id
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Rating
        |--------------------------------------------------------------------------
        */

        if ($question->type === 'rating') {

            $ratings = FeedbackAnswer::query()
                ->where('feedback_question_id', $question->id)
                ->whereNotNull('answer_number')
                ->select(
                    'answer_number',
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy('answer_number')
                ->orderBy('answer_number')
                ->pluck('total', 'answer_number');

            $results = collect(range(5, 1))
                ->map(function ($rating) use ($ratings) {

                    return [
                        'value' => $rating,
                        'total' => $ratings->get($rating, 0),
                    ];

                });

        }


        /*
        |--------------------------------------------------------------------------
        | Single Choice
        |--------------------------------------------------------------------------
        */

        elseif ($question->type === 'single_choice') {

            $counts = FeedbackAnswer::query()
                ->where('feedback_question_id', $question->id)
                ->whereNotNull('feedback_option_id')
                ->select(
                    'feedback_option_id',
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy('feedback_option_id')
                ->pluck('total', 'feedback_option_id');

            $results = $question->options->map(function ($option) use ($counts) {

                return [
                    'value' => $option->id,
                    'label' => $option->title,
                    'total' => $counts->get($option->id, 0),
                ];

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Text
        |--------------------------------------------------------------------------
        */

        elseif (
            $question->type === 'short_text' ||
            $question->type === 'long_text'
        ) {

            $results = FeedbackAnswer::query()
                ->where('feedback_question_id', $question->id)
                ->whereNotNull('answer_text')
                ->where('answer_text', '<>', '')
                ->orderBy('submitted_at')
                ->get();

        }


        /*
        |--------------------------------------------------------------------------
        | Unknown type
        |--------------------------------------------------------------------------
        */

        else {

            $results = collect();

        }


        return view('admin.feedback.results', [
            'feedback' => $feedback,
            'question' => $question,
            'results' => $results,
            'totalResponses' => $totalResponses,
        ]);
    }

    private function getQuestionResults($question)
    {
        if ($question->type === 'rating') {

            $ratings = FeedbackAnswer::query()
                ->where('feedback_question_id', $question->id)
                ->whereNotNull('answer_number')
                ->select(
                    'answer_number',
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy('answer_number')
                ->orderBy('answer_number')
                ->pluck('total', 'answer_number');

            return collect(range(5, 1))
                ->map(function ($rating) use ($ratings) {
                    return [
                        'value' => $rating,
                        'label' => $rating . ' star',
                        'total' => $ratings->get($rating, 0),
                    ];
                });
        }

        if ($question->type === 'single_choice') {

            $answers = FeedbackAnswer::query()
                ->where('feedback_question_id', $question->id)
                ->whereNotNull('feedback_option_id')
                ->select(
                    'feedback_option_id',
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy('feedback_option_id')
                ->pluck('total', 'feedback_option_id');

            return $question->options->map(function ($option) use ($answers) {
                return [
                    'value' => $option->id,
                    'label' => $option->title,
                    'total' => $answers->get($option->id, 0),
                ];
            });
        }

        if (
            $question->type === 'short_text' ||
            $question->type === 'long_text'
        ) {

            return FeedbackAnswer::query()
                ->where('feedback_question_id', $question->id)
                ->whereNotNull('answer_text')
                ->where('answer_text', '!=', '')
                ->latest('submitted_at')
                ->get();
        }

        return collect();
    }

    public function presentation(Feedback $feedback, FeedbackQuestion $question) 
    {
        abort_unless(
            $question->feedback_id === $feedback->id,
            404
        );

        $results = $this->buildResults($question);

        $totalResponses = FeedbackAnswer::where(
            'feedback_question_id',
            $question->id
        )->count();

        /*
        |--------------------------------------------------------------------------
        | Questions in presentation order
        |--------------------------------------------------------------------------
        */

        $questions = $feedback->questions()
            ->orderBy('sort_order')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Current question position
        |--------------------------------------------------------------------------
        */

        $currentIndex = $questions->search(
            fn ($item) => $item->id === $question->id
        );

        $currentPosition = $currentIndex + 1;

        $totalQuestions = $questions->count();

        /*
        |--------------------------------------------------------------------------
        | Previous / Next
        |--------------------------------------------------------------------------
        */

        $previousQuestion = $currentIndex > 0
            ? $questions->get($currentIndex - 1)
            : null;

        $nextQuestion = $currentIndex < $questions->count() - 1
            ? $questions->get($currentIndex + 1)
            : null;

        return view('admin.feedback.presentation', [
            'feedback' => $feedback,
            'question' => $question,
            'results' => $results,
            'totalResponses' => $totalResponses,

            'currentPosition' => $currentPosition,
            'totalQuestions' => $totalQuestions,

            'previousQuestion' => $previousQuestion,
            'nextQuestion' => $nextQuestion,
        ]);
    }

    private function buildResults(FeedbackQuestion $question)
    {
        /*
        |--------------------------------------------------------------------------
        | Rating
        |--------------------------------------------------------------------------
        */

        if ($question->type === 'rating') {

            $ratings = FeedbackAnswer::query()
                ->where('feedback_question_id', $question->id)
                ->whereNotNull('answer_number')
                ->select(
                    'answer_number',
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy('answer_number')
                ->get()
                ->mapWithKeys(function ($row) {

                    return [
                        (int) $row->answer_number => (int) $row->total
                    ];

                });

            return collect(range(5, 1))
                ->map(function ($rating) use ($ratings) {

                    return [
                        'value' => $rating,
                        'total' => $ratings->get($rating, 0),
                    ];

                });

            }


        /*
        |--------------------------------------------------------------------------
        | Single Choice
        |--------------------------------------------------------------------------
        */

        if ($question->type === 'single_choice') {

            $counts = FeedbackAnswer::query()
                ->where('feedback_question_id', $question->id)
                ->whereNotNull('feedback_option_id')
                ->select(
                    'feedback_option_id',
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy('feedback_option_id')
                ->pluck('total', 'feedback_option_id');

            return $question->options->map(function ($option) use ($counts) {

                return [
                    'value' => $option->id,
                    'label' => $option->title,
                    'total' => (int) $counts->get($option->id, 0),
                ];

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Text Responses
        |--------------------------------------------------------------------------
        */

        if (
            $question->type === 'short_text' ||
            $question->type === 'long_text'
        ) {

            return FeedbackAnswer::query()
                ->where('feedback_question_id', $question->id)
                ->whereNotNull('answer_text')
                ->where('answer_text', '<>', '')
                ->orderBy('submitted_at')
                ->get();

        }


        /*
        |--------------------------------------------------------------------------
        | Unknown Question Type
        |--------------------------------------------------------------------------
        */

        return collect();
    }

    // public function control(Feedback $feedback)
    // {
    //     $feedback->load([
    //         'questions.options',
    //         'presentation.currentQuestion',
    //     ]);

    //     $presentation = $feedback->presentation;

    //     return view('admin.feedback.control', compact(
    //         'feedback',
    //         'presentation'
    //     ));
    // }
}
