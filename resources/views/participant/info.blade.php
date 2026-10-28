@extends('layouts.register')

@section('title', 'Asia Seminar 2026')

@section('content')


<main class="px-4 py-6 md:py-12">

    <div class="mx-auto max-w-lg">

        <div class="overflow-hidden rounded-3xl bg-white shadow-xl">

            <!-- Top Banner -->

            <div class="bg-gradient-to-r from-[#00477A] to-[#0063A6] px-6 py-8 text-center">

                <p class="mt-2 text-blue-100">

                     Please confirm your information.

                </p>

            </div>

            <div class="p-6 space-y-5">

                <div class="rounded-2xl border bg-slate-50 p-5">

                    <p class="text-sm text-slate-500">
                        Full Name
                    </p>

                    <p class="mt-1 text-xl font-bold">
                        {{ $participant->first_name }} {{ $participant->last_name }}
                    </p>

                </div>

                <div class="rounded-2xl border bg-slate-50 p-5">

                    <p class="text-sm text-slate-500">
                        Email
                    </p>

                    <p class="mt-1 font-semibold break-all">
                        {{ $participant->email }}
                    </p>

                </div>

                <div class="rounded-2xl border bg-slate-50 p-5">

                    <p class="text-sm text-slate-500">
                        Designation
                    </p>

                    <p class="mt-1 font-semibold">
                        {{ $participant->designation ?: 'N/A' }}
                    </p>

                </div>

                <div class="rounded-2xl border bg-slate-50 p-5">

                    <p class="text-sm text-slate-500">
                        Country/Region
                    </p>

                    <p class="mt-1 font-semibold">
                        {{ $participant->region }}
                    </p>

                </div>

                <!-- <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5">
                    <p class="text-sm text-amber-800">
                        If any information is incorrect, please contact the registration desk before proceeding.
                    </p>
                </div> -->

            </div>

            <div class="sticky bottom-0 border-t bg-white p-5">

               <form action="{{ route('participant.confirm') }}" method="POST">
                @csrf
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-[#00477A] py-4 text-lg font-bold text-white transition hover:bg-[#003760]">

                        Confirm & Continue →

                    </button>

                </form>

            </div>

            </div>

        </div>

    </div>

</main>

@endsection