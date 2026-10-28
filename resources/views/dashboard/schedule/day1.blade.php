
{{-- Database-Driven Day 1 Schedule --}}
<section class="space-y-6" data-retreat-day="2026-11-03">
@php
    $dayDate = '2026-11-03';

    $daySchedules = $schedules->get($dayDate, collect());

    $styles = [
        'Registration & Breakfast' => ['border-blue-600', 'bg-white', 'text-blue-700'],
        'Departure from Dhaka' => ['border-blue-600', 'bg-white', 'text-blue-700'],
        'Arrival' => ['border-blue-600', 'bg-white', 'text-blue-700'],
        'Opening Ceremony' => ['border-blue-600', 'bg-white', 'text-blue-700'],
        'Lunch & Check-In' => ['border-emerald-500', 'bg-emerald-50', 'text-emerald-700'],
        'GESI Session' => ['border-blue-600', 'bg-white', 'text-blue-700'],
        'Fire & Safety' => ['border-blue-600', 'bg-white', 'text-blue-700'],
        'Team Photo' => ['border-indigo-500', 'bg-indigo-50', 'text-indigo-700'],
        'Free Time & Venue Exploration' => ['border-amber-500', 'bg-amber-50', 'text-amber-700'],
        'Dinner' => ['border-emerald-500', 'bg-emerald-50', 'text-emerald-700'],
        'Cultural Night' => ['border-purple-500', 'bg-purple-50', 'text-purple-700'],
    ];

    $icons = [
        'Registration & Breakfast' => 'fa-mug-hot',
        'Departure from Dhaka' => 'fa-bus',
        'Arrival' => 'fa-door-open',
        'Opening Ceremony' => 'fa-flag',
        'Lunch & Check-In' => 'fa-utensils',
        'GESI Session' => 'fa-people-group',
        'Fire & Safety' => 'fa-fire-extinguisher',
        'Team Photo' => 'fa-camera',
        'Free Time & Venue Exploration' => 'fa-person-walking',
        'Dinner' => 'fa-utensils',
        'Cultural Night' => 'fa-masks-theater',
    ];

    $details = [
        'Registration & Breakfast' => [
            'items' => ['Registration', 'Takeaway breakfast'],
        ],
        'Departure from Dhaka' => [
            'items' => ['Travel to Sarah Resort'],
            'label' => 'Departure Point',
            'place' => 'Swisscontact Country Office',
        ],
        'Arrival' => [
            'items' => ['Arrive at the retreat venue', 'Complete venue registration'],
            'place' => 'Sarah Resort Reception',
        ],
        'Opening Ceremony' => [
            'items' => ['Welcome remarks', 'Safety & security briefing', 'Ice-breaking'],
            'people' => 'Helal Hussain, Tamiz Uddin Mullick, Humaira Ferdous Shifa',
        ],
        'GESI Session' => [
            'items' => ['GESI session for all staff'],
            'people' => 'Nithora Mehrab', 'Azmul Huda'
        ],
        'Fire & Safety' => [
            'items' => ['Fire and safety refresher for all staff'],
            'people' => 'Sabbir Rahman Khan, Moumita A Mallick',
        ],
    ];
@endphp

<div
    class="space-y-5"
    data-retreat-schedule
    data-schedule-date="{{ $dayDate }}"
>
    @forelse ($daySchedules as $schedule)
        @php
            $title = $schedule->title;
            $detail = $details[$title] ?? [];
            $style = $styles[$title] ?? ['border-blue-600', 'bg-white', 'text-blue-700'];
            $icon = $icons[$title] ?? 'fa-calendar-day';
            $start = substr((string) $schedule->start_time, 0, 5);
            $end = substr((string) $schedule->end_time, 0, 5);
        @endphp

        <article
            data-schedule-card
            data-start="{{ $start }}"
            data-end="{{ $end }}"
            class="scroll-mt-28 rounded-2xl border-l-4 p-5 shadow-sm transition {{ $style[0] }} {{ $style[1] }}"
        >
            <p class="flex flex-wrap items-center justify-between gap-2 text-sm font-semibold {{ $style[2] }}">
                <span>{{ $start }} – {{ $end }}</span>

                <span
                    data-schedule-badge
                    class="hidden shrink-0 rounded-full px-2.5 py-1 text-xs font-bold"
                ></span>
            </p>

            <h3 class="mt-1 text-lg font-bold text-slate-900">
                @if ($schedule->icon)
                    <span class="mr-2">{{ $schedule->icon }}</span>
                @else
                    <i class="fa-solid {{ $icon }} mr-2 text-[#00477A]"></i>
                @endif
                {{ $title }}
            </h3>

            @if ($schedule->subtitle)
                <p class="mt-2 text-sm text-slate-600">{{ $schedule->subtitle }}</p>
            @endif

            @if (!empty($detail['items']))
                <ul class="mt-3 list-disc space-y-1 pl-5 text-sm text-slate-600">
                    @foreach ($detail['items'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif

            @if (!empty($detail['people']))
                <div class="mt-4 border-t border-slate-200 pt-3">
                    <p class="mt-1 text-sm text-slate-700">
                        <i class="fa-solid fa-users mr-2 text-[#00477A]"></i>
                        {{ $detail['people'] }}
                    </p>
                </div>
            @endif

            @if (!empty($detail['label']) || !empty($detail['place']) || $schedule->venue)
                <div class="mt-4 border-t border-slate-200 pt-3">
                    @if (!empty($detail['label']))
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                            {{ $detail['label'] }}
                        </p>
                    @endif

                    <p class="mt-1 text-sm text-slate-700">
                        <i class="fa-solid fa-location-dot mr-2 text-[#00477A]"></i>
                        {{ $detail['place'] ?? $schedule->venue }}
                    </p>
                </div>
            @endif

            @if ($schedule->description)
                <p class="mt-3 text-sm text-slate-600">{{ $schedule->description }}</p>
            @endif
        </article>
    @empty
        <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5 text-sm text-amber-800">
            No active Day 1 schedule found. Check the event ID, schedule date, and active status in the database.
        </div>
    @endforelse
</div>

<script src="{{ asset('js/retreat-schedule.js') }}?v=4"></script>
</section>
