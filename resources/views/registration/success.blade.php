@extends('layouts.app')

@section('title', 'Registration Successful')

@section('content')

<div class="mx-auto max-w-2xl">

    <div class="overflow-hidden rounded-3xl bg-white shadow-xl">

        <!-- Header -->

        <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-10 py-10 text-center">

            <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-white/20">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-14 w-14 text-white"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7"/>

                </svg>

            </div>

            <h1 class="mt-6 text-4xl font-bold text-white">

                Registration Successful

            </h1>

            <p class="mt-3 text-green-100 text-lg">

                Welcome to Asia Seminar 2026

            </p>

        </div>

        <!-- Body -->

        <div class="p-10 text-center">

            <h2 class="text-2xl font-bold text-slate-800">

                Thank you,

                <span class="text-[#00477A]">

                    {{ $participant->first_name }}
                    {{ $participant->last_name }}

                </span>

            </h2>

            <p class="mt-5 text-slate-600 leading-8">

                Your registration has been successfully completed.

                Please keep your <strong>Participant ID</strong> for seminar check-in.

            </p>

            <!-- Participant ID -->

            <div class="mt-10 rounded-3xl border-2 border-[#00477A] bg-blue-50 p-8">

                <p class="text-sm uppercase tracking-[0.25em] text-slate-500">

                    Participant ID

                </p>

                <h3 class="mt-4 text-4xl font-bold tracking-wider text-[#00477A]">

                    {{ $participant->participant_id }}

                </h3>

            </div>

            <!-- Email Notice -->

            <div class="mt-10 rounded-2xl border border-blue-200 bg-blue-50 p-6 text-left">

                <h3 class="font-semibold text-[#00477A]">

                    What's next?

                </h3>

                <ul class="mt-4 space-y-3 text-slate-700">

                    <li>✓ A confirmation email has been sent to your registered email address.</li>

                    <li>✓ Your Participant ID is included in the email and will be required for seminar check-in.</li>

                    <li>✓ If you do not receive the email within a few minutes, please check your Spam or Junk folder.</li>

                </ul>

            </div>

            <!-- Home Button -->

            <div class="mt-10">

                <a href="{{ route('home') }}"
                   class="inline-flex items-center rounded-xl bg-[#00477A] px-8 py-4 text-lg font-semibold text-white transition hover:bg-[#003760]">

                    Return to Event Website

                </a>

            </div>

        </div>

    </div>

</div>

@endsection