@extends('layouts.dashboard')

@section('title', 'SIM Card')

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
            SIM Card
        </h2>

    </div>

    {{-- Introduction --}}
    <section class="mb-10">

        <h1 class="text-4xl font-bold text-slate-800">
            Stay Connected
        </h1>

        <p class="mt-4 leading-8 text-slate-700">

            Upon arrival at
            <strong>Hazrat Shahjalal International Airport, Dhaka</strong>,
            participants may conveniently purchase a tourist SIM card from the
            mobile operator counters located in the arrivals area.

        </p>

    </section>

    {{-- Mobile Operators --}}
    <section class="mb-10 rounded-2xl border border-blue-200 bg-blue-50 p-6">

        <h3 class="text-xl font-semibold text-blue-800">
            Mobile Network Operators
        </h3>

        <p class="mt-3 leading-8 text-slate-700">

            The major mobile operators offering reliable network coverage across
            Dhaka and other major cities are:

        </p>

        <div class="mt-5 flex flex-wrap gap-3">

            <span class="rounded-full bg-white px-4 py-2 text-sm font-medium shadow-sm">
                📶 Grameenphone
            </span>

            <span class="rounded-full bg-white px-4 py-2 text-sm font-medium shadow-sm">
                📶 Robi
            </span>

            <span class="rounded-full bg-white px-4 py-2 text-sm font-medium shadow-sm">
                📶 Banglalink
            </span>

        </div>

    </section>

    {{-- Registration --}}
    <section class="mb-10">

        <h3 class="text-xl font-semibold text-slate-800">
            SIM Card Registration
        </h3>

        <p class="mt-4 leading-8 text-slate-700">

            To obtain a SIM card, participants generally need to present the following documents.

        </p>

        <ul class="mt-6 space-y-4">

            <li class="flex gap-3">
                <span class="mt-1 text-green-600">✔</span>
                <span>Present your passport.</span>
            </li>

            <li class="flex gap-3">
                <span class="mt-1 text-green-600">✔</span>
                <span>Show your Bangladesh visa or immigration entry stamp.</span>
            </li>

            <li class="flex gap-3">
                <span class="mt-1 text-green-600">✔</span>
                <span>Complete a simple registration process.</span>
            </li>

            <li class="flex gap-3">
                <span class="mt-1 text-green-600">✔</span>
                <span>Have your photograph taken at the service counter (usually arranged on-site).</span>
            </li>

        </ul>

    </section>

    {{-- Mobile Data --}}
    <section class="mb-10 rounded-2xl border-l-4 border-green-500 bg-green-50 p-6">

        <div class="flex gap-4">

            <div class="text-3xl">
                📱
            </div>

            <div>

                <h3 class="text-lg font-semibold text-green-800">
                    Mobile Data & Network Coverage
                </h3>

                <p class="mt-3 leading-8 text-slate-700">

                    Data packages are affordable and can usually be activated
                    immediately after registration.

                </p>

                <p class="mt-4 leading-8 text-slate-700">

                    <strong>4G mobile network coverage</strong> is generally
                    excellent throughout Dhaka and other major cities,
                    allowing participants to stay connected during their visit.

                </p>

            </div>

        </div>

    </section>

</div>

@include('components.bottom-nav')

@endsection