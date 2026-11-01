@php
    $dayDate = '2026-11-05';

    $daySchedules = $schedules->get($dayDate, collect());

    $styles = [
        // Meals - Same across all days
        'Breakfast' => [
            'border-amber-500',
            'bg-amber-50',
            'text-amber-700',
            'text-amber-800',
            'border-amber-200',
        ],

        'Lunch' => [
            'border-emerald-500',
            'bg-emerald-50',
            'text-emerald-700',
            'text-emerald-800',
            'border-emerald-200',
        ],

        'Dinner' => [
            'border-orange-500',
            'bg-orange-50',
            'text-orange-700',
            'text-orange-800',
            'border-orange-200',
        ],

        // Packing & Check-out
        'Pack-Up' => [
            'border-slate-500',
            'bg-slate-50',
            'text-slate-700',
            'text-slate-800',
            'border-slate-200',
        ],

        'Check-Out' => [
            'border-cyan-500',
            'bg-cyan-50',
            'text-cyan-700',
            'text-cyan-800',
            'border-cyan-200',
        ],

        // Ceremony & Awards - Same indigo as Day 1
        'Closing Session & Award Ceremony' => [
            'border-indigo-500',
            'bg-indigo-50',
            'text-indigo-700',
            'text-indigo-800',
            'border-indigo-200',
        ],

        // Travel - Same blue as Day 1
        'Departure for Dhaka' => [
            'border-blue-500',
            'bg-blue-50',
            'text-blue-700',
            'text-blue-800',
            'border-blue-200',
        ],
    ];

    $icons = [
        'Breakfast' => 'fa-mug-hot',
        'Lunch' => 'fa-utensils',
        'Dinner' => 'fa-utensils',
        'Pack-Up' => 'fa-suitcase',
        'Check-Out' => 'fa-key',
        'Closing Session & Award Ceremony' => 'fa-trophy',
        'Departure for Dhaka' => 'fa-bus',
    ];

    $details = [
        'Breakfast' => [
            'location' => 'Club House Restaurant',
        ],

        'Pack-Up' => [
        
            'items' => [
                'Time to pack your bags, check your belongings, and get ready for the journey home!',
            ],
        ],
        'Closing Session & Award Ceremony' => [
            'items' => ['Closing session'],
            'location' => 'Beside Central Field',
        ],

        'Check-Out' => [
            'items' => [
                'Return room keys',
                'Check out',
            ],
            'location' => 'Sarah Resort Reception',
        ],

        'Departure for Dhaka' => [
            'items' => [
                'Return journey to Swisscontact Country Office, Dhaka',
            ],
        ],
    ];
@endphp
<section class="space-y-6" data-retreat-day="{{ $dayDate }}">

    {{-- Day Header --}}
    <div class="mb-5 rounded-2xl border border-blue-100 bg-blue-50 p-4">
        <div class="flex items-start justify-between gap-4">

            <div class="min-w-0 flex-1">
                <p class="text-xs font-semibold uppercase tracking-widest text-[#00477A]">
                    Thursday • 5 November 2026
                </p>

                <h2 class="mt-1 text-lg font-bold text-slate-900">
                    Until We Meet Again
                </h2>

                <div class="mt-3 space-y-1 text-sm text-slate-600">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-hotel w-4 text-[#00477A]"></i>
                        <span>Sarah Resort, Gazipur</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-calendar-days w-4 text-[#00477A]"></i>
                        <span>Swisscontact Bangladesh • Annual Retreat 2026</span>
                    </div>
                </div>
            </div>

            <a
                href="https://maps.app.goo.gl/gA2fJzFEQ1ukS2Zv7"
                target="_blank"
                rel="noopener noreferrer"
                title="Open Sarah Resort in Google Maps"
                aria-label="Open Sarah Resort in Google Maps"
                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-[#00477A] shadow-sm transition hover:bg-[#00477A] hover:text-white"
            >
                <i class="fa-solid fa-location-dot"></i>
            </a>

        </div>
    </div>

    {{-- Database-Driven Schedule --}}
    <div class="space-y-5" data-retreat-schedule>

        @forelse ($daySchedules as $schedule)

            @php
                $title = $schedule->title;
                $detail = $details[$title] ?? [];

                $style = $styles[$title] ?? [
                    'border-blue-600',
                    'bg-white',
                    'text-blue-700',
                    'text-slate-900',
                ];

                $icon = $icons[$title] ?? 'fa-calendar-day';

                $start = substr((string) $schedule->start_time, 0, 5);
                $end = substr((string) $schedule->end_time, 0, 5);

                $isDeparture = $title === 'Departure for Dhaka';
            @endphp

            <article
                data-schedule-card
                data-start="{{ $start }}"
                data-end="{{ $end }}"
                class="rounded-2xl border-l-4 p-5 {{ $style[0] }} {{ $style[1] }} {{ in_array($title, ['Breakfast', 'Closing Session & Award Ceremony', 'Departure for Dhaka']) ? '' : 'shadow-sm' }}"
            >

                {{-- Time and live status --}}
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <p class="text-sm font-semibold {{ $style[2] }}">
                        {{ $start }}@if (!$isDeparture || $end !== $start) – {{ $end }}@endif
                    </p>

                    <span
                        data-schedule-badge
                        class="hidden shrink-0 rounded-full px-3 py-1 text-xs font-bold"
                    ></span>
                </div>

                {{-- Activity title --}}
                <h3 class="mt-1 text-lg font-bold {{ $style[3] }}">
                    <i class="fa-solid {{ $icon }} mr-2"></i>
                    {{ $title }}
                </h3>

                {{-- Subtitle --}}
                @if ($schedule->subtitle)
                    <p class="mt-2 text-sm leading-6 {{ $style[3] }}">
                        {{ $schedule->subtitle }}
                    </p>
                @endif

                {{-- Additional activity items --}}
                @if (!empty($detail['items']))
                    <ul class="mt-3 list-disc space-y-1 pl-5 text-sm {{ $style[3] }}">
                        @foreach ($detail['items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                @endif

                {{-- Database description --}}
                @if ($schedule->description)
                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        {{ $schedule->description }}
                    </p>
                @endif

                {{-- Venue --}}
                @php
                    $venue = $detail['location'] ?? $schedule->venue;
                @endphp

                @if ($venue)
                    <div class="mt-4 pt-3">
                        <p class="text-sm {{ $style[3] }}">
                            <i class="fa-solid fa-location-dot mr-2 text-[#00477A]"></i>
                            {{ $venue }}
                        </p>
                    </div>
                @endif

            </article>

        @empty
            <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5 text-sm text-amber-800">
                No active Day 3 schedule found for 5 November 2026. Check the event ID, schedule date, and active status.
            </div>
        @endforelse

    </div>
</section>
