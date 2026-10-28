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


<div
    id="day-navigation"
    class="sticky z-40 w-full bg-white px-5 py-3"
    style="top: var(--header-height, 0px);"
>
    <div class="w-full rounded-3xl border border-slate-200 bg-white p-2 shadow-sm">
        <div class="grid w-full grid-cols-3 gap-2">

            @foreach($seminarDays as $day => $date)

                @php
                    $isConfirmed = $attendanceStatus[$day]['submitted'] ?? false;
                @endphp

                <button
                    type="button"
                    @click="day = {{ $day }}"
                    :aria-pressed="day === {{ $day }} ? 'true' : 'false'"
                    :class="day === {{ $day }}
                        ? 'bg-[#00477A] text-white shadow-md'
                        : 'bg-white text-slate-600 hover:bg-slate-100'"
                    class="relative flex min-w-0 flex-col items-center justify-center rounded-2xl px-1 py-3 text-center touch-manipulation transition-colors duration-150"
                >

                    {{-- Attendance indicator --}}
                    @if($isConfirmed)
                        <span
                            class="absolute right-1 top-1 flex h-5 w-5 items-center justify-center rounded-full bg-green-500 text-white"
                            title="Attendance confirmed"
                        >
                            <i class="fa-solid fa-check text-[10px]"></i>
                        </span>
                    @endif

                    <span class="text-sm font-semibold">
                        Day {{ $day }}
                    </span>

                    <span class="mt-1 text-xs opacity-80">
                        {{ $date->format('d M') }}
                    </span>

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

<div id="day-schedule-start" class="mt-6 min-h-[500px] px-5">

    <div x-show="day === 1" x-cloak>
        @include('dashboard.schedule.day1')
    </div>

    <div x-show="day === 2" x-cloak>
        @include('dashboard.schedule.day2')
    </div>

    <div x-show="day === 3" x-cloak>
        @include('dashboard.schedule.day3')
    </div>

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