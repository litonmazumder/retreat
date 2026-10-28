@extends('layouts.dashboard')

@section('title', 'Feedback')

@section('content')

<div x-data="{ day: 1 }" class="px-5 py-6 pb-24">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900">
            Seminar Feedback
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Your feedback helps us improve future Asia Seminars.
        </p>
    </div>

    {{-- Day Tabs --}}
    <div class="mb-8 grid grid-cols-2 gap-3">

        <button
            @click="day=1"
            class="rounded-xl py-3 font-semibold transition"
            :class="day==1 ? 'bg-[#00477A] text-white' : 'bg-slate-100 text-slate-600'">

            Day 1

        </button>

        <button
            @click="day=2"
            class="rounded-xl py-3 font-semibold transition"
            :class="day==2 ? 'bg-[#00477A] text-white' : 'bg-slate-100 text-slate-600'">

            Day 2

        </button>

    </div>

    <form method="POST" action="#">
        @csrf

        {{-- ============================
            DAY 1
        ============================= --}}
        <div x-show="day==1" x-cloak class="space-y-6">

            <div>
                <label class="font-semibold">
                    1. How valuable did you find the Swisscontact Global Update?
                </label>

                <textarea
                    name="q1"
                    rows="4"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3"
                    placeholder="Share one takeaway you'll apply in your work"></textarea>
            </div>

            <div>
                <label class="font-semibold">
                    2. Which SSA Overview update had the biggest impact on you?
                </label>

                <input
                    type="text"
                    name="q2"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3"
                    placeholder="One or two words">
            </div>

            <div>
                <label class="font-semibold">
                    3. Describe the World Café format in one word.
                </label>

                <input
                    type="text"
                    name="q3"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3">
            </div>

            <div>
                <label class="font-semibold">
                    4. What could have been improved in the World Café sessions?
                </label>

                <textarea
                    name="q4"
                    rows="4"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3"></textarea>
            </div>

            <div>

                <label class="block text-lg font-semibold text-slate-900">
                    5. How would you rate the usefulness and relevance of each session?
                </label>

                <p class="mt-1 mb-5 text-sm text-slate-500">
                    <strong>Rating Scale:</strong> 1 = Not useful, 5 = Very useful
                </p>

                @foreach([
                    'Regional Office – Quality Assurance',
                    'Regional Office – Business Administration',
                    'Regional Office – Inclusive Growth'
                ] as $index => $session)

                    <div class="mb-5 rounded-2xl border border-slate-200 bg-white p-5">

                        <p class="mb-4 font-medium text-slate-800">
                            {{ $session }}
                        </p>

                        <div class="flex justify-between gap-2">

                            @for($i=1;$i<=5;$i++)

                                <label class="flex-1 cursor-pointer">

                                    <input
                                        type="radio"
                                        name="day1_session_{{ $index }}"
                                        value="{{ $i }}"
                                        class="peer hidden">

                                    <div
                                        class="rounded-xl border border-slate-300 py-3 text-center font-semibold transition
                                            peer-checked:border-[#00477A]
                                            peer-checked:bg-[#00477A]
                                            peer-checked:text-white">

                                        {{ $i }}

                                    </div>

                                </label>

                            @endfor

                        </div>

                    </div>

                @endforeach

            </div>

            <div>

                <label class="font-semibold">
                    6. How can we better communicate country updates in future events?
                </label>

                <textarea
                    name="q6"
                    rows="5"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3"
                    placeholder="List up to 3 ideas"></textarea>

            </div>

        </div>

        {{-- ============================
            DAY 2
        ============================= --}}

        <div>

            <label class="block text-lg font-semibold text-slate-900">
                1. Please rank the following sessions based on their importance
            </label>

            <p class="mt-1 mb-5 text-sm text-slate-500">
                <strong>Ranking Scale:</strong>
                1 = Least relevant/interesting,
                4 = Most relevant/interesting.
                <br>
                Please assign a different rank to each session.
            </p>

            @foreach([
                'Regenerative Agriculture',
                'Sustainable Tourism',
                'Plastic and Waste Management',
                'Green Skills and Jobs'
            ] as $index => $session)

                <div class="mb-5 rounded-2xl border border-slate-200 bg-white p-5">

                    <div class="mb-4 font-medium">
                        {{ $session }}
                    </div>

                    <select
                        name="day2_rank_{{ $index }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3">

                        <option value="">Select Rank</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>

                    </select>

                </div>

            @endforeach

            <div>

    <label class="block text-lg font-semibold">
        2. How would you rate the event's logistics and organisation?
    </label>

    <p class="mt-1 mb-4 text-sm text-slate-500">
        <strong>Rating Scale:</strong> 1 = Not good, 5 = Very good
    </p>

    <div class="flex justify-between gap-2">

        @for($i=1;$i<=5;$i++)

            <label class="flex-1 cursor-pointer">

                <input
                    type="radio"
                    name="logistics"
                    value="{{ $i }}"
                    class="peer hidden">

                <div class="rounded-xl border border-slate-300 py-3 text-center font-semibold transition
                            peer-checked:border-[#00477A]
                            peer-checked:bg-[#00477A]
                            peer-checked:text-white">

                    {{ $i }}

                </div>

            </label>

        @endfor

    </div>

</div>

        </div>

        <button
            type="submit"
            class="mt-10 w-full rounded-xl bg-[#00477A] py-4 font-semibold text-white">

            Submit Feedback

        </button>

    </form>

</div>

@include('components.bottom-nav')

@endsection