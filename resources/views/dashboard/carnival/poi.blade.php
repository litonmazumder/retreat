@extends('layouts.dashboard')

@section('title', 'Sight')

@section('content')

<div class="mx-auto max-w-4xl px-6 py-6">

    {{-- Header --}}
    <div class="mb-8 flex items-center gap-3">

        <a href="{{ route('experience') }}"
            class="text-slate-700 transition hover:text-[#00477A]">

            <i class="fa-solid fa-arrow-left text-xl"></i>

        </a>

        <h1 class="text-3xl font-bold text-slate-900">
            👁️ Sight
        </h1>

    </div>

    {{-- Hero --}}
    <section class="mb-10">

        <h2 class="text-4xl font-bold text-slate-900">

            দৃষ্টি · Drishti

        </h2>

        <p class="mt-3 italic text-slate-500">

            <strong>sight</strong> /saɪt/ (noun)

            · The faculty or power of seeing.

        </p>

        <blockquote class="mt-6 border-l-4 border-[#00477A] pl-5 italic leading-8 text-slate-700">

            "Some of the most beautiful stories here are never told;
            they can simply be seen in colours, faces, or patterns."

        </blockquote>

    </section>

    {{-- Image --}}
    <section class="mb-10">

        <div class="aspect-square overflow-hidden rounded-3xl border border-slate-200 bg-slate-100">

            <img
                src="{{ asset('images/experience/sight.webp') }}"
                alt="Experience Image"
                class="h-full w-full object-cover">

        </div>

    </section>

    {{-- Jatra --}}
    <section class="mb-10 rounded-3xl border border-[#00477A]/20 bg-blue-50 p-8">

        <h3 class="text-2xl font-bold">

            🏡 A Complete Bangladeshi Experience

        </h3>

        <p class="mt-5 leading-8 text-slate-700">

            For an all-Bangladeshi sensory experience, visit
            <strong>Jatra Bangladesh Ltd.</strong>

            Whether you're looking for authentic Bangla cuisine,
            beautifully curated handicrafts,
            or a unique shopping experience,
            Jatra brings them together under one roof.

        </p>

        <div class="mt-6">

            <a href="https://www.google.com/maps/search/?api=1&query=Jatra+Bangladesh+Ltd"
                target="_blank"
                rel="noopener"
                class="inline-flex items-center gap-2 rounded-xl border border-[#00477A] px-5 py-3 font-medium text-[#00477A] transition hover:bg-[#00477A] hover:text-white">

                <i class="fa-solid fa-location-dot"></i>

                Google Maps

            </a>

        </div>

    </section>

    {{-- Parks --}}
    <section class="mb-10">

        <h3 class="mb-5 text-2xl font-bold">

            🌳 Parks Near Gulshan

        </h3>

        <div class="grid gap-4">

            @foreach([
                'Justice Shahabuddin Ahmed Park',
                'Gulshan Youth Club',
                'Gulshan Society Lake Park'
            ] as $park)

            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($park) }}"
                target="_blank"
                rel="noopener"
                class="group flex items-center justify-between rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-[#00477A] hover:shadow-md">

                <div>

                    <h4 class="font-semibold text-slate-900">

                        {{ $park }}

                    </h4>

                    <!-- <p class="mt-1 text-sm text-slate-500">

                        Nearby park for a relaxing walk.

                    </p> -->

                </div>

                <div class="flex items-center gap-2 text-[#00477A]">

                    <i class="fa-solid fa-location-dot text-lg text-[#00477A] transition group-hover:scale-110"></i>

                </div>

            </a>

            @endforeach

        </div>

    </section>

    {{-- Airport --}}
    <section class="mb-10 rounded-3xl bg-slate-50 p-8">

        <h3 class="text-2xl font-bold">

            ✈️ Before Your Return Flight

        </h3>

        <p class="mt-5 leading-8 text-slate-700">

            If time permits before your departure,
            plan a visit to
            <strong>
                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('Centrepoint Shopping Mall Airport Road Dhaka') }}"
                target="_blank"
                rel="noopener noreferrer">
                    Centrepoint Shopping Mall
                </a>
            </strong>
            located near Hazrat Shahjalal International Airport.

        </p>

        <div class="mt-6 grid gap-3 sm:grid-cols-2">

            @foreach([
                ['🎨','Bhumi Gallery','Ground Floor'],
                ['📚','Kinokuniya Bangladesh','Ground Floor'],
                ['🎬','Star Cineplex','Level 5'],
                ['🍽️','Food Court','Level 5'],
                ['🛒','Unimart','Level 0'],
                ['🛍️','Branded Stores','Level 1-4']
            ] as $place)

            <div class="rounded-2xl border border-slate-200 bg-white p-4">

                <div class="font-semibold">

                    {{ $place[0] }} {{ $place[1] }}

                </div>

                <div class="mt-1 text-sm text-slate-500">

                    {{ $place[2] }}

                </div>

            </div>

            @endforeach

        </div>

    </section>

    {{-- Cox's Bazar --}}
    <section class="rounded-3xl border border-amber-200 bg-amber-50 p-8">

        <h3 class="text-2xl font-bold">

            🌊 If You Have Extra Time

        </h3>

        <p class="mt-5 leading-8 text-slate-700">

            In between all the hustle and bustle,
            if you get the opportunity to explore beyond Dhaka,
            fly to
            <strong>Cox's Bazar</strong>
            and experience the world's longest natural sea beach with your own eyes.

        </p>

        <div class="mt-6">

            <a href="https://www.google.com/maps/search/?api=1&query=Cox's+Bazar+Sea+Beach"
                target="_blank"
                rel="noopener"
                class="inline-flex items-center gap-2 rounded-xl border border-amber-500 px-5 py-3 font-medium text-amber-700 transition hover:bg-amber-500 hover:text-white">

                <i class="fa-solid fa-location-dot"></i>

                Google Maps

            </a>

        </div>

    </section>

</div>

@include('components.bottom-nav')

@endsection