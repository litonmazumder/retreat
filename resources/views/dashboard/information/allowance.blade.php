@extends('layouts.dashboard')

@section('title', 'Daily Allowance')

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
            Daily Allowance (DA)
        </h2>

    </div>

    {{-- Overview --}}
    <section class="mb-10">

        <h1 class="text-4xl font-bold text-slate-800">
            Daily Allowance
        </h1>

        <p class="mt-4 leading-8 text-slate-700">

            The Daily Allowance (DA) rate for Bangladesh is

            <span class="font-semibold text-[#00477A]">
                CHF 50 per day
            </span>.

        </p>

    </section>

    {{-- DA Amount --}}
    <section class="mb-10 rounded-2xl border border-blue-200 bg-blue-50 p-6 text-center">

        <p class="text-sm uppercase tracking-wide text-blue-700">
            Daily Allowance
        </p>

        <h2 class="mt-3 text-5xl font-bold text-[#00477A]">
            CHF 50
        </h2>

        <p class="mt-2 text-slate-600">
            Per participant • Per day
        </p>

    </section>

    {{-- Meal Breakdown --}}
    <section class="mb-10">

        <h3 class="mb-5 text-xl font-semibold text-slate-800">
            Meal Breakdown
        </h3>

        <div class="grid gap-4 sm:grid-cols-3">

            <div class="rounded-2xl border p-5 text-center">

                <div class="text-4xl">🍳</div>

                <h4 class="mt-3 font-semibold">
                    Breakfast
                </h4>

                <p class="mt-2 text-3xl font-bold text-[#00477A]">
                    20%
                </p>

            </div>

            <div class="rounded-2xl border p-5 text-center">

                <div class="text-4xl">🍽️</div>

                <h4 class="mt-3 font-semibold">
                    Lunch
                </h4>

                <p class="mt-2 text-3xl font-bold text-[#00477A]">
                    40%
                </p>

            </div>

            <div class="rounded-2xl border p-5 text-center">

                <div class="text-4xl">🍴</div>

                <h4 class="mt-3 font-semibold">
                    Dinner
                </h4>

                <p class="mt-2 text-3xl font-bold text-[#00477A]">
                    40%
                </p>

            </div>

        </div>

    </section>

    {{-- Meals Provided --}}
    <section class="mb-10 rounded-2xl border border-green-200 bg-green-50 p-6">

        <h3 class="text-xl font-semibold text-green-800">
            Meals Provided
        </h3>

        <ul class="mt-5 space-y-4">

            <li class="flex gap-3">
                <span class="text-green-600">✔</span>
                <span>Breakfast is included with your hotel accommodation.</span>
            </li>

            <li class="flex gap-3">
                <span class="text-green-600">✔</span>
                <span>Lunch will be provided during all seminar days.</span>
            </li>

            <li class="flex gap-3">
                <span class="text-green-600">✔</span>
                <span>Dinner will be provided on <strong>13 August 2026</strong>.</span>
            </li>

        </ul>

    </section>

    {{-- Important Notes --}}
    <section class="mb-10 rounded-2xl border-l-4 border-amber-500 bg-amber-50 p-6">

        <h3 class="text-lg font-semibold text-amber-800">
            ⚠ Important Notes
        </h3>

        <ul class="mt-5 space-y-4 leading-7 text-slate-700">

            <li>
                As breakfast is included in the hotel accommodation,
                <strong>only 80% of the Daily Allowance may be claimed.</strong>
            </li>

            <li>
                Any additional meals provided by the organiser or office
                must be deducted from the DA claim accordingly.
            </li>

            <li>
                For the remaining evenings, participants are requested
                to make their own dinner arrangements.
            </li>

        </ul>

    </section>

</div>

@include('components.bottom-nav')

@endsection