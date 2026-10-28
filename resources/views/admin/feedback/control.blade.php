@extends('layouts.admin')

@section('title', $feedback->title)

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm font-medium text-[#00477A]">
                Live Feedback
            </p>

            <h1 class="mt-1 text-2xl font-bold text-slate-800">
                {{ $feedback->title }}
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                {{ $feedback->description }}
            </p>

        </div>

        <div>

            @if($presentation?->status === 'Waiting')

                <span class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-600">
                    Waiting

                </span>

            @elseif($presentation?->status === 'Live')

                <span class="rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

                    <span class="mr-1 inline-block h-2 w-2 rounded-full bg-green-500"></span>

                    Live

                </span>

            @elseif($presentation?->status === 'Finished')

                <span class="rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">
                    Finished
                </span>

            @endif

        </div>

    </div>


    {{-- Flash messages --}}
    @if(session('success'))

        <div class="flex items-start gap-3 rounded-2xl border border-green-200 bg-green-50 p-4">

            <i class="fa-solid fa-circle-check mt-1 text-green-600"></i>

            <div>

                <p class="font-semibold text-green-800">
                    Success
                </p>

                <p class="mt-1 text-sm text-green-700">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    @if(session('error'))

        <div class="flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4">

            <i class="fa-solid fa-circle-xmark mt-1 text-red-600"></i>

            <div>

                <p class="font-semibold text-red-800">
                    Error
                </p>

                <p class="mt-1 text-sm text-red-700">
                    {{ session('error') }}
                </p>

            </div>

        </div>

    @endif


    {{-- Main Control --}}
    <div class="grid gap-6 lg:grid-cols-3">


        {{-- Current Question --}}
        <div class="lg:col-span-2">

            <div class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-200">

                @if($presentation?->currentQuestion)

                    @php

                        $currentQuestion = $presentation->currentQuestion;

                        $totalQuestions = $feedback->questions->count();

                        $currentPosition = $feedback->questions
                            ->search(fn ($question) => $question->id === $currentQuestion->id) + 1;

                    @endphp


                    {{-- Question counter --}}
                    <div class="flex items-center justify-between">

                        <span class="text-sm font-semibold text-[#00477A]">

                            Question
                            {{ $currentPosition }}
                            /
                            {{ $totalQuestions }}

                        </span>


                        @if($presentation->show_results)

                            <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">

                                <i class="fa-solid fa-chart-column mr-1"></i>

                                Showing Results

                            </span>

                        @endif

                    </div>


                    {{-- Question --}}
                    <div class="mt-8">

                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">

                            {{ str_replace('_', ' ', $currentQuestion->type) }}

                        </p>

                        <h2 class="mt-3 text-2xl font-bold leading-relaxed text-slate-800">

                            {{ $currentQuestion->title }}

                        </h2>

                        @if($currentQuestion->instruction)

                            <p class="mt-3 text-sm text-slate-500">

                                {{ $currentQuestion->instruction }}

                            </p>

                        @endif

                    </div>


                    {{-- Options --}}
                    @if($currentQuestion->options->count())

                        <div class="mt-8 space-y-3">

                            @foreach($currentQuestion->options as $option)

                                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">

                                    <span class="font-medium text-slate-700">

                                        {{ $option->title }}

                                    </span>

                                </div>

                            @endforeach

                        </div>

                    @endif


                @else

                    {{-- No question yet --}}

                    <div class="flex min-h-[350px] flex-col items-center justify-center text-center">

                        <div class="flex h-20 w-20 items-center justify-center rounded-full bg-blue-50">

                            <i class="fa-solid fa-display text-3xl text-[#00477A]"></i>

                        </div>

                        <h2 class="mt-6 text-2xl font-bold text-slate-800">

                            Ready to start?

                        </h2>

                        <p class="mt-2 max-w-md text-slate-500">

                            Start the feedback session to display the first question to participants.

                        </p>

                    </div>

                @endif

            </div>

        </div>


        {{-- Controls --}}
        <div>

            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

                <h3 class="font-bold text-slate-800">
                    Presentation Controls
                </h3>




{{-- =====================================================
    NAVIGATION
====================================================== --}}

@if($presentation?->status === 'Live')

    <div class="mt-5 space-y-3">

        {{-- Previous / Next --}}

        <div class="grid grid-cols-2 gap-3">

            {{-- Previous --}}

            <form
                method="POST"
                action="{{ route('previous', $feedback) }}"
            >

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-300 bg-white px-4 py-3 font-semibold text-slate-700 transition hover:border-[#00477A] hover:bg-blue-50 hover:text-[#00477A]"
                >

                    <i class="fa-solid fa-arrow-left"></i>

                    Previous

                </button>

            </form>


            {{-- Next --}}

            <form
                method="POST"
                action="{{ route('next', $feedback) }}"
            >

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-2xl bg-[#00477A] px-4 py-3 font-semibold text-white shadow-sm transition hover:bg-[#00375f]"
                >

                    Next

                    <i class="fa-solid fa-arrow-right"></i>

                </button>

            </form>

        </div>


        {{-- =================================================
            RESULTS / NEXT QUESTION
        ================================================== --}}

        @if($presentation->show_results)

            {{-- Currently showing results --}}

            <form
                method="POST"
                action="{{ route('next', $feedback) }}"
            >

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-2xl bg-green-600 py-3 font-semibold text-white transition hover:bg-green-700"
                >

                    <i class="fa-solid fa-arrow-right"></i>

                    Next Question

                </button>

            </form>

        @else

            {{-- Show current question results --}}

            <form
                method="POST"
                action="{{ route('results', $feedback) }}"
            >

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-2xl border border-[#00477A] bg-white py-3 font-semibold text-[#00477A] transition hover:bg-blue-50"
                >

                    <i class="fa-solid fa-chart-column"></i>

                    Show Results

                </button>

            </form>

        @endif


        {{-- =================================================
            PRESENTATION SCREEN
        ================================================== --}}

        <a
            href="{{ route('feedback.presentation', $feedback) }}"
            target="_blank"
            class="flex w-full items-center justify-center gap-2 rounded-2xl bg-slate-900 py-3 font-semibold text-white transition hover:bg-slate-800"
        >

            <i class="fa-solid fa-display"></i>

            Open Presentation Screen

        </a>


        {{-- =================================================
            PARTICIPANT VIEW
        ================================================== --}}

        <a
            href="{{ route('feedback.live', $feedback) }}"
            target="_blank"
            class="flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-300 bg-white py-3 font-semibold text-slate-700 transition hover:bg-slate-50"
        >

            <i class="fa-solid fa-mobile-screen"></i>

            Participant View

        </a>

    </div>

@endif


                @if($presentation?->status === 'Finished')

                    <div class="mt-5 rounded-2xl bg-blue-50 p-4 text-center">

                        <i class="fa-solid fa-circle-check text-2xl text-blue-600"></i>

                        <p class="mt-2 font-semibold text-blue-800">

                            Session Finished

                        </p>

                        <p class="mt-1 text-sm text-blue-600">

                            This feedback presentation has ended.

                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- Question List --}}
    <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

        <div class="flex items-center justify-between">

            <div>

                <h3 class="font-bold text-slate-800">
                    Questions
                </h3>

                <p class="mt-1 text-sm text-slate-500">

                    {{ $feedback->questions->count() }}
                    questions in this feedback session.

                </p>

            </div>

        </div>


        <div class="mt-5 divide-y divide-slate-100">

            @foreach($feedback->questions as $question)

                <div class="flex items-center gap-4 py-4">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-sm font-bold text-slate-600">

                        {{ $loop->iteration }}

                    </div>

                    <div class="min-w-0 flex-1">

                        <p class="font-medium text-slate-700">

                            {{ $question->title }}

                        </p>

                        <p class="mt-1 text-xs uppercase tracking-wide text-slate-400">

                            {{ str_replace('_', ' ', $question->type) }}

                        </p>

                    </div>

                    @if($presentation?->current_question_id === $question->id)

                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                            Current

                        </span>

                    @endif

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection