@extends('layouts.dashboard')

@section('title', 'Hear')

@section('content')

<div class="mx-auto max-w-4xl px-6 py-6">

    {{-- Header --}}
    <div class="mb-8 flex items-center gap-3">

        <a href="{{ route('experience') }}"
            class="text-slate-700 transition hover:text-[#00477A]">

            <i class="fa-solid fa-arrow-left text-xl"></i>

        </a>

        <h1 class="text-3xl font-bold text-slate-900">
            🎵 Hear
        </h1>

    </div>

    {{-- Hero --}}
    <section class="mb-10">

        <h2 class="text-4xl font-bold text-slate-900">

            শ্রবণ · Srobon

        </h2>

        <p class="mt-3 italic text-slate-500">

            <strong>hearing</strong> /ˈhɪərɪŋ/ (noun)

            · The faculty of perceiving sound.

        </p>

        <blockquote class="mt-6 border-l-4 border-[#00477A] pl-5 italic leading-8 text-slate-700">

            "Listen a little longer,
            and you'll notice that the noise here has a rhythm."

        </blockquote>

    </section>

    {{-- Image --}}
    <section class="mb-10">

        <div class="aspect-square overflow-hidden rounded-3xl border border-slate-200 bg-slate-100">

            <img
                src="{{ asset('images/experience/hear.webp') }}"
                alt="Experience Image"
                class="h-full w-full object-cover">

        </div>

    </section>

    {{-- Spotify --}}
    <section class="rounded-3xl border border-emerald-200 bg-emerald-50 p-10 text-center">

        <div class="mx-auto max-w-2xl">

            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-emerald-100">

                <i class="fa-brands fa-spotify text-5xl text-emerald-600"></i>

            </div>

            <h3 class="mt-6 text-3xl font-bold text-slate-900">

                Sounds of Bangladesh

            </h3>

            <p class="mt-5 leading-8 text-slate-700">

                Every place has its own soundtrack.
                Discover the music, melodies, and atmosphere that make Bangladesh unique through our curated Spotify playlist.

            </p>

            <a href="https://open.spotify.com/playlist/0h10Dlf0QsXgvTIASZIPGL?si=9IKs8Tr6SlSRRNDdJ1c-kQ&utm_source=copy-link&pi=iO1niq0TSOqaA"
                target="_blank"
                rel="noopener"
                class="mt-8 inline-flex items-center gap-3 rounded-2xl bg-emerald-600 px-8 py-4 text-lg font-semibold text-white transition hover:bg-emerald-700">

                <i class="fa-brands fa-spotify text-2xl"></i>

                Listen to the Sounds of Bangladesh

            </a>

        </div>

    </section>

</div>

@include('components.bottom-nav')

@endsection