@extends('layouts.dashboard')

@section('title', $feedback->title)

@section('content')

<div class="space-y-8 px-5 py-6 pb-24">

    {{-- =====================================================
        HEADER
    ====================================================== --}}

    <div class="mb-6">

        <div class="flex items-center gap-3">

            <div
                class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50"
            >
                <i class="fa-solid fa-comment-dots text-xl text-[#00477A]"></i>
            </div>

            <div>

                <h1 class="text-2xl font-bold text-slate-900">
                    {{ $feedback->title }}
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Please take a few minutes to share your feedback.
                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
        INTRODUCTION
    ====================================================== --}}

    @if($feedback->description)

        <!-- <div
            class="mb-6 rounded-2xl border border-blue-100 bg-blue-50 p-5"
        >

            <div class="flex gap-3">

                <i
                    class="fa-solid fa-circle-info mt-1 text-[#00477A]"
                ></i>

                <p class="text-sm leading-6 text-slate-700">
                    {{ $feedback->instruction }}
                </p>

            </div>

        </div> -->

    @endif


    {{-- =====================================================
        VALIDATION ERRORS
    ====================================================== --}}

    @if($errors->any())

        <div
            class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5"
        >

            <div class="flex gap-3">

                <i
                    class="fa-solid fa-circle-exclamation mt-1 text-red-600"
                ></i>

                <div>

                    <p class="font-semibold text-red-800">
                        Please check your answers.
                    </p>

                    <ul class="mt-2 list-disc pl-5 text-sm text-red-700">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- =====================================================
        FEEDBACK FORM
    ====================================================== --}}

    <form
        method="POST"
        action="{{ route('feedback.submit', $feedback) }}"
        class="space-y-6"
    >

        @csrf


        @foreach($feedback->questions as $index => $question)

            <div
                class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6"
            >

                {{-- =================================================
                    QUESTION HEADER
                ================================================== --}}

                <div class="mb-5 flex items-start gap-3">

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#00477A] text-sm font-bold text-white"
                    >
                        {{ $index + 1 }}
                    </div>

                    <div class="min-w-0">

                        <h2
                            class="font-semibold leading-6 text-slate-900"
                        >
                            {{ $question->title }}
                        </h2>

                        @if($question->instruction)

                            <p class="mt-1 text-sm text-slate-500">
                                {{ $question->instruction }}
                            </p>

                        @endif

                    </div>

                </div>


                {{-- =================================================
                    RATING
                ================================================== --}}

            @if($question->type === 'rating')

                <div
                    class="mt-6"
                    x-data="{ rating: {{ old("answers.{$question->id}", 0) }} }"
                >

                    {{-- Stars --}}

                    <div class="flex items-center justify-center gap-2">

                        @for($rating = 1; $rating <= 5; $rating++)

                            <label
                                class="cursor-pointer"
                                @click="rating = {{ $rating }}"
                            >

                                <input
                                    type="radio"
                                    name="answers[{{ $question->id }}]"
                                    value="{{ $rating }}"
                                    class="sr-only"
                                    x-model="rating"
                                    @required($question->required)
                                >

                                <span
                                    class="
                                        flex
                                        h-12
                                        w-12
                                        items-center
                                        justify-center
                                        rounded-full
                                        text-2xl
                                        transition-all
                                        duration-150
                                        sm:h-14
                                        sm:w-14
                                        sm:text-3xl
                                    "
                                    :class="
                                        rating === {{ $rating }}
                                            ? 'bg-[#00477A] scale-110 shadow-md'
                                            : 'bg-slate-50 hover:bg-blue-50'
                                    "
                                >

                                    ⭐

                                </span>

                            </label>

                        @endfor

                    </div>


                    {{-- Scale labels --}}

                    <div class="mt-3 flex items-center justify-between px-1">

                    </div>

                </div>


                {{-- =================================================
                    SINGLE CHOICE
                ================================================== --}}

                @elseif($question->type === 'single_choice')

                <div class="mt-5 space-y-3">

                    @foreach($question->options as $option)

                        <label class="block cursor-pointer">

                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}"
                                class="peer sr-only"
                                @required($question->required)
                            >

                            <div
                                class="
                                    flex
                                    min-h-[56px]
                                    items-center
                                    rounded-2xl
                                    border
                                    border-slate-200
                                    bg-white
                                    px-5
                                    py-4
                                    text-sm
                                    font-medium
                                    text-slate-700
                                    transition-all
                                    duration-150

                                    hover:border-[#00477A]
                                    hover:bg-blue-50

                                    peer-checked:border-[#00477A]
                                    peer-checked:bg-[#00477A]
                                    peer-checked:text-white
                                    peer-checked:shadow-md
                                "
                            >

                                {{ $option->title }}

                            </div>

                        </label>

                    @endforeach

                </div>


                {{-- =================================================
                    SHORT TEXT / OPEN ENDED
                ================================================== --}}

                @elseif($question->type === 'short_text')

                    <div>
                        <textarea
                            name="answers[{{ $question->id }}]"
                            rows="3"
                            maxlength="160"
                            @required($question->required)
                            class="word-limited-textarea w-full resize-none rounded-2xl border border-slate-300 p-4 text-sm leading-6 outline-none transition focus:border-[#00477A] focus:ring-2 focus:ring-blue-100"
                            placeholder="Your answer..."
                            data-max-words="15"
                        >{{ old("answers.{$question->id}") }}</textarea>

                        <div class="mt-1 flex justify-between">

                            <span class="word-error hidden text-xs font-medium text-red-500">
                                Maximum 15 words allowed.
                            </span>

                            <span class="word-counter text-xs text-slate-400">
                                0 / 15 words
                            </span>

                        </div>
                    </div>



                {{-- =================================================
                    LONG TEXT / OPEN ENDED
                ================================================== --}}

                @elseif($question->type === 'long_text')

                    <div>
                        <textarea
                            name="answers[{{ $question->id }}]"
                            rows="5"
                            maxlength="300"
                            @required($question->required)
                            class="word-limited-textarea w-full resize-none rounded-2xl border border-slate-300 p-4 text-sm leading-6 outline-none transition focus:border-[#00477A] focus:ring-2 focus:ring-blue-100"
                            placeholder="Your answer..."
                            data-max-words="25"
                        >{{ old("answers.{$question->id}") }}</textarea>

                        <div class="mt-1 flex justify-between">

                            <span class="word-error hidden text-xs font-medium text-red-500">
                                Maximum 25 words allowed.
                            </span>

                            <span class="word-counter text-xs text-slate-400">
                                0 / 25 words
                            </span>

                        </div>
                    </div>

                @endif

            </div>

        @endforeach


        {{-- =====================================================
            SUBMIT
        ====================================================== --}}

        <div class="pt-2">

            <button
                type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-2xl bg-[#00477A] py-4 font-semibold text-white shadow-lg transition hover:bg-[#00375f]"
            >

                <i class="fa-solid fa-paper-plane"></i>

                Submit Feedback

            </button>

            <p class="mt-3 text-center text-xs text-slate-400">
                Please review your answers before submitting.
            </p>

        </div>

    </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.word-limited-textarea').forEach(function (textarea) {

        const maxWords = parseInt(
            textarea.dataset.maxWords,
            10
        );

        // The wrapper containing this textarea
        const container = textarea.parentElement;

        const counter = container.querySelector('.word-counter');
        const error = container.querySelector('.word-error');


        // Safety check
        if (!counter || !maxWords) {
            return;
        }


        function getWords(value) {

            const trimmed = value.trim();

            return trimmed
                ? trimmed.split(/\s+/)
                : [];
        }


        function updateWordCount() {

            let words = getWords(textarea.value);


            /*
            |--------------------------------------------------------------------------
            | Prevent more than maximum words
            |--------------------------------------------------------------------------
            */

            if (words.length > maxWords) {

                words = words.slice(0, maxWords);

                textarea.value = words.join(' ');
            }


            const wordCount = words.length;


            /*
            |--------------------------------------------------------------------------
            | Update counter
            |--------------------------------------------------------------------------
            */

            counter.textContent =
                `${wordCount} / ${maxWords} words`;


            /*
            |--------------------------------------------------------------------------
            | Maximum reached
            |--------------------------------------------------------------------------
            */

            if (wordCount >= maxWords) {

                counter.classList.remove(
                    'text-slate-400'
                );

                counter.classList.add(
                    'text-red-500'
                );

            } else {

                counter.classList.remove(
                    'text-red-500'
                );

                counter.classList.add(
                    'text-slate-400'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Error message
            |--------------------------------------------------------------------------
            */

            if (error) {

                if (wordCount >= maxWords) {

                    error.classList.remove('hidden');

                } else {

                    error.classList.add('hidden');
                }
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Count while typing
        |--------------------------------------------------------------------------
        */

        textarea.addEventListener(
            'input',
            updateWordCount
        );


        /*
        |--------------------------------------------------------------------------
        | Initialize
        |--------------------------------------------------------------------------
        */

        updateWordCount();

    });

});
</script>


@include('components.bottom-nav')

@endsection