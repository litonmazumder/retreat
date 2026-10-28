@extends('layouts.dashboard')

@section('title', $activity['name'])

@section('content')

@php
    $isFacilitator = $isFacilitator ?? false;
    $wave1Participants = $wave1Participants ?? collect();
    $wave2Participants = $wave2Participants ?? collect();
@endphp

<div class="mx-auto max-w-4xl px-4 py-6 sm:px-6">

    {{-- Header --}}
    <div class="mb-8 flex items-center gap-3">
        <a href="{{ route('carnival') }}"
           class="text-slate-700 transition hover:text-[#00477A]"
           aria-label="Back to Carnival">
            <i class="fa-solid fa-arrow-left text-xl"></i>
        </a>

        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">
                <i class="{{ $activity->icon }} text-2xl"></i> {{ $activity['name'] }}
            </h1>
            <!-- <p class="mt-1 text-sm text-slate-500">
                Swisscontact Carnival
            </p> -->
        </div>
    </div>

<section class="mb-10">

    <h2 class="text-4xl font-bold text-slate-900">
        {{ $activity->heading ?? $activity->name }}
    </h2>

    @if ($activity->subtitle)
        <p class="mt-3 italic text-slate-500">
            {{ $activity->subtitle }}
        </p>
    @endif

</section>


@if ($isFacilitator)

    @php
        $waves = [
            'wave_1' => [
                'label' => 'Wave 1',
                'time' => '10:00 AM – 10:40 AM',
                'participants' => $wave1Participants,
            ],
            'wave_2' => [
                'label' => 'Wave 2',
                'time' => '11:00 AM – 11:40 AM',
                'participants' => $wave2Participants,
            ],
        ];

        $allParticipants = $wave1Participants->concat($wave2Participants);

        $totalAssigned = $allParticipants->count();
        $totalConfirmed = $allParticipants->whereNotNull('confirmed_at')->count();
        $totalPending = $totalAssigned - $totalConfirmed;
        $totalAttended = $allParticipants->whereNotNull('attended_at')->count();
@endphp

    <div class="space-y-6">

        {{-- Dashboard heading --}}
        <section class="rounded-2xl bg-[#00477A] p-5 text-white sm:p-6">
            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/15">
                    <i class="fa-solid fa-clipboard-user text-2xl"></i>
                </div>

                <div>
                    <h2 class="text-xl font-bold sm:text-2xl">
                        Facilitator Dashboard
                    </h2>
                    <p class="mt-1 text-sm text-blue-100">
                        {{ $activity['name'] }} · Participant attendance
                    </p>
                </div>
            </div>
        </section>

        {{-- Wave tabs --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white">

            <div class="grid grid-cols-2 border-b border-slate-200">

                @foreach ($waves as $waveKey => $wave)
                    <button
                        type="button"
                        data-wave-tab="{{ $waveKey }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                        class="border-b-2 px-3 py-4 text-center transition
                            {{ $loop->first
                                ? 'border-[#00477A] bg-blue-50 text-[#00477A]'
                                : 'border-transparent text-slate-500 hover:bg-slate-50' }}"
                    >
                        <span class="block font-bold">
                            {{ $wave['label'] }}
                        </span>

                        <span class="mt-1 block text-xs">
                            {{ $wave['time'] }}
                        </span>

                        <span class="mt-2 inline-block rounded-full bg-white px-2 py-1 text-xs font-semibold">
                            {{ $wave['participants']->count() }} assigned
                        </span>
                    </button>
                @endforeach

            </div>

            {{-- Wave participant lists --}}
            @foreach ($waves as $waveKey => $wave)

                <div
                    data-wave-panel="{{ $waveKey }}"
                    class="{{ $loop->first ? '' : 'hidden' }}"
                >

                    {{-- Wave summary --}}
                    @php
                        $waveConfirmed = $wave['participants']
                            ->whereNotNull('confirmed_at')->count();

                        $waveAttended = $wave['participants']
                            ->whereNotNull('attended_at')->count();
                    @endphp

                    <div class="border-b border-slate-100 bg-slate-50 p-4">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <div>
                                <h3 class="font-bold text-slate-900">
                                    {{ $wave['label'] }} Participants
                                </h3>
                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $waveConfirmed }} of
                                    {{ $wave['participants']->count() }}
                                    confirmed · {{ $waveAttended }} attended
                                </p>
                            </div>
                        </div>

                        {{-- Status filters --}}
                        <div class="mt-4 flex flex-wrap gap-2">
                            <button
                                type="button"
                                data-status-filter="all"
                                class="rounded-full bg-[#00477A] px-3 py-2 text-xs font-semibold text-white"
                            >
                                All
                            </button>

                            <button
                                type="button"
                                data-status-filter="pending"
                                class="rounded-full border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-600"
                            >
                                Pending confirmation
                            </button>

                            <button
                                type="button"
                                data-status-filter="confirmed"
                                class="rounded-full border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-600"
                            >
                                Confirmed
                            </button>

                            <!-- <button
                                type="button"
                                data-status-filter="attended"
                                class="rounded-full border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-600"
                            >
                                Attended
                            </button> -->
                        </div>
                    </div>

                    {{-- Participant list --}}
                    <div class="divide-y divide-slate-100">

                        @forelse ($wave['participants'] as $person)

                            @php
                                $isConfirmed = !empty($person->confirmed_at);
                                $hasAttended = !empty($person->attended_at);
                            @endphp

                            <div
                                data-participant-row
                                data-confirmed="{{ $isConfirmed ? 'yes' : 'no' }}"
                                data-attended="{{ $hasAttended ? 'yes' : 'no' }}"
                                class="flex items-start gap-3 p-4 sm:items-center sm:px-5"
                            >

                                {{-- Participant initials --}}
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#00477A]/10 font-bold text-[#00477A]">
                                    {{ strtoupper(substr($person->first_name, 0, 1)) }}{{ strtoupper(substr($person->last_name ?? '', 0, 1)) }}
                                </div>

                                {{-- Participant information --}}
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold text-slate-900">
                                        {{ $person->first_name }} {{ $person->last_name }}
                                    </p>

                                    <p class="mt-1 break-all text-xs text-slate-500">
                                        {{ $person->email }}
                                    </p>

                                    <div class="mt-2 flex flex-wrap gap-2">

                                        @if ($isConfirmed)
                                            <span class="rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-700">
                                                <i class="fa-solid fa-check mr-1"></i>
                                                Confirmed
                                            </span>
                                        @else
                                            <span class="rounded-full bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                                <i class="fa-regular fa-clock mr-1"></i>
                                                Pending
                                            </span>
                                        @endif

                                        <!-- @if ($hasAttended)
                                            <span class="rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-700">
                                                <i class="fa-solid fa-user-check mr-1"></i>
                                                Attended
                                            </span>
                                        @else
                                            <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">
                                                Not recorded
                                            </span>
                                        @endif -->

                                    </div>
                                </div>

                            </div>

                        @empty

                            <div class="p-8 text-center">
                                <i class="fa-solid fa-users text-3xl text-slate-300"></i>
                                <p class="mt-3 font-semibold text-slate-700">
                                    No participants assigned
                                </p>
                                <p class="mt-1 text-sm text-slate-500">
                                    Participants assigned to this wave will appear here.
                                </p>
                            </div>

                        @endforelse

                    </div>
                </div>

            @endforeach

        </section>
    </div>

    {{-- Tabs and filters --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const root = document.querySelector('[data-wave-panel]')?.closest('section')?.parentElement;

            if (!root) return;

            const tabs = root.querySelectorAll('[data-wave-tab]');
            const panels = root.querySelectorAll('[data-wave-panel]');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const selectedWave = this.dataset.waveTab;

                    tabs.forEach(button => {
                        const active = button === this;

                        button.setAttribute('aria-selected', active ? 'true' : 'false');
                        button.classList.toggle('border-[#00477A]', active);
                        button.classList.toggle('bg-blue-50', active);
                        button.classList.toggle('text-[#00477A]', active);
                        button.classList.toggle('border-transparent', !active);
                        button.classList.toggle('text-slate-500', !active);
                    });

                    panels.forEach(panel => {
                        panel.classList.toggle(
                            'hidden',
                            panel.dataset.wavePanel !== selectedWave
                        );
                    });
                });
            });

            panels.forEach(panel => {
                const filters = panel.querySelectorAll('[data-status-filter]');

                filters.forEach(filterButton => {
                    filterButton.addEventListener('click', function () {
                        const filter = this.dataset.statusFilter;

                        filters.forEach(button => {
                            const active = button === this;

                            button.classList.toggle('bg-[#00477A]', active);
                            button.classList.toggle('text-white', active);
                            button.classList.toggle('border-slate-200', !active);
                            button.classList.toggle('bg-white', !active);
                            button.classList.toggle('text-slate-600', !active);
                        });

                        panel.querySelectorAll('[data-participant-row]').forEach(row => {
                            const confirmed = row.dataset.confirmed === 'yes';
                            const attended = row.dataset.attended === 'yes';

                            const visible =
                                filter === 'all' ||
                                (filter === 'confirmed' && confirmed) ||
                                (filter === 'pending' && !confirmed) ||
                                (filter === 'attended' && attended);

                            row.classList.toggle('hidden', !visible);
                        });
                    });
                });
            });
        });
    </script>

@else

 <!-- <section class="mb-8">
        <div class="flex items-center gap-4">
            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-[#00477A]/10">
                <i class="{{ $activity['icon'] }} text-2xl text-[#00477A]"></i>
            </div>

            <div>
                <p class="text-sm font-medium text-[#00477A]">
                    বনমেলা · Swisscontact Carnival
                </p>

                <h2 class="mt-1 text-2xl font-bold text-slate-900 sm:text-3xl">
                    {{ $activity['name'] }}
                </h2>
            </div>
        </div>

        <p class="mt-4 leading-7 text-slate-600">
            {{ $activity['description'] }}
        </p>
    </section> -->

    {{-- Activity Image --}}
    @if (!empty($activity['image']))
        <section class="mb-10">
            <div class="aspect-square overflow-hidden rounded-3xl border border-slate-200 bg-slate-100">
                <img
                    src="{{ asset($activity->image) }}"
                    alt="{{ $activity->name }}"
                    class="h-full w-full object-contain p-6"
                >
            </div>
        </section>
    @endif

    {{-- Activity Details --}}
    <section class="mb-8">
        <h3 class="mb-4 text-xl font-bold text-slate-900">
            <i class="fa-regular fa-calendar mr-2 text-[#00477A]"></i>
            Activity Details
        </h3>

        <div class="divide-y divide-slate-200 rounded-2xl border border-slate-200 bg-white">

            <div class="flex items-start gap-4 px-5 py-4">
                <i class="fa-regular fa-clock mt-1 text-lg text-[#00477A]"></i>
                <div>
                    <x-carnival.wave-time
                        :wave="$wave"
                        :start-time="$start_time"
                        :end-time="$end_time"
                        :show-date="true"
                    />
                </div>
            </div>

            <div class="flex items-start gap-4 px-5 py-4">
                <i class="fa-solid fa-location-dot mt-1 text-lg text-[#00477A]"></i>
                <div>
                    <!-- <p class="text-xs text-slate-500">Venue</p> -->
                    <p class="mt-1 font-medium text-slate-800">
                        {{ $activity['venue'] }}
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4 px-5 py-4">
                <i class="fa-solid fa-users mt-1 text-lg text-[#00477A]"></i>
                <div>
                    <p class="mt-1 font-medium text-slate-800">
                        @forelse ($facilitators as $facilitator)
                            {{ $facilitator->first_name }} {{ $facilitator->last_name }}{{ !$loop->last ? ', ' : '' }}
                        @empty
                            <span class="text-sm text-slate-500">No facilitators assigned yet.</span>
                        @endforelse
                    </p>
                </div>
            </div>

            @if (!empty($activity['facilitators']))
                <div class="flex items-start gap-4 px-5 py-4">
                    <i class="fa-solid fa-users mt-1 text-lg text-[#00477A]"></i>
                    <div>
                        <p class="text-xs text-slate-500">Facilitators</p>

                        <div class="mt-1 space-y-1">
                            @foreach ($activity['facilitators'] as $facilitator)
                                <p class="font-medium text-slate-800">
                                    {{ $facilitator }}
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>

    {{-- Instructions --}}
    <section class="mb-8">
        <h3 class="mb-4 text-xl font-bold text-slate-900">
            <i class="fa-solid fa-list-check mr-2 text-[#00477A]"></i>
            Workshop Instructions
        </h3>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">

            <p class="mb-5 text-sm leading-6 text-slate-600">
                Please review these instructions before joining the activity.
            </p>

            <div class="space-y-4">
                @if ($activity->description)
                    <p class="text-gray-600">
                        {{ $activity->description }}
                    </p>
                @else
                    <p class="text-sm text-gray-500">
                        No description available.
                    </p>
                @endif
            </div>

            @if (!empty($activity['materials']))
                <div class="mt-6 rounded-xl bg-blue-50 p-4">
                    <h4 class="font-semibold text-[#00477A]">
                        <i class="fa-solid fa-toolbox mr-2"></i>
                        What to Bring
                    </h4>

                    <p class="mt-2 text-sm leading-6 text-slate-700">
                        {{ $activity['materials'] }}
                    </p>
                </div>
            @endif

        </div>
    </section>


    {{-- Attendance Confirmation --}}
    <section class="mb-8">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">

            <div class="flex items-start gap-3">
                @unless ($confirmed)
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#00477A]/10">
                    <i class="fa-solid fa-clipboard-check text-lg text-[#00477A]"></i>
                </div>

                    <div>
                        <h3 class="text-lg font-bold text-slate-900">
                            Attendance Confirmation
                        </h3>

                        <!-- <p class="mt-2 text-sm leading-6 text-slate-600">
                            Please confirm whether you plan to participate in this workshop.
                        </p> -->
                    </div>
                @endunless
            </div>

            <!-- @if (session('success'))
                <div class="mt-5 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-800">
                    <i class="fa-solid fa-circle-check mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif -->

            @if (session('error'))
                <div class="mt-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
                    <i class="fa-solid fa-circle-exclamation mr-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            @if ($confirmed)
                <div class="mt-5 flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 p-4">
                    <i class="fa-solid fa-circle-check mt-1 text-lg text-green-700"></i>

                    <div>
                        <p class="font-semibold text-green-800">
                            Attendance Confirmed
                        </p>

                        <p class="mt-1 text-sm leading-6 text-green-700">
                            Your confirmation has been recorded successfully.
                        </p>
                    </div>
                </div>
            @elseif ($isFacilitator)
                <div class="mt-5 rounded-xl border border-blue-200 bg-blue-50 p-4 text-sm text-blue-800">
                    You are assigned as a facilitator for this activity.
                </div>
            @elseif (!$start_time || !$end_time)
                <div class="mt-5 rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-800">
                    Your session schedule is unavailable. Please contact the event team.
                </div>
            @else
                @php
                    $now = now('Asia/Dhaka');

                    $sessionStart = \Illuminate\Support\Carbon::parse(
                        $start_time,
                        'Asia/Dhaka'
                    );

                    $sessionEnd = \Illuminate\Support\Carbon::parse(
                        $end_time,
                        'Asia/Dhaka'
                    );

                    $sessionOpen = $now->gte($sessionStart)
                        && $now->lt($sessionEnd);
                @endphp

                <div class="mt-5 rounded-xl bg-slate-50 p-4">
                    <p class="text-sm font-medium text-slate-700">
                        {{ str_replace('_', ' ', ucfirst($wave ?? 'Assigned session')) }}
                    </p>

                    <p class="mt-1 font-semibold text-slate-900">
                        {{ $sessionStart->format('d M Y') }}
                        &middot;
                        {{ $sessionStart->format('h:i A') }}
                        – {{ $sessionEnd->format('h:i A') }}
                    </p>
                </div>

                @if ($sessionOpen)
                    <p class="mt-4 text-sm text-green-700">
                        <i class="fa-solid fa-circle-check mr-1"></i>
                        Attendance confirmation is open.
                    </p>

                    <button
                        type="button"
                        id="openAttendanceModal"
                        class="mt-4 flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-[#00477A] px-5 py-3 font-semibold text-white transition hover:bg-[#00365D] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#00477A] focus-visible:ring-offset-2"
                    >
                        <i class="fa-solid fa-check"></i>
                        Confirm Attendance
                    </button>
                @elseif ($now->lt($sessionStart))
                    <p class="mt-4 text-sm text-blue-700">
                        <i class="fa-regular fa-clock mr-1"></i>
                        Confirmation opens at {{ $sessionStart->format('h:i A') }}.
                    </p>

                    <button
                        type="button"
                        disabled
                        class="mt-4 min-h-12 w-full cursor-not-allowed rounded-xl bg-slate-200 px-5 py-3 font-semibold text-slate-500"
                    >
                        Confirmation Not Open
                    </button>
                @else
                    <p class="mt-4 text-sm text-red-700">
                        <i class="fa-solid fa-lock mr-1"></i>
                        This session's confirmation window has closed.
                    </p>

                    <button
                        type="button"
                        disabled
                        class="mt-4 min-h-12 w-full cursor-not-allowed rounded-xl bg-slate-200 px-5 py-3 font-semibold text-slate-500"
                    >
                        Session Closed
                    </button>
                @endif

                {{-- Confirmation Modal --}}
                <div
                    id="attendanceConfirmModal"
                    class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-900/60 p-4"
                    role="dialog"
                    aria-modal="true"
                    aria-labelledby="attendanceModalTitle"
                >
                    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl">

                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-blue-50">
                            <i class="fa-solid fa-clipboard-check text-2xl text-[#00477A]"></i>
                        </div>

                        <h3
                            id="attendanceModalTitle"
                            class="mt-4 text-center text-xl font-bold text-slate-900"
                        >
                            Confirm Your Attendance
                        </h3>

                        <p class="mt-2 text-center text-sm leading-6 text-slate-600">
                            Are you sure you want to confirm your attendance for
                            <strong>{{ $activity->name }}</strong>?
                        </p>

                        <div class="mt-4 rounded-xl bg-slate-50 p-4 text-center">
                            <p class="font-semibold text-slate-800">
                                {{ str_replace('_', ' ', ucfirst($wave ?? 'Assigned session')) }}
                            </p>

                            <p class="mt-1 text-sm text-slate-600">
                                {{ $sessionStart->format('d M Y, h:i A') }}
                                – {{ $sessionEnd->format('h:i A') }}
                            </p>
                        </div>

                        <p class="mt-4 text-center text-sm text-slate-500">
                            Please confirm only if you intend to participate.
                        </p>

                        <div class="grid grid-cols-2 gap-3 mt-6">
                            <button
                                type="button"
                                id="cancelAttendanceModal"
                                class="rounded-xl border border-slate-300 px-5 py-3 font-semibold text-slate-700 transition hover:bg-slate-50"
                            >
                                Cancel
                            </button>

                            <form
                                method="POST"
                                action="{{ route('carnival.confirm', ['activity' => $activity->slug]) }}"
                            >
                                @csrf

                                <button
                                    type="submit"
                                    class="w-full rounded-xl bg-[#00477A] px-5 py-3 font-semibold text-white transition hover:bg-[#00365D]"
                                >
                                    <i class="fa-solid fa-check mr-2"></i>
                                    Confirm
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>

    @endif

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('attendanceConfirmModal');
        const openButton = document.getElementById('openAttendanceModal');
        const cancelButton = document.getElementById('cancelAttendanceModal');

        // The modal is only rendered for eligible, unconfirmed participants.
        if (!modal || !openButton || !cancelButton) {
            return;
        }

        function openModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
            cancelButton.focus();
        }

        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
            openButton.focus();
        }

        openButton.addEventListener('click', openModal);
        cancelButton.addEventListener('click', closeModal);

        // Close when clicking the backdrop.
        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        // Close when pressing Escape.
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>


@include('components.bottom-nav')

@endsection