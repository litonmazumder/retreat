@extends('layouts.dashboard')

@section('title', 'Do’s and Don’ts')

@section('content')

<div class="mx-auto max-w-3xl space-y-8 px-4 py-6 sm:px-6">

    {{-- Header --}}
    <div class="flex items-center gap-3">
        <a href="{{ url()->previous() }}"
           class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-slate-600 transition hover:bg-slate-100 hover:text-[#00477A]"
           aria-label="Go back">
            <i class="fa-solid fa-arrow-left text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Safety & Security Brief</h1>
            <p class="mt-1 text-sm text-slate-500">A few reminders for a safe and enjoyable retreat.</p>
        </div>
    </div>

    {{-- Introduction --}}
    <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5">
        <div class="flex items-start gap-4">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-[#00477A] shadow-sm">
                <i class="fa-solid fa-circle-info text-xl"></i>
            </div>
            <div>
                <h2 class="font-bold text-slate-900">Enjoy the retreat responsibly</h2>
                <p class="mt-1 text-sm leading-6 text-slate-600">
                    Please follow these guidelines while staying at Sarah Resort and taking part in retreat activities.
                </p>
            </div>
        </div>
    </section>

    {{-- Do / Don't cards --}}
<div class="grid gap-4 sm:grid-cols-2">

    {{-- Do's --}}
    <section class="overflow-hidden rounded-2xl border border-emerald-200 bg-white shadow-sm">
        <div class="flex items-center gap-3 px-5 py-4 text-white"
             style="background-color: #047857;">
            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15">
                <i class="fa-solid fa-check text-lg"></i>
            </div>
            <h2 class="text-lg font-bold">Do’s</h2>
        </div>

        <div class="space-y-4 p-4">
            @foreach ([
                'Follow the schedule and be on time for all the events.',
                'During the sessions, please keep your mobile phone silent.',
                'As we will be running around during the day and having fun at night, choose clothes and shoes that make it easier.',
                'Dispose of litter responsibly. Do not throw trash here and there. Use the trash bins only. We still want to keep the venue beautiful for the photos we will be taking!',
                'Enjoy the outdoors, but don’t forget to carry your own mosquito repellent and protect yourself from mosquito bites.',
                'Since Sarah Resort is surrounded by greenery and natural surroundings, there may be poisonous insects and other wildlife in the area. Please be cautious while roaming around the resort premises, especially at night.',
                'Bring your own water bottle and stay hydrated.',
            ] as $item)
                <div class="flex items-start gap-3">
                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-xs font-bold text-emerald-800">
                        {{ $loop->iteration }}
                    </span>
                    <p class="text-sm leading-6 text-slate-700">{{ $item }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Don'ts --}}
    <section class="overflow-hidden rounded-2xl border border-rose-200 bg-white shadow-sm">
        <div class="flex items-center gap-3 px-5 py-4 text-white"
             style="background-color: #BE123C;">
            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15">
                <i class="fa-solid fa-xmark text-lg"></i>
            </div>
            <h2 class="text-lg font-bold">Don’ts</h2>
        </div>

        <div class="space-y-4 p-4">
            @foreach ([
                'Don’t smoke inside the rooms. This is prohibited and subject to penalty by the resort authority.',
                'Don’t climb trees. It might be embarrassing to explain to others!',
                'Please don’t go swimming alone. Do not forget to wear life jackets when boating.',
                'Avoid ziplining if you have a fear of heights or are uncertain about your comfort with such activities.',
                'Do not go outside of the resort alone or at night.',
            ] as $item)
                <div class="flex items-start gap-3">
                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-rose-100 text-xs font-bold text-rose-800">
                        {{ $loop->iteration }}
                    </span>
                    <p class="text-sm leading-6 text-slate-700">{{ $item }}</p>
                </div>
            @endforeach
        </div>
    </section>

</div>

    {{-- Common sense reminder --}}
    <section class="rounded-2xl border border-sky-200 bg-sky-50 p-5 text-center">
        <div class="mx-auto flex h-11 w-11 items-center justify-center rounded-xl bg-white text-sky-700 shadow-sm">
            <i class="fa-solid fa-lightbulb text-xl"></i>
        </div>
        <p class="mt-3 text-sm font-semibold leading-6 text-slate-800">
            Lastly, do what you should do and don’t do what you shouldn’t. Apply your common sense and judgement.
        </p>
    </section>

    {{-- Resort Security --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="flex items-center gap-3 bg-[#00477A] px-5 py-4 text-white">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15">
                <i class="fa-solid fa-shield-halved text-lg"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold">Security at the resort</h2>
                <p class="text-xs text-blue-100">Security arrangements at Sarah Resort</p>
            </div>
        </div>

        <div class="space-y-4 p-4 sm:p-5">
            @foreach ([
                ['icon' => 'fa-expand', 'label' => 'Size', 'detail' => 'The resort covers 163 acres.'],
                ['icon' => 'fa-shield-halved', 'label' => 'Perimeter', 'detail' => 'A 10-foot boundary wall surrounds the resort. A 2-foot steel fence runs on top of the wall.'],
                ['icon' => 'fa-video', 'label' => 'CCTV', 'detail' => 'Most areas are under CCTV surveillance.'],
                ['icon' => 'fa-user-shield', 'label' => 'Guards', 'detail' => 'A dedicated team of more than 50 security personnel provides 24/7 coverage across the premises.'],
                ['icon' => 'fa-dog', 'label' => 'Dogs', 'detail' => 'The resort deploys trained security dogs.'],
            ] as $item)
                <div class="flex items-start gap-3">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-[#00477A]">
                        <i class="fa-solid {{ $item['icon'] }}"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">{{ $item['label'] }}</p>
                        <p class="mt-1 text-sm leading-6 text-slate-600">{{ $item['detail'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- In an Emergency --}}
    <section class="overflow-hidden rounded-2xl border border-amber-200 bg-white shadow-sm">
        <div class="flex items-center gap-3 px-5 py-4 text-white"
     style="background-color: #F59E0B;">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15">
                <i class="fa-solid fa-life-ring text-lg"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold">In an emergency</h2>
                <p class="text-xs text-amber-50">What to do if an emergency occurs</p>
            </div>
        </div>

        <div class="space-y-3 p-4 sm:p-5">
            @foreach ([
                'Stay calm and do not run.',
                'The resort has an active Emergency Response Team (ERT).',
                'Go to the assembly point near the Tower Building.',
            ] as $item)
                <div class="flex items-start gap-3 rounded-xl bg-amber-50 p-3">
                    <i class="fa-solid fa-check-circle mt-0.5 text-amber-700"></i>
                    <p class="text-sm leading-6 text-slate-700">{{ $item }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Fire Safety --}}
    <section class="overflow-hidden rounded-2xl border border-red-200 bg-white shadow-sm">

        {{-- Section Header --}}
        <div class="flex items-center gap-3 px-5 py-4 text-white"
            style="background-color: #B91C1C;">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15">
                <i class="fa-solid fa-fire-extinguisher text-lg"></i>
            </div>

            <div>
                <h2 class="text-lg font-bold">Fire Safety</h2>
                <p class="text-xs text-red-100">Fire safety arrangements and equipment</p>
            </div>
        </div>

        <div class="space-y-4 p-4 sm:p-5">

            {{-- Fire Detection and Exits --}}
            <div class="flex items-start gap-3">
                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-red-50 text-red-700">
                    <i class="fa-solid fa-bell"></i>
                </div>

                <p class="text-sm leading-6 text-slate-700">
                    The resort has smoke detection systems, emergency fire exits and an adequate number of fire extinguishers.
                </p>
            </div>

            {{-- Nearest Fire Station --}}
            <div class="flex items-start gap-3">
                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-red-50 text-red-700">
                    <i class="fa-solid fa-building"></i>
                </div>

                <p class="text-sm leading-6 text-slate-700">
                    The nearest fire station is about 7 km from the resort.
                </p>
            </div>

            {{-- Bus Safety Equipment --}}
            <div class="flex items-start gap-3">
                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-red-50 text-red-700">
                    <i class="fa-solid fa-bus"></i>
                </div>

                <p class="text-sm leading-6 text-slate-700">
                    Every bus will carry one fire extinguisher and one first-aid box.
                </p>
            </div>

        </div>
    </section>

    {{-- Emergency assembly point --}}
    <section class="overflow-hidden rounded-2xl border border-red-200 bg-white shadow-sm">
        <div class="flex items-start gap-3 bg-red-50 p-5">
            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-700">
                <i class="fa-solid fa-triangle-exclamation text-xl"></i>
            </div>
            <div>
                <h2 class="font-bold text-red-900">Emergency assembly point</h2>
                <p class="mt-1 text-sm font-semibold leading-6 text-red-800">
                    In case of emergency, assemble near the Tower Building (see the map below).
                </p>
            </div>
        </div>

        <div class="p-4 sm:p-5">
            <button
                type="button"
                id="emergency-map-open"
                class="group relative block w-full overflow-hidden rounded-xl border border-slate-200 bg-slate-50 text-left"
                aria-label="Enlarge Sarah Resort emergency assembly map">
                <img
                    id="emergency-map-thumbnail"
                    src="{{ asset('images/resort/sarah_resort_emergency_map.png') }}"
                    alt="Sarah Resort map showing the emergency assembly point near the Tower Building"
                    class="h-auto w-full object-contain transition duration-200 group-hover:scale-[1.01]"
                    loading="lazy">
                <span class="absolute bottom-3 right-3 inline-flex items-center gap-2 rounded-full bg-slate-900/80 px-3 py-2 text-xs font-semibold text-white shadow-lg">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                    Tap to zoom
                </span>
            </button>

            <p class="mt-3 text-xs leading-5 text-slate-500">
                Refer to the resort map above to locate the Tower Building and emergency assembly point.
            </p>
        </div>
    </section>

</div>

{{-- Emergency map zoom viewer --}}
<div
    id="emergency-map-modal"
    class="fixed inset-0 z-[1000] hidden items-center justify-center bg-slate-950/95 p-3 sm:p-6"
    role="dialog"
    aria-modal="true"
    aria-label="Enlarged emergency assembly map"
    aria-hidden="true">
    <button
        type="button"
        id="emergency-map-close"
        class="absolute right-4 top-4 z-10 flex h-11 w-11 items-center justify-center rounded-full bg-white/15 text-white transition hover:bg-white/25"
        aria-label="Close enlarged map">
        <i class="fa-solid fa-xmark text-xl"></i>
    </button>
    <div class="flex h-full w-full items-center justify-center overflow-auto">
        <img
            id="emergency-map-large"
            src="{{ asset('images/resort/sarah_resort_emergency_map.png') }}"
            alt="Enlarged Sarah Resort map showing the emergency assembly point near the Tower Building"
            class="max-h-full max-w-full rounded-lg object-contain"
            style="touch-action: pinch-zoom;"
            draggable="false">
    </div>
    <p class="pointer-events-none absolute bottom-4 left-0 right-0 text-center text-xs text-white/75">
        Pinch to zoom on mobile · Press Esc or tap × to close
    </p>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const openButton = document.getElementById('emergency-map-open');
    const modal = document.getElementById('emergency-map-modal');
    const closeButton = document.getElementById('emergency-map-close');

    if (!openButton || !modal || !closeButton) return;

    let previousOverflow = '';

    function openMap() {
        previousOverflow = document.body.style.overflow;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        closeButton.focus();
    }

    function closeMap() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = previousOverflow;
        openButton.focus();
    }

    openButton.addEventListener('click', openMap);
    closeButton.addEventListener('click', closeMap);

    modal.addEventListener('click', function (event) {
        if (event.target === modal) closeMap();
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeMap();
        }
    });
});
</script>

@include('components.bottom-nav')

@endsection
