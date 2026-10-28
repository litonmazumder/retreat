@extends('layouts.admin')

@section('title', 'Feedback Results')

@section('content')

<div class="space-y-6">

    {{-- =====================================================
        HEADER
    ====================================================== --}}

    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Feedback Results
            </h1>

            <p class="mt-1 text-slate-500">
                {{ $feedback->title }}
            </p>

        </div>

        <div class="text-right">

            <p class="text-sm text-slate-500">
                Total Responses
            </p>

            <p class="text-2xl font-bold text-[#00477A]">
                {{ $totalResponses }}
            </p>

        </div>

    </div>


    {{-- =====================================================
        QUESTION
    ====================================================== --}}

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-start gap-4">

            <div
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#00477A] text-sm font-bold text-white"
            >
                {{ $question->sort_order }}
            </div>

            <div>

                <h2 class="text-xl font-bold text-slate-800">
                    {{ $question->title }}
                </h2>

                @if($question->instruction)

                    <p class="mt-1 text-sm text-slate-500">
                        {{ $question->instruction }}
                    </p>

                @endif

            </div>

        </div>

    </div>


    {{-- =====================================================
        RATING RESULTS
    ====================================================== --}}

    @if($question->type === 'rating')

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="mb-6">

                <h3 class="text-lg font-semibold text-slate-800">
                    Rating Distribution
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    How participants rated this question
                </p>

            </div>


            <div class="space-y-5">

                @foreach($results as $result)

                    @php
                        $percentage = $totalResponses > 0
                            ? round(($result['total'] / $totalResponses) * 100)
                            : 0;
                    @endphp

                    <div>

                        <div class="mb-2 flex items-center justify-between">

                            <div class="flex items-center gap-2">

                                <span class="text-xl">
                                    ⭐
                                </span>

                                <span class="font-semibold text-slate-700">
                                    {{ $result['value'] }}
                                </span>

                            </div>

                            <div class="text-sm font-semibold text-slate-700">

                                {{ $result['total'] }}

                                <span class="font-normal text-slate-400">
                                    ({{ $percentage }}%)
                                </span>

                            </div>

                        </div>


                        <div class="h-4 overflow-hidden rounded-full bg-slate-100">

                            <div
                                class="h-full rounded-full bg-[#00477A] transition-all"
                                style="width: {{ $percentage }}%"
                            ></div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @endif


    {{-- =====================================================
        SINGLE CHOICE RESULTS
    ====================================================== --}}

    @if($question->type === 'single_choice')

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="mb-6">

                <h3 class="text-lg font-semibold text-slate-800">
                    Response Distribution
                </h3>

            </div>

            <div class="space-y-4">

                @foreach($results as $result)

                    @php
                        $percentage = $totalResponses > 0
                            ? round(($result['total'] / $totalResponses) * 100)
                            : 0;
                    @endphp

                    <div>

                        <div class="mb-2 flex items-center justify-between">

                            <span class="text-sm font-medium text-slate-700">
                                {{ $result['label'] }}
                            </span>

                            <span class="text-sm font-semibold text-slate-700">
                                {{ $result['total'] }}
                                <span class="text-slate-400">
                                    ({{ $percentage }}%)
                                </span>
                            </span>

                        </div>

                        <div class="h-3 overflow-hidden rounded-full bg-slate-100">

                            <div
                                class="h-full rounded-full bg-[#00477A]"
                                style="width: {{ $percentage }}%"
                            ></div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @endif


    {{-- =====================================================
        TEXT RESPONSES
    ====================================================== --}}

    @if(
        $question->type === 'short_text' ||
        $question->type === 'long_text'
    )

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="mb-6">

                <h3 class="text-lg font-semibold text-slate-800">
                    Participant Responses
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Anonymous responses
                </p>

            </div>


            <div class="space-y-3">

                @forelse($results as $response)

                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">

                        <p class="text-sm leading-6 text-slate-700">
                            {{ $response->answer_text }}
                        </p>

                    </div>

                @empty

                    <p class="text-sm text-slate-400">
                        No responses yet.
                    </p>

                @endforelse

            </div>

        </div>

    @endif

</div>

@endsection