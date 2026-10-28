@extends('layouts.dashboard')

@section('title', 'Smell')

@section('content')

<div class="mx-auto max-w-4xl px-6 py-6">

    {{-- Header --}}
    <div class="mb-8 flex items-center gap-3">

        <a href="{{ route('experience') }}"
            class="text-slate-700 transition hover:text-[#00477A]">

            <i class="fa-solid fa-arrow-left text-xl"></i>

        </a>

        <h1 class="text-3xl font-bold text-slate-900">
            🌸 Smell
        </h1>

    </div>

    {{-- Hero --}}
    <section class="mb-10">

        <h2 class="text-4xl font-bold text-slate-900">

            ঘ্রাণ · Ghraan

        </h2>

        <p class="mt-3 italic text-slate-500">

            <strong>smell</strong> /smɛl/ (noun)

            · The faculty of perceiving odours.

        </p>

        <blockquote class="mt-6 border-l-4 border-[#00477A] pl-5 italic leading-8 text-slate-700">

            "The colours will blur, and the sounds will quiet.
            But half a world away,
            a passing scent will bring you right back here."

        </blockquote>

    </section>

    {{-- Image --}}
    <section class="mb-10">

        <div class="aspect-square overflow-hidden rounded-3xl border border-slate-200 bg-slate-100">

            <img
                src="{{ asset('images/experience/smell.webp') }}"
                alt="Experience Image"
                class="h-full w-full object-cover">

        </div>

    </section>

    {{-- Scents to Explore --}}
    <section class="mb-10">

        <h3 class="mb-5 text-2xl font-bold">

            🌺 Scents to Explore

        </h3>

        <div class="grid gap-4">

            @foreach([
                [
                    'name' => 'Halda Valley Tea Lounge',
                    'description' => 'Enjoy the comforting aroma of freshly brewed premium Bangladeshi tea.'
                ],
                [
                    'name' => 'Sundora',
                    'description' => 'Discover luxury perfumes and signature fragrances from around the world.'
                ],
                [
                    'name' => 'Pushpo Nir',
                    'description' => 'Experience the fragrance of fresh flowers and beautifully arranged bouquets.'
                ]
            ] as $place)

            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($place['name']) }}"
                target="_blank"
                rel="noopener"
                class="group flex items-center justify-between rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-[#00477A] hover:shadow-md">

                <div>

                    <h4 class="font-semibold text-slate-900">

                        {{ $place['name'] }}

                    </h4>

                    <p class="mt-2 text-sm leading-6 text-slate-500">

                        {{ $place['description'] }}

                    </p>

                </div>

                <div class="flex items-center gap-2 text-[#00477A]">

                    <i class="fa-solid fa-location-dot text-lg text-[#00477A] transition group-hover:scale-110"></i>

                </div>

            </a>

            @endforeach

        </div>

    </section>

    {{-- Closing Reflection --}}
    <section class="rounded-3xl border border-rose-200 bg-rose-50 p-8">

        <div class="flex gap-4">

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-rose-100">

                <i class="fa-solid fa-seedling text-xl text-rose-600"></i>

            </div>

            <div>

                <h3 class="text-xl font-bold text-slate-900">

                    🌿 Take the Memory Home

                </h3>

                <p class="mt-4 leading-8 text-slate-700">

                    Whether it's the comforting aroma of a freshly brewed cup of tea,
                    the discovery of a new signature fragrance,
                    or the scent of flowers filling an entire street,
                    each place offers a different way to experience Bangladesh.

                </p>

                <p class="mt-5 leading-8 text-slate-700">

                    Some scents you'll take home in a bag,
                    others you'll carry only in memory.

                </p>

            </div>

        </div>

    </section>

</div>

@include('components.bottom-nav')

@endsection