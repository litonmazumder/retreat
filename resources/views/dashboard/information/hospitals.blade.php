@extends('layouts.dashboard')

@section('title', 'Hospitals & Medical Assistance')

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
                    d="M15 19l-7-7 7-7" />

            </svg>

        </a>

        <h2 class="text-3xl font-bold text-slate-800">
            Hospitals & Medical Assistance
        </h2>

    </div>

    {{-- Introduction --}}
    <section class="mb-10">

        <h1 class="text-4xl font-bold text-slate-800">
            Medical Support
        </h1>

        <p class="mt-4 leading-8 text-slate-700">

            Should you require medical attention during your stay in Dhaka,
            the following healthcare facilities are recommended. An in-house
            medical consultant is also available at the Renaissance Dhaka
            Gulshan Hotel during designated hours.

        </p>

    </section>

    {{-- Hotel Doctor --}}
    <section class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-6">

        <div class="flex items-start gap-4">

            <i class="fa-solid fa-user-doctor mt-1 text-2xl text-green-700"></i>

            <div class="flex-1">

                <h2 class="text-xl font-semibold text-green-800">
                    In-house Medical Consultant
                </h2>

                <p class="mt-3 text-slate-700">
                    <strong>Dr. Tahmina Yesmin</strong>
                </p>

                <p class="mt-2 text-slate-600">
                    🕘 Available: 9:00 AM – 7:00 PM
                </p>

                <p class="mt-2">
                    📞
                    <a href="tel:+8801704112668"
                        class="font-medium text-[#00477A] hover:underline">
                        +880 1704 112668
                    </a>
                </p>

            </div>

        </div>

    </section>

    {{-- Nearby Hospitals --}}
    <section>

        <h2 class="mb-5 text-2xl font-bold text-slate-800">
            Recommended Hospitals
        </h2>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Travel times are approximate and may vary depending on traffic conditions.
        </p>


        <div class="space-y-5">

            {{-- Square --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <div class="flex items-start justify-between gap-6">

                    <div class="flex-1">

                        <div class="flex items-center gap-3">

                            <h3 class="text-lg font-semibold text-slate-800">
                                Square Hospital Consultation & Diagnostic Centre
                            </h3>

                        </div>

                        <p class="mt-3 leading-7 text-slate-600">
                            📍3rd Floor, Nafi Tower, 53 Gulshan Avenue, Dhaka 1212
                        </p>

                        <div class="mt-5 flex flex-wrap gap-2">

                            <span class="rounded-full bg-blue-50 px-3 py-1 text-sm text-blue-700">
                                🚗 100 m • ~3 min
                            </span>

                            <span class="rounded-full bg-green-50 px-3 py-1 text-sm text-green-700">
                                🕒 7:30 AM – 7:30 PM
                            </span>

                            <a href="tel:+8801313718687"
                                class="rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700 transition hover:bg-slate-200">

                                📞 +880 1313 718687

                            </a>

                        </div>

                    </div>

                    <a href="https://www.google.com/maps/search/?api=1&query=Square+Hospital+Consultation+Diagnostic+Centre+Gulshan"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-xl border border-[#00477A] px-4 py-2 text-sm font-medium text-[#00477A] transition hover:bg-[#00477A] hover:text-white">

                        <i class="fa-solid fa-location-dot"></i>

                        Map

                    </a>

                </div>

            </div>

            {{-- Continental --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <div class="mb-4">
                    <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                        <i class="fa-solid fa-star mr-1"></i>
                        Highly Recommended
                    </span>
                </div>

                <div class="flex items-start justify-between gap-6">

                    <div class="flex-1">

                        <h3 class="text-lg font-semibold text-slate-800">
                            Continental Hospital PLC
                        </h3>

                        <p class="mt-3 leading-7 text-slate-600">
                            📍 Plot 15, Road 71, Gulshan 2, Dhaka 1212
                        </p>

                        <div class="mt-5 flex flex-wrap gap-2">

                            <span class="rounded-full bg-blue-50 px-3 py-1 text-sm text-blue-700">
                                🚗 2.5 km • 8–12 min
                            </span>

                            <span
                                class="rounded-full bg-green-50 px-3 py-1 text-sm text-green-700">
                               🕒 Open 24/7
                            </span>

                            <a href="tel:10666"
                                class="rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700 transition hover:bg-slate-200">
                                ☎ Local: 10666
                            </a>

                            <a href="tel:+8809666610666"
                                class="rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700 transition hover:bg-slate-200">
                                🌍 International: +880 96666 10666
                            </a>

                        </div>

                    </div>

                    <a href="https://www.google.com/maps/search/?api=1&query=Continental+Hospital+PLC+Dhaka"
                        target="_blank"
                        rel="noopener"
                        class="inline-flex items-center gap-2 rounded-xl border border-[#00477A] px-4 py-2 text-sm font-medium text-[#00477A] transition hover:bg-[#00477A] hover:text-white">

                        <i class="fa-solid fa-location-dot"></i>
                        Map

                    </a>

                </div>

            </div>

            {{-- Labaid --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <div class="flex items-start justify-between gap-6">

                    <div class="flex-1">

                        <h3 class="text-lg font-semibold text-slate-800">
                            Labaid Diagnostic Gulshan
                        </h3>

                        <p class="mt-3 leading-7 text-slate-600">
                            📍 House 13/A, Road 35,<br>
                            Gulshan Medical Center,<br>
                            Gulshan 2, Dhaka 1212
                        </p>

                        <div class="mt-5 flex flex-wrap gap-2">

                            <span class="rounded-full bg-blue-50 px-3 py-1 text-sm text-blue-700">
                                🚗 5.5 km (15–20 min)
                            </span>

                            <span class="rounded-full bg-green-50 px-3 py-1 text-sm text-green-700">
                                🕒 7:00 AM – 11:00 PM
                            </span>

                            <a href="tel:+8801766662525"
                                class="rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700 transition hover:bg-slate-200">
                                📞 +880 1766 662525
                            </a>

                        </div>

                    </div>

                    <a href="https://www.google.com/maps/search/?api=1&query=Labaid+Diagnostic+Gulshan+Dhaka"
                        target="_blank"
                        rel="noopener"
                        class="inline-flex items-center gap-2 rounded-xl border border-[#00477A] px-4 py-2 text-sm font-medium text-[#00477A] transition hover:bg-[#00477A] hover:text-white">

                        <i class="fa-solid fa-location-dot"></i>
                        Map

                    </a>

                </div>

            </div>

        </div>

    </section>

    {{-- Emergency Note --}}
    <section class="mt-10 rounded-2xl border-l-4 border-red-500 bg-red-50 p-6">

        <h3 class="text-lg font-semibold text-red-700">
            🚑 Medical Emergencies
        </h3>

        <p class="mt-4 leading-8 text-slate-700">

            If you experience a medical emergency, please contact the hotel
            reception immediately. The hotel staff can assist in arranging
            transportation to the nearest hospital or contacting emergency
            medical services.

        </p>

    </section>

</div>

@include('components.bottom-nav')

@endsection