@extends('layouts.dashboard')

@section('content')

<div
    x-data="{
        day: {{ $currentDay }},
        attendanceModal: false,
        attendanceDay: null
    }"
>

{{-- ================= Day Navigation ================= --}}

<div class="sticky top-[100px] z-40 bg-slate-100 px-5 py-3">

    <div class="rounded-3xl bg-white p-2 shadow">

<div class="grid grid-cols-3 gap-2">

    @foreach($seminarDays as $day => $date)

        @php
            $isConfirmed = $attendanceStatus[$day]['submitted'] ?? false;
        @endphp

        <button
            @click="day={{ $day }}"
            :class="day == {{ $day }}
                ? 'bg-[#00477A] text-white shadow-md'
                : 'bg-white text-slate-600 hover:bg-slate-100'"
            class="relative rounded-2xl py-3 transition-all duration-300">

            {{-- Attendance Check --}}
            @if($isConfirmed)

                <div
                    x-data="{ show: false }"
                    class="absolute right-2 top-2">

                    <span
                        @click.stop="show = !show"
                        @mouseenter="show = true"
                        @mouseleave="show = false"
                        class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-full bg-green-500 text-white">

                        <i class="fa-solid fa-check text-[10px]"></i>

                    </span>
                    {{-- Tooltip --}}
                    <div
                        x-cloak
                        x-show="show"
                        x-transition
                        @click.away="show = false"
                        class="absolute right-0 z-50 mt-2 w-56 rounded-xl bg-slate-900 p-3 text-left text-xs text-white shadow-xl">

                        <div class="flex items-start gap-2">

                            <i class="fa-solid fa-circle-check mt-0.5 text-green-400"></i>

                            <div>

                                <p class="font-semibold">
                                    Attendance Confirmed
                                </p>

                                <p class="mt-1 text-slate-300">
                                    Your attendance for <strong>Day {{ $day }}</strong> has been successfully recorded.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            @endif

            <div class="font-semibold">
                Day {{ $day }}
            </div>

            <div class="text-xs opacity-80">
                {{ $date->format('d M') }}
            </div>

        </button>

    @endforeach

</div>

    </div>

</div>

    {{-- =========================
        Flash Messages
    ========================== --}}
    @if(session('success') || session('error'))
        <section class="px-5 pt-5">

            @if(session('success'))

                <div
                    class="mb-4 flex items-start gap-3 rounded-2xl border border-green-200 bg-green-50 p-4">

                    <i class="fa-solid fa-circle-check mt-1 text-green-600"></i>

                    <div>

                        <h4 class="font-semibold text-green-700">

                            Success

                        </h4>

                        <p class="text-sm text-green-700">

                            {{ session('success') }}

                        </p>

                    </div>

                </div>

            @endif

            @if(session('error'))

                <div
                    class="mb-4 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4">

                    <i class="fa-solid fa-circle-xmark mt-1 text-red-600"></i>

                    <div>

                        <h4 class="font-semibold text-red-700">

                            Error

                        </h4>

                        <p class="text-sm text-red-700">

                            {{ session('error') }}

                        </p>

                    </div>

                </div>

            @endif

        </section>
    @endif

{{-- ================= Attendance ================= --}}

@foreach([1,2] as $d)

<div
    x-show="day=={{ $d }}"
    x-transition
    class="mt-5 px-5">

    @if($attendanceStatus[$d]['submitted'])

        <!-- <div class="rounded-3xl border border-green-200 bg-green-50 p-5">

            <div class="flex gap-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-100">

                    <i class="fa-solid fa-circle-check text-green-600"></i>

                </div>

                <div>

                    <h3 class="font-bold text-green-800">

                        Attendance Confirmed

                    </h3>

                    <p class="mt-1 text-sm text-green-700">

                        Your attendance for
                        <strong>Day {{ $d }}</strong>
                        has been recorded successfully.

                    </p>

                </div>

            </div>

        </div> -->

    @elseif($attendanceStatus[$d]['enabled'])

        <div class="rounded-3xl bg-white p-5 shadow border">

            <div class="flex justify-between">

                <div>

                    <p class="text-xs uppercase tracking-widest text-slate-500">

                        Attendance

                    </p>

                    <!-- <h3 class="mt-2 text-xl font-bold">

                        Day {{ $d }}

                    </h3> -->

                    <p class="mt-1 text-sm text-slate-500">

                        Confirm your attendance.

                    </p>

                </div>

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50">

                    <i class="fa-solid fa-user-check text-[#00477A] text-xl"></i>

                </div>

            </div>

            <button
                @click="attendanceModal=true; attendanceDay={{ $d }}"
                class="mt-5 w-full rounded-2xl bg-[#00477A] py-3 font-semibold text-white hover:bg-[#00375f]">

                Confirm Attendance

            </button>

        </div>

        <!-- <div class="rounded-3xl border border-slate-200 bg-slate-100 p-5">

            <div class="flex gap-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-200">

                    <i class="fa-solid fa-clock text-slate-500"></i>

                </div>

                <div>

                    <h3 class="font-semibold">

                        Attendance Not Available

                    </h3>

                    <p class="text-sm text-slate-500">

                        Attendance for Day {{ $d }}
                        will open on
                        {{ $attendanceStatus[$d]['date'] }}
                        at
                        10:00 AM.

                    </p>

                </div>

            </div>

        </div> -->

    @endif

</div>

@endforeach

<div class="mt-6 px-5 min-h-[500px]">

    <template x-if="day == 1">
        @include('dashboard.schedule.day1')
    </template>

    <template x-if="day == 2">
        @include('dashboard.schedule.day2')
    </template>

    <template x-if="day == 3">
        @include('dashboard.schedule.day3')
    </template>

</div>

</div>

<!-- <script>

document.addEventListener('DOMContentLoaded', () => {

    setTimeout(() => {

        showPWAModal();

    }, 2000);

});

</script> -->

@include('components.bottom-nav')

@endsection