@extends('layouts.dashboard')

@section('content')

    <div class="mx-auto max-w-4xl px-6 py-6">

    {{-- Header --}}
    <div class="mb-8 flex items-center gap-3">

        <a href="{{ route('experience') }}"
            class="text-slate-700 transition hover:text-[#00477A]">

            <i class="fa-solid fa-arrow-left text-xl"></i>

        </a>

        <h1 class="text-3xl font-bold text-slate-900">
            🛍️ Touch
        </h1>

    </div>

    {{-- Header --}}
    <section class="mb-10">

        <h2 class="text-4xl font-bold text-slate-900">
            স্পর্শ · Sporsho
        </h1>

        <p class="mt-3 italic text-slate-500">

            <strong>touch</strong> /tʌtʃ/ (noun).

            The faculty of physical, tactile sensation.

        </p>

        <blockquote class="mt-6 border-l-4 border-[#00477A] pl-5 italic leading-8 text-slate-700">

            "Take home more than a souvenir; take home a living heritage, and something your fingers will remember."

        </blockquote>

    </section>

    {{-- Image --}}
    <section class="mb-10">

        <div class="aspect-square overflow-hidden rounded-3xl border border-slate-200 bg-slate-100">

            <img
                src="{{ asset('images/experience/touch.webp') }}"
                alt="Experience Image"
                class="h-full w-full object-cover">

        </div>

    </section>

    @php

    $shops = [
        [
            'name' => 'Aarong',
            'description' => 'Largest collection of traditional handicraft products.',
        ],
        [
            'name' => 'Jatra Bangladesh Ltd.',
            'description' => 'Curated and niche handicraft products.',
        ],
        [
            'name' => 'Beni Boonon',
            'description' => 'Traditional braided jute home décor.',
        ],
        [
            'name' => 'Artisan',
            'description' => 'Export-quality garment products at the lowest price.',
        ],
        [
            'name' => 'Astorion',
            'description' => 'Export-quality garment products at the lowest price.',
        ],
    ];

    $crafts = [
        'Jamdani Saree',
        'Nakshi Kantha',
        'Handwoven textiles',
        'Bamboo and cane crafts',
        'Terracotta pottery',
        'Brass and copperware',
        'Wooden toys',
        'Handmade jewellery',
        'Jute products',
        'Export-quality garment products',
    ];

    $shopping = [
        'Police Plaza Concord Shopping Mall',
        'Gulshan Pink City Shopping Complex',
    ];

    @endphp

    {{-- Places to Shop --}}
    <section class="mb-10">

        <h2 class="text-2xl font-bold text-slate-800">
            Places to Shop
        </h2>

        <div class="mt-5 space-y-4">

            @foreach($shops as $shop)

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between gap-5">

                    <div>

                        <h3 class="text-lg font-semibold">
                            {{ $shop['name'] }}
                        </h3>

                        <p class="mt-2 text-slate-600">
                            {{ $shop['description'] }}
                        </p>

                    </div>

                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($shop['name']) }}"
                        target="_blank"
                        rel="noopener"
                        class="inline-flex items-center gap-2 rounded-xl border border-[#00477A] px-4 py-2 text-sm font-medium text-[#00477A] transition hover:bg-[#00477A] hover:text-white">

                        <i class="fa-solid fa-location-dot"></i>

                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </section>

    {{-- What to Look For --}}
    <section class="mb-10">

        <h2 class="text-2xl font-bold text-slate-800">
            What to Look For
        </h2>

        <div class="mt-5 grid gap-3 sm:grid-cols-2">

            @foreach($crafts as $craft)

            <div class="rounded-xl border border-slate-200 bg-white px-4 py-3 shadow-sm">

                <div class="flex items-center gap-3">

                    <i class="fa-solid fa-hand-sparkles text-[#00477A]"></i>

                    <span>{{ $craft }}</span>

                </div>

            </div>

            @endforeach

        </div>

    </section>

    {{-- Did You Know --}}
    <section class="rounded-2xl border border-green-200 bg-green-50 p-6 mb-10">

        <div class="flex items-start gap-4">

            <i class="fa-solid fa-circle-info mt-1 text-xl text-green-700"></i>

            <div>

                <h2 class="font-semibold text-green-900">
                    Did You Know?
                </h2>

                <p class="mt-2 leading-7 text-green-800">
                    Bangladesh's <strong>Jamdani weaving</strong> is recognised by UNESCO as an
                    <strong>Intangible Cultural Heritage of Humanity.</strong>
                </p>

            </div>

        </div>

    </section>

    {{-- For Everything Else --}}
    <section>

        <h2 class="text-2xl font-bold text-slate-800">
            For Everything Else
        </h2>

        <div class="mt-5 space-y-4">

            @foreach($shopping as $mall)

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-center justify-between gap-5">

                    <div class="flex items-center gap-3">

                        <i class="fa-solid fa-bag-shopping text-xl text-[#00477A]"></i>

                        <span class="font-medium">
                            {{ $mall }}
                        </span>

                    </div>

                    <a href="https://www.google.com/s/search/?api=1&query={{ urlencode($mall) }}"
                        target="_blank"
                        rel="noopener"
                        class="inline-flex items-center gap-2 rounded-xl border border-[#00477A] px-4 py-2 text-sm font-medium text-[#00477A] transition hover:bg-[#00477A] hover:text-white">

                        <i class="fa-solid fa-location-dot"></i>

                        

                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </section>

</div>

@include('components.bottom-nav')

@endsection