@extends('layouts.dashboard')

@section('title', 'Day 1 Feedback')

@section('content')

<div class="mx-auto max-w-2xl px-4 pb-28 sm:px-6">

    {{-- =========================================================
        HEADER
    ========================================================== --}}

    <div class="mb-6 pt-2">

        <div class="flex items-start gap-3">

            <div
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-50"
            >
                <i class="fa-solid fa-comment-dots text-xl text-[#00477A]"></i>
            </div>

            <div>

                <h1 class="text-2xl font-bold text-slate-900">
                    Day 1 Feedback
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    This form takes about three minutes.
                </p>

            </div>

        </div>

    </div>


    {{-- =========================================================
        INTRODUCTION
    ========================================================== --}}

    <!-- <div class="mb-6 rounded-2xl border border-blue-100 bg-blue-50 p-5">

        <div class="flex items-start gap-3">

            <i class="fa-solid fa-circle-info mt-0.5 text-[#00477A]"></i>

            <p class="text-sm leading-6 text-slate-700">
                Thank you for an exciting first day! We promise to read
                your responses. Anything you flag today will help us
                adjust tomorrow and, if feasible, future Asia Seminars.
            </p>

        </div>

    </div> -->


    {{-- =========================================================
        FORM
    ========================================================== --}}

    <form
        method="POST"
        action="{{ route('feedback.submit', $feedback) }}"
        class="space-y-5"
    >

        @csrf


        {{-- =====================================================
            QUESTION 1
            SESSION RATINGS
        ====================================================== --}}

        <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-start gap-3">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#00477A] text-sm font-bold text-white"
                >
                    1
                </div>

                <div>

                    <h2 class="font-semibold leading-6 text-slate-900">
                        How useful/relevant was each of today's sessions to you?
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        1 star = not useful/relevant at all;
                        5 stars = very useful/relevant
                    </p>

                </div>

            </div>


            {{-- Session ratings --}}

            <div class="mt-6 space-y-4">

                @foreach([
                    1 => 'Swisscontact Global Update',
                    2 => 'SSA Overview',
                    3 => 'World Café (Country Updates)',
                    4 => 'Project to Capability: RMG Experience from Bangladesh',
                    5 => 'Blended Finance & Impact Investment',
                ] as $questionId => $session)

                <div class="mb-5 rounded-2xl border border-slate-200 bg-white p-5">

                        <p class="mb-4 font-medium text-slate-800">
                            {{ $session }}
                        </p>

                        <div class="flex justify-between gap-2">

                            @for($rating=1;$rating<=5;$rating++)

                                <label class="flex-1 cursor-pointer">

                                    <input
                                        type="radio"
                                        name="answers[{{ $questionId }}]"
                                        value="{{ $rating }}"
                                        class="peer hidden">

                                    <div
                                        class="rounded-xl border border-slate-300 py-3 text-center font-semibold transition
                                            peer-checked:border-[#00477A]
                                            peer-checked:bg-[#00477A]
                                            peer-checked:text-white">

                                                <span class="text-xl">
                                                    ⭐
                                                </span>

                                                <span class="mt-1 text-xs font-bold">
                                                    {{ $rating }}
                                                </span>

                                    </div>

                                </label>

                            @endfor

                        </div>

                    </div>


                @endforeach

            </div>

        </div>


        {{-- =====================================================
            QUESTION 2
            OVERALL DAY 1
        ====================================================== --}}

        <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-start gap-3">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#00477A] text-sm font-bold text-white">
                    2
                </div>

                <div>

                    <h2 class="font-semibold leading-6 text-slate-900">
                        Overall, how would you rate Day 1?
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        1 star = not useful/relevant at all;
                        5 stars = very useful/relevant
                    </p>

                </div>

            </div>


            <div class="mt-6 space-y-4">

                <!-- <p class="mb-4 text-sm font-semibold text-slate-800">
                    Overall
                </p> -->

                <div class="flex justify-between gap-2">

                    @for($rating = 1; $rating <= 5; $rating++)

                        <label class="cursor-pointer">

                            <input
                                type="radio"
                                name="answers[6]"
                                value="{{ $rating }}"
                                class="peer sr-only"
                                required
                            >

                                    <div
                                        class="rounded-xl border border-slate-300 py-3 text-center font-semibold transition
                                            peer-checked:border-[#00477A]
                                            peer-checked:bg-[#00477A]
                                            peer-checked:text-white">

                                <span class="text-xl">
                                    ⭐
                                </span>

                                <span class="mt-1 text-xs font-bold">
                                    {{ $rating }}
                                </span>

                            </div>

                        </label>

                    @endfor

                </div>

            </div>

        </div>


        {{-- =====================================================
            QUESTION 3
            PRESENTATION / DISCUSSION
        ====================================================== --}}

        <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-start gap-3">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#00477A] text-sm font-bold text-white">
                    3
                </div>

                <div>

                    <h2 class="font-semibold leading-6 text-slate-900">
                        How was the balance between presentation and discussion today?
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Select one
                    </p>

                </div>

            </div>


            <div class="mt-5 space-y-3">

                @foreach([
                    1 => 'Too much presentation, not enough discussion',
                    2 => 'Perfect',
                    3 => 'Too much discussion, not enough content',
                    4 => 'The issue was something else (please note it in Question 5)',
                ] as $optionId => $option)

                    <label class="block cursor-pointer">

                        <input
                            type="radio"
                            name="answers[7]"
                            value="{{ $optionId }}"
                            class="peer sr-only"
                            required
                        >

                        <div
                            class="
                                rounded-2xl
                                border
                                border-slate-200
                                p-4
                                transition
                                hover:border-[#00477A]
                                hover:bg-blue-50
                                peer-checked:border-[#00477A]
                                peer-checked:bg-blue-50
                            "
                        >

                            <div class="flex items-start gap-3">

                                <div
                                    class="
                                        mt-0.5
                                        h-5
                                        w-5
                                        shrink-0
                                        rounded-full
                                        border-2
                                        border-slate-300
                                        peer-checked:border-[#00477A]
                                    "
                                ></div>

                                <span class="text-sm leading-5 text-slate-700">
                                    {{ $option }}
                                </span>

                            </div>

                        </div>

                    </label>

                @endforeach

            </div>

        </div>


        {{-- =====================================================
            QUESTION 4
            TAKEAWAY
        ====================================================== --}}

        <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-start gap-3">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#00477A] text-sm font-bold text-white">
                    4
                </div>

                <div>

                    <h2 class="font-semibold leading-6 text-slate-900">
                        Name one thing from today that you will take back to your country office.
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Your answer should be 25 words or fewer.
                    </p>

                </div>

            </div>


            <textarea
                name="answers[8]"
                rows="4"
                maxlength="500"
                required
                class="
                    mt-5
                    w-full
                    resize-none
                    rounded-2xl
                    border
                    border-slate-300
                    bg-slate-50
                    p-4
                    text-sm
                    leading-6
                    outline-none
                    transition
                    focus:border-[#00477A]
                    focus:bg-white
                    focus:ring-2
                    focus:ring-blue-100
                "
                placeholder="Your answer..."
            >{{ old('answers.8') }}</textarea>

            <p class="mt-2 text-xs text-slate-400">
                Maximum 25 words
            </p>

        </div>


        {{-- =====================================================
            QUESTION 5
            KEEP / CHANGE
        ====================================================== --}}

        <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-start gap-3">

                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#00477A] text-sm font-bold text-white">
                    5
                </div>

                <div>

                    <h2 class="font-semibold leading-6 text-slate-900">
                        For tomorrow, name one thing the organisers should keep doing, and one thing they should change.
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Answer in 25 words or fewer.
                    </p>

                </div>

            </div>


            {{-- KEEP --}}

            <div class="mt-6">

                <label
                    for="keep"
                    class="mb-2 block text-sm font-semibold text-slate-800"
                >
                    Keep
                </label>

                <textarea
                    id="keep"
                    name="answers[9]"
                    rows="3"
                    maxlength="500"
                    required
                    class="
                        w-full
                        resize-none
                        rounded-2xl
                        border
                        border-slate-300
                        bg-slate-50
                        p-4
                        text-sm
                        leading-6
                        outline-none
                        transition
                        focus:border-[#00477A]
                        focus:bg-white
                        focus:ring-2
                        focus:ring-blue-100
                    "
                    placeholder="What should the organisers keep doing?"
                >{{ old('answers.9') }}</textarea>

            </div>


            {{-- CHANGE --}}

            <div class="mt-5">

                <label
                    for="change"
                    class="mb-2 block text-sm font-semibold text-slate-800"
                >
                    Change
                </label>

                <textarea
                    id="change"
                    name="answers[10]"
                    rows="3"
                    maxlength="500"
                    required
                    class="
                        w-full
                        resize-none
                        rounded-2xl
                        border
                        border-slate-300
                        bg-slate-50
                        p-4
                        text-sm
                        leading-6
                        outline-none
                        transition
                        focus:border-[#00477A]
                        focus:bg-white
                        focus:ring-2
                        focus:ring-blue-100
                    "
                    placeholder="What should the organisers change?"
                >{{ old('answers.10') }}</textarea>

            </div>

            <p class="mt-3 text-xs text-slate-400">
                Maximum 25 words for each response
            </p>

        </div>


        {{-- =====================================================
            SUBMISSION NOTICE
        ====================================================== --}}

        <div class="rounded-2xl border border-blue-100 bg-blue-50 p-5">

            <div class="flex items-start gap-3">

                <i class="fa-solid fa-circle-info mt-0.5 text-[#00477A]"></i>

                <div>

                    <p class="text-sm font-semibold text-slate-800">
                        Before you submit
                    </p>

                    <p class="mt-1 text-xs leading-5 text-slate-600">
                        Please review your answers. You will submit all
                        Day 1 feedback together.
                    </p>

                </div>

            </div>

        </div>


        {{-- =====================================================
            SUBMIT BUTTON
        ====================================================== --}}

        <button
            type="submit"
            class="
                flex
                w-full
                items-center
                justify-center
                gap-2
                rounded-2xl
                bg-[#00477A]
                py-4
                text-sm
                font-semibold
                text-white
                shadow-lg
                transition
                hover:bg-[#00375f]
                active:scale-[0.99]
            "
        >

            <i class="fa-solid fa-paper-plane"></i>

            Submit Day 1 Feedback

        </button>


        <p class="pb-4 text-center text-xs text-slate-400">
            Your feedback helps us improve future Asia Seminars.
        </p>

    </form>

</div>


@include('components.bottom-nav')

@endsection