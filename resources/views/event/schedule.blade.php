@extends('layouts.app')

@section('title', 'Seminar Programme')

@section('content')

<!-- Hero -->
<section class="rounded-3xl bg-gradient-to-r from-[#00477A] to-[#0063A6]">
    <div class="px-8 py-20 text-center">

        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-blue-200">
            Seminar Programme
        </p>

        <h1 class="mt-5 text-5xl font-bold text-white">
            Asia Regional Seminar 2026
        </h1>

        <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-blue-100">
            Explore the programme for the three-day seminar, featuring keynote
            sessions, workshops, discussions and networking activities.
        </p>

    </div>
</section>

<!-- Day 1 -->
<section class="mt-16">

    <div class="mb-10 flex items-center gap-4">

        <div class="h-12 w-2 rounded bg-[#00477A]"></div>

        <div>
            <h2 class="text-3xl font-bold text-[#00477A]">
                Day 1
            </h2>

            <p class="text-gray-500">
                Tuesday • 15 September 2026
            </p>
        </div>

    </div>

    <div class="space-y-8 border-l-2 border-blue-200 ml-6">

        <!-- Session -->

        <div class="relative pl-10">

            <div class="absolute -left-[11px] top-2 h-5 w-5 rounded-full bg-[#00477A] border-4 border-white"></div>

            <div class="grid gap-6 md:grid-cols-5">

                <div>
                    <p class="text-xl font-bold text-[#00477A]">
                        09:00
                    </p>

                    <p class="text-sm text-gray-500">
                        Main Lobby
                    </p>
                </div>

                <div class="md:col-span-4 rounded-2xl border border-gray-200 bg-white p-6">

                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                        Registration
                    </span>

                    <h3 class="mt-4 text-2xl font-semibold">
                        Registration & Welcome Coffee
                    </h3>

                    <p class="mt-2 text-gray-600">
                        Participants arrive, complete registration and network
                        over refreshments before the opening ceremony.
                    </p>

                </div>

            </div>

        </div>

        <!-- Session -->

        <div class="relative pl-10">

            <div class="absolute -left-[11px] top-2 h-5 w-5 rounded-full bg-[#00477A] border-4 border-white"></div>

            <div class="grid gap-6 md:grid-cols-5">

                <div>

                    <p class="text-xl font-bold text-[#00477A]">
                        10:00
                    </p>

                    <p class="text-sm text-gray-500">
                        Grand Ballroom
                    </p>

                </div>

                <div class="md:col-span-4 rounded-2xl border border-gray-200 bg-white p-6">

                    <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                        Opening Ceremony
                    </span>

                    <h3 class="mt-4 text-2xl font-semibold">
                        Official Opening
                    </h3>

                    <p class="mt-2 text-gray-600">
                        Welcome remarks from organizers, government
                        representatives and development partners.
                    </p>

                </div>

            </div>

        </div>

        <!-- Session -->

        <div class="relative pl-10">

            <div class="absolute -left-[11px] top-2 h-5 w-5 rounded-full bg-[#00477A] border-4 border-white"></div>

            <div class="grid gap-6 md:grid-cols-5">

                <div>

                    <p class="text-xl font-bold text-[#00477A]">
                        11:00
                    </p>

                    <p class="text-sm text-gray-500">
                        Conference Hall A
                    </p>

                </div>

                <div class="md:col-span-4 rounded-2xl border border-gray-200 bg-white p-6">

                    <span class="rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700">
                        Keynote
                    </span>

                    <h3 class="mt-4 text-2xl font-semibold">
                        Digital Transformation for Sustainable Development
                    </h3>

                    <p class="mt-2 text-gray-600">
                        Keynote presentation highlighting digital innovation,
                        governance and regional collaboration.
                    </p>

                </div>

            </div>

        </div>

        <!-- Lunch -->

        <div class="relative pl-10">

            <div class="absolute -left-[11px] top-2 h-5 w-5 rounded-full bg-orange-500 border-4 border-white"></div>

            <div class="grid gap-6 md:grid-cols-5">

                <div>

                    <p class="text-xl font-bold text-[#00477A]">
                        13:00
                    </p>

                </div>

                <div class="md:col-span-4 rounded-2xl border border-gray-200 bg-orange-50 p-6">

                    <span class="rounded-full bg-orange-200 px-3 py-1 text-xs font-semibold text-orange-700">
                        Lunch Break
                    </span>

                    <h3 class="mt-4 text-2xl font-semibold">
                        Networking Lunch
                    </h3>

                </div>

            </div>

        </div>

    </div>

</section>


@endsection