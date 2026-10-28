@extends('layouts.dashboard')

@section('title', 'Taste')

@section('content')

<div class="mx-auto max-w-4xl px-6 py-6">

    {{-- Header --}}
    <div class="mb-8 flex items-center gap-3">

        <a href="{{ route('experience') }}"
            class="text-slate-700 transition hover:text-[#00477A]">

            <i class="fa-solid fa-arrow-left text-xl"></i>

        </a>

        <h1 class="text-3xl font-bold text-slate-900">
            🍜 Taste
        </h1>

    </div>

    {{-- Hero --}}
    <section class="mb-10">

        <h2 class="text-4xl font-bold text-slate-900">

            স্বাদ · Shaad

        </h2>

        <p class="mt-3 italic text-slate-500">

            <strong>taste</strong> /teɪst/ (noun)

            · The perception of flavour in the mouth.

        </p>

        <blockquote class="mt-6 border-l-4 border-[#00477A] pl-5 italic leading-8 text-slate-700">

            "Come hungry, curious, and come a little brave.
            Some foods you will taste, some will test you.
            But both are the point."

        </blockquote>

    </section>

    {{-- Image placeholder --}}
    <!-- <section class="mb-10">

        <div class="aspect-square overflow-hidden rounded-3xl border-2 border-dashed border-slate-300 bg-slate-100">

            <div class="flex h-full items-center justify-center">

                <div class="text-center text-slate-400">

                    <i class="fa-regular fa-image text-6xl"></i>

                    <p class="mt-4">

                        1:1 Experience Image

                    </p>

                </div>

            </div>

        </div>

    </section> -->


    {{-- Image --}}
    <section class="mb-10">

        <div class="aspect-square overflow-hidden rounded-3xl border border-slate-200 bg-slate-100">

            <img
                src="{{ asset('images/experience/taste.webp') }}"
                alt="Experience Image"
                class="h-full w-full object-cover">

        </div>

    </section>

    {{-- Bangla Restaurants --}}
    <section class="mb-10">

        <h3 class="mb-5 text-2xl font-bold">

            🍛 Recommended Bangla Restaurants

        </h3>

        <div class="grid gap-4">

            @foreach([
            [
                'name'=> 'Paturi Banani'
            ],

            [
                'name'=>'Terracotta Tales'
            ],
                        [
                'name'=>'Pagla Baburchi'
            ],

            [
                'name'=>'Durbin Bangla'
            ],

            [
                'name'=>'Tarka'
            ],
                
            ] as $restaurant)

            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($restaurant['name']) }}"
            target="_blank"
            rel="noopener"
            class="group flex items-center justify-between rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-[#00477A] hover:shadow-md">

            <div>
                <h4 class="font-semibold text-slate-900">
                    {{ $restaurant['name'] }}
                </h4>

                <!-- <p class="mt-1 text-sm text-slate-500">
                    Traditional Bangla Restaurant
                </p> -->
            </div>

            <div class="flex items-center gap-2 text-[#00477A]">

                <i class="fa-solid fa-location-dot text-lg text-[#00477A] transition-transform duration-200 group-hover:scale-110"></i>

            </div>

        </a>
        @endforeach
        </div>

    </section>

    {{-- Coffee --}}
    <section class="mb-10">

        <h3 class="mb-5 text-2xl font-bold">
            ☕ Standard Coffee Runs
        </h3>

        <div class="grid gap-4">

            @foreach([
                [
                    'name' => 'North End Coffee Roasters',
                    'map' => 'https://www.google.com/maps/search/?api=1&query=North+End+Coffee+Roasters+Gulshan+2+Dhaka',
                ],
                [
                    'name' => 'The Local Coffee Gulshan',
                    'map' => 'https://www.google.com/maps/search/?api=1&query=The+Local+Coffee+Gulshan+Dhaka',
                ],
                [
                    'name' => 'Uppercrust Boulangerie & Patisserie',
                    'map' => 'https://www.google.com/maps/search/?api=1&query=Uppercrust+Boulangerie+%26+Patisserie+Gulshan+Dhaka',
                ],
            ] as $coffee)

                <a href="{{ $coffee['map'] }}"
                target="_blank"
                rel="noopener"
                class="group flex items-center justify-between rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-[#00477A] hover:shadow-md">

                    <div class="flex items-center gap-4">

                        <!-- <div class="flex h-11 w-11 items-center justify-center rounded-full bg-amber-100">
                            <i class="fa-solid fa-mug-hot text-amber-600"></i>
                        </div> -->

                        <span class="font-medium text-slate-800">
                            {{ $coffee['name'] }}
                        </span>

                    </div>

                    <i class="fa-solid fa-location-dot text-lg text-[#00477A] transition-transform duration-200 group-hover:scale-110"></i>

                </a>

            @endforeach

        </div>

    </section>

    {{-- Tea --}}
    <section class="mb-10">

        <h3 class="mb-5 text-2xl font-bold">
            🍵 Roadside Tea Hauls
        </h3>

        <div class="grid gap-4">

            @foreach([
                [
                    'name' => 'Tiffinbox',
                    'map' => 'https://www.google.com/maps/search/?api=1&query=Tiffinbox+Gulshan+Dhaka',
                ],
                [
                    'name' => 'Cha Chai (চা চাই)',
                    'map' => 'https://www.google.com/maps/search/?api=1&query=Cha+Chai+Gulshan+Dhaka',
                ],
                [
                    'name' => 'Cha & Chill',
                    'map' => 'https://www.google.com/maps/search/?api=1&query=Cha+%26+Chill+Dhaka',
                ],
            ] as $tea)

                <a href="{{ $tea['map'] }}"
                target="_blank"
                rel="noopener"
                class="group flex items-center justify-between rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-[#00477A] hover:shadow-md">

                    <div class="flex items-center gap-4">

                        <!-- <div class="flex h-11 w-11 items-center justify-center rounded-full bg-green-100">
                            <i class="fa-solid fa-mug-saucer text-green-700"></i>
                        </div> -->

                        <span class="font-medium text-slate-800">
                            {{ $tea['name'] }}
                        </span>

                    </div>

                    <i class="fa-solid fa-location-dot text-lg text-[#00477A] transition group-hover:scale-110"></i>

                </a>

            @endforeach

        </div>

    </section>

    {{-- Nightlife --}}
    <section class="mb-10">

        <h3 class="mb-5 text-2xl font-bold">
            🍸 Late-night Bar Hopping
        </h3>

        <div class="grid gap-4">

            @foreach([
                [
                    'name' => 'Loki Restaurant & Bar',
                    'map' => 'https://www.google.com/maps/search/?api=1&query=Loki+Restaurant+%26+Bar+Dhaka',
                ],
                [
                    'name' => 'TRIBE Rooftop Lounge',
                    'map' => 'https://www.google.com/maps/search/?api=1&query=TRIBE+Rooftop+Lounge+Dhaka',
                ],
                [
                    'name' => 'Yumi at Sheraton',
                    'map' => 'https://www.google.com/maps/search/?api=1&query=Yumi+at+Sheraton+Dhaka',
                ],
            ] as $bar)

                <a href="{{ $bar['map'] }}"
                target="_blank"
                rel="noopener"
                class="group flex items-center justify-between rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-[#00477A] hover:shadow-md">

                    <div class="flex items-center gap-4">
<!-- 
                        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-rose-100">
                            <i class="fa-solid fa-martini-glass text-rose-600"></i>
                        </div> -->

                        <span class="font-medium text-slate-800">
                            {{ $bar['name'] }}
                        </span>

                    </div>

                    <i class="fa-solid fa-location-dot text-lg text-[#00477A] transition group-hover:scale-110"></i>

                </a>

            @endforeach

        </div>

    </section>

    {{-- Fruits --}}
    <section class="rounded-3xl bg-orange-50 p-8">

        <h3 class="text-2xl font-bold">

            🥭 Traditional Fruits

        </h3>

        <p class="mt-5 leading-8 text-slate-700">

            Beyond food, if you'd like to experience Bangladesh's
            traditional and seasonal fruits, visit

            <strong>Unimart Gulshan-1</strong>

            or

            <strong>Unimart Gulshan-2</strong>.

        </p>

        <p class="mt-5 leading-8 text-slate-700">

            You can also order fruits through

            <strong>Pandamart</strong>

            using the

            <strong>Foodpanda</strong>

            mobile application.

        </p>

    </section>

</div>

@include('components.bottom-nav')

@endsection