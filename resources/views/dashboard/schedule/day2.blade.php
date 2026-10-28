
@php
    $dayDate = '2026-11-04';

    $daySchedules = $schedules->get($dayDate, collect());

    $styles = [
        'Breakfast' => [
            'border-emerald-500',
            'bg-emerald-50',
            'text-emerald-700',
            'text-emerald-800',
            'border-emerald-200',
        ],
        'বনমেলা: Swisscontact Carnival' => [
            'border-blue-600',
            'bg-white',
            'text-blue-700',
            'text-slate-900',
            'border-slate-200',
        ],
        'Lunch' => [
            'border-emerald-500',
            'bg-emerald-50',
            'text-emerald-700',
            'text-emerald-800',
            'border-emerald-200',
        ],
        'হই হই রই রই' => [
            'border-orange-500',
            'bg-orange-50',
            'text-orange-700',
            'text-orange-800',
            'border-orange-200',
        ],
        'Indoor to Outdoor Transition' => [
            'border-amber-500',
            'bg-amber-50',
            'text-amber-700',
            'text-amber-800',
            'border-amber-200',
        ],
        'Tic Tac Toe Relay' => [
            'border-indigo-500',
            'bg-indigo-50',
            'text-indigo-700',
            'text-indigo-800',
            'border-indigo-200',
        ],
        'Team-Building Games & Activities' => [
            'border-blue-600',
            'bg-white',
            'text-blue-700',
            'text-slate-900',
            'border-slate-200',
        ],
        'চলো ঘুড়ি ওড়াতে যাই' => [
            'border-indigo-500',
            'bg-indigo-50',
            'text-indigo-700',
            'text-indigo-800',
            'border-indigo-200',
        ],
        'Wellbeing Session' => [
            'border-blue-600',
            'bg-white',
            'text-blue-700',
            'text-slate-900',
            'border-slate-200',
        ],
        'Free Time & Venue Exploration' => [
            'border-amber-500',
            'bg-amber-50',
            'text-amber-700',
            'text-amber-800',
            'border-amber-200',
        ],
        'তারা: Dinner, Stargazing & Karaoke Night' => [
            'border-indigo-600',
            'bg-indigo-50',
            'text-indigo-700',
            'text-indigo-900',
            'border-indigo-200',
        ],
    ];

    $icons = [
        'Breakfast' => 'fa-mug-hot',
        'বনমেলা: Swisscontact Carnival' => 'fa-wand-magic-sparkles',
        'Lunch' => 'fa-utensils',
        'Team-Building Games & Activities' => 'fa-people-group',
        'চলো ঘুড়ি ওড়াতে যাই' => 'fa-paper-plane',
        'Wellbeing Session' => 'fa-heart-pulse',
        'Free Time & Venue Exploration' => 'fa-person-walking',
        'তারা: Dinner, Stargazing & Karaoke Night' => 'fa-star',
    ];

    /*
     * Supplemental details retained from the original Day 2 design.
     * Schedule title, times, subtitle, description and venue come
     * from the database.
     */
    $details = [
        'Breakfast' => [
            'location' => 'Club House Restaurant',
        ],
        'বনমেলা: Swisscontact Carnival' => [
            'groups' => [
                'Indoor Activities' => [
                    'icon' => 'fa-palette',
                    'items' => ['Origami', 'Poi spinning', 'Terrarium making'],
                ],
                'Outdoor Activities' => [
                    'icon' => 'fa-wind',
                    'items' => ['Kite making', 'Poetry', 'Photography'],
                ],
            ],
            'people' => 'Nowshin Anjum, Marajul Islam Tushar, Ali Mohammad Moyeth, Ahmed Rifat Kabir Sristy, Monir Hossain, Abul Basar, Salma Akhter, Shohidul Alam, Anika Noor, Ahsan Habib, Nirjan Neeladri',
            'locations' => [
                'Banquet Hall (indoor)',
                'Beside Central Field (outdoor)',
            ],
        ],
        'Lunch' => [
            'location' => 'Club House Restaurant',
        ],
        'হই হই রই রই' => [
            'people' => 'Tawhidul Islam, Marajul Islam',
            'location' => 'Banquet Hall',
        ],
        'Indoor to Outdoor Transition' => [
            'items' => ['Outdoor Snacks at 4:00 PM, Central Field'],
        ],
        'Tic Tac Toe Relay' => [
            'people' => 'Tasmim Sinha, Abir Hossain',
            'location' => 'Central Field',
        ],
        'Team-Building Games & Activities' => [
            'people' => 'Nowshin Anjum',
            'location' => 'Banquet Hall & Central Field',
        ],
                'Team-Building Games & Activities' => [
            'people' => 'Nowshin Anjum',
            'location' => 'Banquet Hall & Central Field',
        ],       
        'চলো ঘুড়ি ওড়াতে যাই' => [
            'location' => 'Central Field',
        ],
        'Wellbeing Session' => [
            'people' => 'Salma Akhter, Mir Rafiat Salman',
            'location' => 'Auditorium',
        ],
        'তারা: Dinner, Stargazing & Karaoke Night' => [
            'items' => ['Dinner', 'Stargazing', 'Karaoke'],
            'people' => 'Zubuyer Kaolin',
            'location' => 'Camp Ground',
        ],
    ];
@endphp

<section class="space-y-6" data-retreat-day="{{ $dayDate }}">

    {{-- Day Header --}}
    <div class="mb-5 rounded-2xl border border-blue-100 bg-blue-50 p-4">
        <div class="flex items-start justify-between gap-4">
            <div class="min-w-0 flex-1">
                <p class="text-xs font-semibold uppercase tracking-widest text-[#00477A]">
                    Wednesday • 4 November 2026
                </p>

                <h2 class="mt-1 text-lg font-bold text-slate-900">
                    Of Kites, Stars &amp; Togetherness
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
                    'border-slate-200',
                ];

                $icon = $icons[$title] ?? 'fa-calendar-day';
                $start = substr((string) $schedule->start_time, 0, 5);
                $end = substr((string) $schedule->end_time, 0, 5);
            @endphp

            <article
                data-schedule-card
                data-start="{{ $start }}"
                data-end="{{ $end }}"
                class="rounded-2xl border-l-4 p-5 {{ $style[0] }} {{ $style[1] }} {{ in_array($title, ['Breakfast', 'Lunch', 'Free Time & Venue Exploration', 'চলো ঘুড়ি ওড়াতে যাই', 'তারা: Dinner, Stargazing & Karaoke Night']) ? '' : 'shadow-sm' }}"
            >
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <p class="text-sm font-semibold {{ $style[2] }}">
                        {{ $start }} – {{ $end }}
                    </p>

                    <span
                        data-schedule-badge
                        class="hidden shrink-0 rounded-full px-3 py-1 text-xs font-bold"
                    ></span>
                </div>

                <h3 class="mt-1 text-lg font-bold {{ $style[3] }}">
                    <i class="fa-solid {{ $icon }} mr-2"></i>
                    {{ $title }}
                </h3>

                @if ($schedule->subtitle)
                    <p class="mt-2 text-sm {{ $style[3] }}">
                        {{ $schedule->subtitle }}
                    </p>
                @endif

                {{-- Carnival activity groups --}}
                @if (!empty($detail['groups']))
                    <div class="mt-3 space-y-3 text-sm text-slate-600">
                        @foreach ($detail['groups'] as $groupTitle => $group)
                            <div>
                                <p class="font-semibold text-slate-700">
                                    <i class="fa-solid {{ $group['icon'] }} mr-2 text-[#00477A]"></i>
                                    {{ $groupTitle }}
                                </p>

                                <ul class="mt-1 list-disc space-y-1 pl-5">
                                    @foreach ($group['items'] as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Activity list --}}
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

                {{-- Facilitators / people --}}
                @if (!empty($detail['people']))
                    <div class="mt-4 border-t {{ $style[4] }} pt-3">
                        <p class="text-sm text-slate-500">
                            <i class="fa-solid fa-users mr-2 text-[#00477A]"></i>
                            {{ $detail['people'] }}
                        </p>
                    </div>
                @endif

                {{-- Locations --}}
                @if (!empty($detail['locations']))
                    <div class="mt-3 space-y-2">
                        @foreach ($detail['locations'] as $location)
                            <p class="text-sm text-slate-600">
                                <i class="fa-solid fa-location-dot mr-2 text-[#00477A]"></i>
                                {{ $location }}
                            </p>
                        @endforeach
                    </div>
                @elseif (!empty($detail['location']) || $schedule->venue)
                    <div class="mt-4 border-t {{ $style[4] }} pt-3">
                        <p class="text-sm {{ $style[3] }}">
                            <i class="fa-solid fa-location-dot mr-2 text-[#00477A]"></i>
                            {{ $detail['location'] ?? $schedule->venue }}
                        </p>
                    </div>
                @endif
            </article>

        @empty
            <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5 text-sm text-amber-800">
                No active Day 2 schedule found for 4 November 2026. Check the schedule date, event ID, and active status.
            </div>
        @endforelse

    </div>
</section>
