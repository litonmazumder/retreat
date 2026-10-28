@extends('layouts.dashboard')

@section('title', 'Useful Mobile Applications')

@section('content')

<div class="mx-auto max-w-3xl px-6 py-6">

    {{-- Header --}}
    <div class="mb-10 flex items-center gap-3">

        <a href="{{ url()->previous() }}"
           class="text-slate-700 transition hover:text-[#00477A]">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-7 w-7"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 19l-7-7 7-7"/>

            </svg>

        </a>

        <h2 class="text-3xl font-bold text-slate-800">
            Useful Mobile Applications
        </h2>

    </div>

    {{-- Intro --}}
    <section class="mb-10">

        <h1 class="text-4xl font-bold text-slate-800">
            Stay Connected & Explore Bangladesh
        </h1>

        <p class="mt-4 leading-8 text-slate-700">
            The following mobile applications will help you communicate,
            travel, recharge your mobile, order food, and shop conveniently
            during your stay in Bangladesh.
        </p>

    </section>

    {{-- Translation --}}
    <section class="mb-10">

        <h3 class="mb-5 text-xl font-semibold text-slate-800">
            🌐 Translation
        </h3>

        <div class="grid gap-4 sm:grid-cols-2">

            <div class="rounded-2xl border p-5 hover:border-[#00477A] transition">
                <h4 class="font-semibold">Google Lens</h4>
                <p class="mt-2 text-sm text-slate-600">
                    Translate text directly using your camera.
                </p>
            </div>

            <div class="rounded-2xl border p-5 hover:border-[#00477A] transition">
                <h4 class="font-semibold">Google Translate / Apple Translate</h4>
                <p class="mt-2 text-sm text-slate-600">
                    Translate conversations and written text.
                </p>
            </div>

        </div>

    </section>

    {{-- Mobile Recharge --}}
    <section class="mb-10">

        <h3 class="mb-5 text-xl font-semibold text-slate-800">
            📱 Mobile Recharge
        </h3>

        <div class="grid gap-4 sm:grid-cols-3">

            <div class="rounded-2xl border p-5">
                <h4 class="font-semibold">MyGP</h4>
                <p class="mt-2 text-sm text-slate-600">
                    For Grameenphone users.
                </p>
            </div>

            <div class="rounded-2xl border p-5">
                <h4 class="font-semibold">MyRobi</h4>
                <p class="mt-2 text-sm text-slate-600">
                    For Robi users.
                </p>
            </div>

            <div class="rounded-2xl border p-5">
                <h4 class="font-semibold">MyBL</h4>
                <p class="mt-2 text-sm text-slate-600">
                    For Banglalink users.
                </p>
            </div>

        </div>

    </section>

    {{-- Communication --}}
    <section class="mb-10">

        <h3 class="mb-5 text-xl font-semibold text-slate-800">
            💬 Communication
        </h3>

        <div class="rounded-2xl border p-5">

            <h4 class="font-semibold">
                WhatsApp
            </h4>

            <p class="mt-2 text-sm text-slate-600">
                Recommended for internet calling and messaging.
            </p>

        </div>

    </section>

    {{-- Transportation --}}
    <section class="mb-10">

        <h3 class="mb-5 text-xl font-semibold text-slate-800">
            🚕 Transportation
        </h3>

        <div class="grid gap-4 sm:grid-cols-2">

            <div class="rounded-2xl border p-5">
                <h4 class="font-semibold">Uber</h4>
                <p class="mt-2 text-sm text-slate-600">
                    Book rides throughout Dhaka.
                </p>
            </div>

            <div class="rounded-2xl border p-5">
                <h4 class="font-semibold">Pathao</h4>
                <p class="mt-2 text-sm text-slate-600">
                    Ride-sharing, bike rides and more.
                </p>
            </div>

        </div>

    </section>

    {{-- Food Delivery --}}
    <section class="mb-10">

        <h3 class="mb-5 text-xl font-semibold text-slate-800">
            🍔 Food Delivery
        </h3>

        <div class="grid gap-4 sm:grid-cols-2">

            <div class="rounded-2xl border p-5">
                <h4 class="font-semibold">Foodpanda</h4>
                <p class="mt-2 text-sm text-slate-600">
                    Order meals from nearby restaurants.
                </p>
            </div>

            <div class="rounded-2xl border p-5">
                <h4 class="font-semibold">Pathao Food</h4>
                <p class="mt-2 text-sm text-slate-600">
                    Local food delivery service.
                </p>
            </div>

        </div>

    </section>

    {{-- Shopping --}}
    <section>

        <h3 class="mb-5 text-xl font-semibold text-slate-800">
            🛍 Online Shopping
        </h3>

        <div class="rounded-2xl border p-5">

            <h4 class="font-semibold">
                Daraz
            </h4>

            <p class="mt-2 text-sm text-slate-600">
                Bangladesh's leading online shopping platform.
            </p>

        </div>

    </section>

</div>

@include('components.bottom-nav')

@endsection