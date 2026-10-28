@extends('layouts.app')

@section('title', 'Digital Event Pass')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl">

        <!-- Header -->

        <div class="bg-gradient-to-r from-[#00477A] via-[#005A99] to-[#006EB8] px-10 py-8 text-center">

            <img
                src="{{ asset('images/logo.png') }}"
                class="mx-auto h-16 mb-5"
                alt="Logo">

            <h1 class="text-4xl font-bold text-white">

                Asia Seminar 2026

            </h1>

            <p class="mt-2 text-blue-100 text-lg">

                Digital Event Pass

            </p>

        </div>

        <!-- Body -->

        <div class="p-10">

            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <!-- Participant -->

                <div>

                    <div class="inline-flex rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

                        ✓ Registration Confirmed

                    </div>

                    <h2 class="mt-8 text-4xl font-bold text-[#00477A]">

                        {{ $participant->first_name }}
                        {{ $participant->last_name }}

                    </h2>

                    @if($participant->designation)

                    <p class="mt-2 text-xl text-slate-500">

                        {{ $participant->designation }}

                    </p>

                    @endif

                    <div class="mt-10 space-y-6">

                        <div>

                            <p class="text-xs uppercase tracking-widest text-slate-400">

                                Organization

                            </p>

                            <p class="mt-1 text-lg font-semibold">

                                {{ $participant->company ?: 'N/A' }}

                            </p>

                        </div>

                        <div>

                            <p class="text-xs uppercase tracking-widest text-slate-400">

                                Country

                            </p>

                            <p class="mt-1 text-lg font-semibold">

                                {{ $participant->country ?: 'N/A' }}

                            </p>

                        </div>

                        <div>

                            <p class="text-xs uppercase tracking-widest text-slate-400">

                                Participant ID

                            </p>

                            <p class="mt-2 text-3xl font-bold text-[#00477A]">

                                {{ $participant->participant_id }}

                            </p>

                        </div>

                    </div>

                </div>

                <!-- QR -->

                <div>

                    <div class="bg-slate-50 p-8 text-center">

                        <img
                            src="{{ route('participant.qr', $participant->qr_token) }}"
                            class="mx-auto w-72"
                            alt="QR">

                    </div>

                    <p class="mt-6 text-center text-slate-500">

                        Present this QR code at the Self Check-in Kiosk.

                    </p>

                </div>

            </div>

        </div>

        <!-- Footer -->

        <div class="border-t bg-slate-50 px-10 py-8">

            <div class="grid md:grid-cols-2 gap-5">

                <a
                    href="{{ route('participant.download',$participant->qr_token) }}"
                    class="rounded-xl bg-[#00477A] py-4 text-center font-semibold text-white transition hover:bg-[#003760]">

                    ⬇ Download Pass

                </a>

                <form
                    action="{{ route('participant.resend',$participant->qr_token) }}"
                    method="POST">

                    @csrf

                    <button
                        class="w-full rounded-xl border border-[#00477A] py-4 font-semibold text-[#00477A] transition hover:bg-[#00477A] hover:text-white">

                        ✉ Email Pass Again

                    </button>

                </form>

            </div>

        </div>

    </div>

    <!-- Notice -->

    <div class="mt-8 rounded-2xl border border-blue-200 bg-blue-50 p-6">

        <h3 class="font-semibold text-[#00477A]">

            Important

        </h3>

        <ul class="mt-3 list-disc space-y-2 pl-6 text-slate-600">

            <li>

                Save this Event Pass on your mobile phone.

            </li>

            <li>

                Present this QR code at the registration kiosk.

            </li>

            <li>

                Your QR code is unique and should not be shared.

            </li>

            <li>

                If you lose your pass, you can retrieve it from the seminar website.

            </li>

        </ul>

    </div>

</div>

@endsection