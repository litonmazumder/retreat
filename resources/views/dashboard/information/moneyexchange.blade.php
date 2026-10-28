@extends('layouts.dashboard')

@section('title', 'Money Exchange')

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

        <h1 class="text-3xl font-bold text-slate-800">
            Money Exchange
        </h1>

    </div>

    {{-- Overview --}}
    <section class="mb-10">

        <h1 class="text-4xl font-bold text-slate-800">
            Payment & Currency
        </h1>

        <p class="mt-4 leading-8 text-slate-700">
            Payments can be made by international credit cards at the hotel and at most major restaurants, shopping malls, and supermarkets.
        </p>

        <p class="mt-4 leading-8 text-slate-700">
            Participants are nevertheless encouraged to exchange a small amount of foreign currency into <strong>Bangladeshi Taka (BDT)</strong> for local transportation, small purchases, and personal expenses.
        </p>

       

    </section>

    {{-- Card Payments --}}
    <!-- <section class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-6">

        <div class="flex items-start gap-4">

            <i class="fa-solid fa-credit-card mt-1 text-2xl text-emerald-700"></i>

            <div>

                <h2 class="text-xl font-semibold text-emerald-800">
                    Card Payments
                </h2>

                <p class="mt-3 leading-7 text-slate-700">
                    International credit cards are widely accepted at hotels,
                    shopping malls, supermarkets, and most major restaurants in
                    Dhaka.
                </p>

            </div>

        </div>

    </section> -->

    {{-- Cash Recommendation --}}
    <!-- <section class="mb-10 rounded-2xl border border-amber-200 bg-amber-50 p-6">

        <div class="flex items-start gap-4">

            <i class="fa-solid fa-wallet mt-1 text-2xl text-amber-700"></i>

            <div>

                <h2 class="text-xl font-semibold text-amber-800">
                    Carry Some Local Currency
                </h2>

                <p class="mt-3 leading-7 text-slate-700">
                    We recommend carrying a small amount of Bangladeshi Taka
                    (BDT) for taxis, local transportation, street food, and
                    other small personal expenses.
                </p>

            </div>

        </div>

    </section> -->

    {{-- Exchange Locations --}}
    <section class="mb-10">

        <h2 class="mb-5 text-2xl font-bold text-slate-800">
            Where to Exchange Currency
        </h2>

        <div class="space-y-4">

            {{-- Airport --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <h3 class="font-semibold text-slate-800">
                    ✈️ Hazrat Shahjalal International Airport
                </h3>

                <p class="mt-3 text-slate-600">
                    Foreign exchange counters are available upon arrival inside
                    the airport terminal.
                </p>

            </div>

            {{-- Israt --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between gap-6">

                    <div>

                        <h3 class="font-semibold text-slate-800">
                            💱 Israt Money Changer Limited
                        </h3>

                        <p class="mt-3 text-slate-600">
                            Shop No. 1, Landmark Shopping Center,
                            Gulshan-2 , Dhaka 1212
                        </p>

                        <p class="mt-2 text-slate-600">

                            Phone:

                            <a href="tel:+8801711595019"
                                class="font-medium text-[#00477A] hover:underline">

                                +880 1711 595019

                            </a>

                        </p>

                    </div>

                    <a href="https://www.google.com/maps/search/?api=1&query=Israt+Money+Changer+Limited+Dhaka"
                        target="_blank"
                        rel="noopener"
                        class="flex items-center gap-2 rounded-xl border border-[#00477A] px-4 py-2 text-sm font-medium text-[#00477A] transition hover:bg-[#00477A] hover:text-white">

                        <i class="fa-solid fa-location-dot"></i>

                    </a>

                </div>

            </div>

            {{-- Mars Money Exchange --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between gap-6">

                    <div>

                        <h3 class="font-semibold text-slate-800">
                            💱 Mars Money Exchange
                        </h3>

                        <p class="mt-3 text-slate-600">
                            Shop No. 15 (Ground Floor), Landmark Shopping Centre,
                            Gulshan-2, Dhaka
                        </p>

                        <p class="mt-2 text-slate-600">
                            Phone:
                            <a href="tel:+8801737208428"
                                class="font-medium text-[#00477A] hover:underline">
                                +880 1737 208428
                            </a>
                        </p>

                    </div>

                    <a href="https://www.google.com/maps/search/?api=1&query=Mars+Money+Exchange+Landmark+Shopping+Centre+Gulshan+2+Dhaka"
                        target="_blank"
                        rel="noopener"
                        class="flex items-center gap-2 rounded-xl border border-[#00477A] px-4 py-2 text-sm font-medium text-[#00477A] transition hover:bg-[#00477A] hover:text-white">

                        <i class="fa-solid fa-location-dot"></i>

                    </a>

                </div>

            </div>

            {{-- Metro Money Exchange --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between gap-6">

                    <div>

                        <h3 class="font-semibold text-slate-800">
                            💱 Metro Money Exchange
                        </h3>

                        <p class="mt-3 text-slate-600">
                            Shop No. 29 (First Floor), Landmark Shopping Centre,
                            Gulshan-2, Dhaka
                        </p>

                        <p class="mt-2 text-slate-600">
                            Phone:
                            <a href="tel:+8801772423354"
                                class="font-medium text-[#00477A] hover:underline">
                                +880 1772 423354
                            </a>
                        </p>

                    </div>

                    <a href="https://www.google.com/maps/search/?api=1&query=Metro+Money+Exchange+Landmark+Shopping+Centre+Gulshan+2+Dhaka"
                        target="_blank"
                        rel="noopener"
                        class="flex items-center gap-2 rounded-xl border border-[#00477A] px-4 py-2 text-sm font-medium text-[#00477A] transition hover:bg-[#00477A] hover:text-white">

                        <i class="fa-solid fa-location-dot"></i>

                    </a>

                </div>

            </div>
            

            {{-- Banks --}}
            <!-- <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <h3 class="font-semibold text-slate-800">
                    🏛 Selected Commercial Banks
                </h3>

                <p class="mt-3 text-slate-600">
                    Foreign currency exchange services are also available at
                    selected commercial banks throughout Dhaka.
                </p>

            </div> -->

        </div>

    </section>

    {{-- Exchange Rate --}}
    <section class="rounded-2xl border-l-4 border-blue-500 bg-blue-50 p-6">

        <h3 class="text-lg font-semibold text-[#00477A]">

            ℹ️ Exchange Rate Information

        </h3>

        <p class="mt-4 leading-8 text-slate-700">

            Exchange rates may vary slightly depending on the service provider.

            Airport and hotel exchange counters often provide lower exchange
            rates than licensed independent exchange houses.

        </p>

    </section>

</div>

@include('components.bottom-nav')

@endsection