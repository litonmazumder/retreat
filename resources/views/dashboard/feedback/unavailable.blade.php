@extends('layouts.dashboard')

@section('title', 'Feedback')

@section('content')

<div class="space-y-8 px-5 py-6 pb-24">

    <div class="w-full max-w-md text-center">


        {{-- Icon --}}

        <div
            class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-3xl bg-blue-50"
        >

            <i
                class="fa-regular fa-clock text-3xl text-[#00477A]"
            ></i>

        </div>


        {{-- Heading --}}

        <h1 class="text-2xl font-bold text-slate-900">
            Feedback is not open yet
        </h1>


        {{-- Description --}}

        <p class="mt-3 text-sm leading-6 text-slate-500">

            The feedback form will become available during the
            scheduled feedback session.

        </p>


        {{-- Next feedback information --}}

        @if(isset($nextFeedback) && $nextFeedback)

            <div
                class="mt-6 rounded-2xl border border-blue-100 bg-blue-50 p-5"
            >

                <div class="flex items-center justify-center gap-2">

                    <i
                        class="fa-solid fa-calendar-day text-[#00477A]"
                    ></i>

                    <span class="font-semibold text-slate-800">
                        {{ $nextFeedback->title }}
                    </span>

                </div>


                <div class="mt-4">

                    <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                        Feedback opens
                    </p>

                    <p
                        class="mt-1 text-xl font-bold text-[#00477A]"
                    >
                        {{ $nextFeedback->starts_at->format('g:i A') }}
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ $nextFeedback->starts_at->format('l, F j, Y') }}
                    </p>

                </div>


                @if($nextFeedback->ends_at)

                    <div
                        class="mt-4 border-t border-blue-100 pt-4"
                    >

                        <p class="text-xs text-slate-400">
                            Feedback closes at
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $nextFeedback->ends_at->format('g:i A') }}
                        </p>

                    </div>

                @endif

            </div>

        @else

            <div
                class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5"
            >

                <i
                    class="fa-solid fa-circle-info text-slate-400"
                ></i>

                <p class="mt-2 text-sm text-slate-500">
                    {{ $message ?? 'Feedback is not currently available.' }}
                </p>

            </div>

        @endif


        {{-- Back to Home --}}

        <a
            href="{{ url('/') }}"
            class="mt-6 inline-flex items-center gap-2 rounded-xl bg-[#00477A] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#00375f]"
        >

            <i class="fa-solid fa-house"></i>

            Back to Home

        </a>

    </div>

</div>


@include('components.bottom-nav')

@endsection