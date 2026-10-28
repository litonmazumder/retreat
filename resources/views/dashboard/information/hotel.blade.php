@extends('layouts.dashboard')

@section('title', 'Accommodation')

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
            Hotel & Transport
        </h2>

    </div>

    {{-- Hotel Overview --}}
    <section class="mb-10">

       <h1 class="text-4xl font-bold text-slate-800">
            Renaissance Dhaka Gulshan Hotel
        </h1>

        <p class="mt-4 leading-8 text-slate-700">

            Accommodation has been arranged at
            <strong>Renaissance Dhaka Gulshan Hotel</strong>
            for the entire duration of the Meeting & Seminar,
            based on the participant list submitted by each country.

        </p>

    </section>

    {{-- Hotel Information --}}
    <section class="mb-10 rounded-2xl border border-blue-200 bg-blue-50 p-6">

        <h3 class="text-xl font-semibold text-blue-800">
            Hotel Information
        </h3>

        <ul class="mt-5 space-y-3 text-slate-700">

            <li class="flex gap-3">
                <span>📍</span>
                <span>78 Gulshan Avenue, Dhaka 1212</span>
            </li>

            <li class="flex gap-3">
                <span>✈️</span>
                <span>Approximately 8 km from Hazrat Shahjalal International Airport</span>
            </li>

            <li class="flex gap-3">
                <span>🚗</span>
                <span>Typical travel time: 20–45 minutes from airport to hotel, depending on traffic conditions</span>
            </li>

        </ul>

    </section>

    {{-- About Gulshan --}}
    <section class="mb-10">

        <h3 class="text-xl font-semibold text-slate-800">
            About Gulshan
        </h3>

        <p class="mt-4 leading-8 text-slate-700">
            Gulshan is one of Dhaka's most vibrant and secure commercial districts,
            offering a wide variety of restaurants, cafés, shopping facilities,
            pharmacies, banks, and ATMs within walking distance of the hotel.
        </p>

        <p class="mt-4 leading-8 text-slate-700">
            The area is also popular among international visitors and expatriates.
        </p>

    </section>

    {{-- Hotel Rate --}}
    <section class="mb-10 rounded-2xl border border-emerald-200 bg-emerald-50 p-6">

        <h3 class="text-xl font-semibold text-emerald-800">
            Hotel Rate
        </h3>

        <p class="mt-3 text-4xl font-bold text-emerald-700">

            BDT 13,000

        </p>

        <p class="text-slate-700">
            Per room • Per night
        </p>

        <hr class="my-5">

        <ul class="space-y-3 text-slate-700">

            <li>✔ Breakfast included</li>

            <li>✔ Pay directly at the hotel upon check-out</li>

            <li>✔ Payment accepted in Bangladeshi Taka (BDT) or by international credit card</li>

            <li>✔ Rate includes all applicable taxes and service charges</li>

        </ul>

        <!-- <div class="mt-5 grid grid-cols-3 gap-4">

            <div class="rounded-xl bg-white p-4 text-center shadow-sm">

                <p class="text-sm text-slate-500">
                    City Tax
                </p>

                <p class="text-xl font-bold">
                    1.5%
                </p>

            </div>

            <div class="rounded-xl bg-white p-4 text-center shadow-sm">

                <p class="text-sm text-slate-500">
                    Service Charge
                </p>

                <p class="text-xl font-bold">
                    12.5%
                </p>

            </div>

            <div class="rounded-xl bg-white p-4 text-center shadow-sm">

                <p class="text-sm text-slate-500">
                    VAT
                </p>

                <p class="text-xl font-bold">
                    15%
                </p>

            </div>

        </div> -->

    </section>

    {{-- Check In --}}
        <section class="mb-10 rounded-2xl border-l-4 border-amber-500 bg-amber-50 p-6">

            <h3 class="text-lg font-semibold text-amber-800">
                🕒 Check-in & Check-out
            </h3>

            <ul class="mt-5 space-y-3 leading-7 text-slate-700">

                <li><strong>Check-in:</strong> 3:00 PM</li>

                <li><strong>Check-out:</strong> 12:00 PM</li>

                <li>Late check-out before 6:00 PM: 50% of the contracted room rate.</li>

                <li>Late check-out after 6:00 PM: Full night's room charge applies.</li>

                <li>Accommodation has been arranged one day in advance for participants arriving early in the morning.</li>

                <li><strong>Smoking Policy:</strong> Renaissance Dhaka Gulshan Hotel is a non-smoking hotel. Smoking is permitted only outside the lobby and on the 19th floor.</li>

                <li class="text-sm text-slate-600">
                    <strong>Note:</strong> All times are in Bangladesh Standard Time (UTC+6).
                </li>

            </ul>

        </section>

        <section class="mb-10">

            <h2 class="text-2xl font-bold text-slate-800">
                Airport Transportation
            </h2>

            <p class="mt-4 leading-8 text-slate-700">

                Swisscontact Bangladesh Office will arrange airport pick-up services for participants based on the flight details and tickets shared in advance.

            </p>

            <p class="mt-4 leading-8 text-slate-700">

                However, participants may also use <strong>Uber</strong> for local transportation within Dhaka or for airport drop-off, as the service is widely available and reliable.

            </p>

        </section>

    {{-- Documents --}}
    <!-- <section class="mb-10">

        <h3 class="text-xl font-semibold text-slate-800">
            Reservation Documents
        </h3>

        <p class="mt-4 leading-8 text-slate-700">

            Please review the following documents carefully.

        </p>

        <div class="mt-6 space-y-4">

            <a href="#"
                class="flex items-center justify-between rounded-xl border p-5 transition hover:bg-slate-50">

                <div>

                    <h4 class="font-semibold">

                        📄 Invitation Letters

                    </h4>

                    <p class="text-sm text-slate-500">

                        View all invitation letters

                    </p>

                </div>

                →

            </a>

            <a href="#"
                class="flex items-center justify-between rounded-xl border p-5 transition hover:bg-slate-50">

                <div>

                    <h4 class="font-semibold">

                        🏨 Hotel Reservations

                    </h4>

                    <p class="text-sm text-slate-500">

                        View hotel reservation copies

                    </p>

                </div>

                →

            </a>

        </div>

    </section> -->

{{-- Contact --}}
<!-- <section class="rounded-2xl border border-red-200 bg-red-50 p-6">

    <h3 class="text-lg font-semibold text-red-700">
        Need to Make Changes?
    </h3>

    <p class="mt-4 leading-8 text-slate-700">

    If your travel itinerary changes, your hotel booking requires an update,
    or you no longer require airport pick-up, please notify us no later than
    <strong>2 August 2026</strong>.

    </p>

    <p class="mt-4 leading-8 text-slate-700">

        Please contact

        <a href="mailto:rubayet.kusum@swisscontact.org"
            class="font-semibold text-[#00477A] underline">

            rubayet.kusum@swisscontact.org

        </a>

        with the updated information.

    </p>

    <p class="mt-4 leading-8 text-slate-700">

        If applicable, please also provide the correct budget line(s) for any related booking costs.

    </p>

</section> -->

</div>

@include('components.bottom-nav')

@endsection