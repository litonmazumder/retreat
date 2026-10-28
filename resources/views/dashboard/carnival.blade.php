
@extends('layouts.dashboard')

@section('title', 'Carnival')

@section('content')
@php
    $activityIcons = [
        'origami' => 'fa-solid fa-palette',
        'terrarium-making' => 'fa-solid fa-seedling',
        'poi-spinning' => 'fa-solid fa-circle-nodes',
        'poetry' => 'fa-solid fa-pen-nib',
        'photowalk' => 'fa-solid fa-camera',
        'kite-making' => 'fa-solid fa-paper-plane',
    ];
@endphp

<div class="bg-gray-50 pb-5">
    <div class="mx-auto max-w-4xl px-4 py-6">

        {{-- Header --}}
        <header class="mb-6 overflow-hidden rounded-3xl bg-[#00477A] p-5 text-white shadow-md sm:p-8">
            <div class="flex items-center justify-between gap-3">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">
                        বনমেলা
                    </h1>

                    <p class="mt-1 text-sm font-medium text-blue-100 sm:text-base">
                        Swisscontact Carnival
                    </p>
                </div>

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white/15 sm:h-14 sm:w-14">
                    <i class="fa-solid fa-tent text-2xl text-white"></i>
                </div>
            </div>

            <p class="mt-4 max-w-lg text-sm leading-6 text-blue-50">
                Discover your workshops, explore your interests, and enjoy
                the carnival with your colleagues.
            </p>
        </header>

        {{-- Section Heading --}}
        <div class="mb-4">
            <h2 class="text-lg font-bold text-gray-900">
                Your Carnival Activities
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Tap an assigned activity to view its details and confirm your attendance.
            </p>
        </div>

        {{-- Activities from the database --}}
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4">
            @forelse ($activities as $activity)
                @php
                    $assignedActivity = $assignedActivities->get($activity->slug);
                    $active = $assignedActivity !== null;
                    $icon = $activityIcons[$activity->slug] ?? 'fa-solid fa-star';
                @endphp

                @if ($active)
                    <a
                        href="{{ route('carnival.show', $activity->slug) }}"
                        class="flex aspect-square flex-col items-center justify-center rounded-xl border border-[#00477A] bg-white p-4 text-center transition hover:bg-blue-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#00477A] active:scale-95"
                    >
                        <i class="{{ $icon }} mb-4 text-3xl text-[#00477A]"></i>

                        <span class="text-sm font-semibold text-gray-900">
                            {{ $activity->name }}
                        </span>

                        <span class="mt-2 text-xs font-medium text-green-700">
                            <i class="fa-solid fa-check"></i> Eligible
                        </span>
                    <x-carnival.wave-time
                        :wave="$assignedActivity->pivot->wave"
                        :start-time="$assignedActivity->pivot->wave === 'wave_1'
                            ? $assignedActivity->wave_1_start_time
                            : $assignedActivity->wave_2_start_time"
                        :end-time="$assignedActivity->pivot->wave === 'wave_1'
                            ? $assignedActivity->wave_1_end_time
                            : $assignedActivity->wave_2_end_time"
                        :show-wave="false"
                        :show-date="true"
                    />
                    </a>
                @else
                    <div
                        class="flex aspect-square flex-col items-center justify-center rounded-xl border border-gray-200 bg-gray-100 p-4 text-center"
                        aria-disabled="true"
                    >
                        <i class="{{ $icon }} mb-4 text-3xl text-gray-400"></i>

                        <span class="text-sm font-medium text-gray-500">
                            {{ $activity->name }}
                        </span>

                        <span class="mt-2 text-xs text-gray-400">
                            <i class="fa-solid fa-lock"></i> Not Eligible
                        </span>
                    </div>
                @endif

            @empty
                <div class="col-span-full rounded-xl border border-gray-200 bg-white p-8 text-center">
                    <i class="fa-solid fa-calendar-xmark text-3xl text-gray-300"></i>
                    <p class="mt-3 font-semibold text-gray-700">
                        No activities available
                    </p>
                    <p class="mt-1 text-sm text-gray-500">
                        Please check again later.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>

@include('components.bottom-nav')

@endsection
