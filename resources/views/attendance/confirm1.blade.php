@extends('layouts.attendance')

@section('title', 'Confirm Attendance')

@section('content')



<div class="min-h-screen bg-slate-100 flex items-center justify-center py-10">

    <div class="w-full max-w-3xl rounded-3xl bg-white shadow-xl border border-slate-200 overflow-hidden">

        <!-- Header -->

        <div class="bg-gradient-to-r from-[#00477A] to-[#0063A6] px-8 py-10 text-center">

            <h1 class="text-4xl font-bold text-white">

                Asia Seminar 2026

            </h1>

            <p class="mt-3 text-blue-100 text-lg">

                Please verify your information before confirming your attendance.

            </p>

        </div>

        <!-- Already Checked In -->

        @if($participant->checked_in_at)

            <div class="m-8 rounded-2xl border border-amber-300 bg-amber-50 p-6">

                <div class="flex items-center gap-4">

                    <div class="text-4xl">
                        ⚠️
                    </div>

                    <div>

                        <h2 class="text-xl font-bold text-amber-800">

                            Attendance Already Recorded

                        </h2>

                        <p class="mt-1 text-amber-700">

                            Your attendance was recorded on

                            <strong>

                                {{ $participant->checked_in_at->format('d M Y, h:i A') }}

                            </strong>

                        </p>

                    </div>

                </div>

            </div>

        @else

        <!-- Participant Information -->

        <div class="p-8">

            <div class="grid gap-6 md:grid-cols-2">

                <div>

                    <label class="text-sm font-medium text-slate-500">

                        Participant ID

                    </label>

                    <div class="mt-2 rounded-xl border bg-slate-50 px-4 py-3 font-semibold text-[#00477A]">

                        {{ $participant->participant_id }}

                    </div>

                </div>

                <div>

                    <label class="text-sm font-medium text-slate-500">

                        Country

                    </label>

                    <div class="mt-2 rounded-xl border bg-slate-50 px-4 py-3">

                        {{ $participant->country }}

                    </div>

                </div>

                <div class="md:col-span-2">

                    <label class="text-sm font-medium text-slate-500">

                        Full Name

                    </label>

                    <div class="mt-2 rounded-xl border bg-slate-50 px-4 py-3 text-lg font-semibold">

                        {{ $participant->first_name }}
                        {{ $participant->last_name }}

                    </div>

                </div>

                <div>

                    <label class="text-sm font-medium text-slate-500">

                        Designation

                    </label>

                    <div class="mt-2 rounded-xl border bg-slate-50 px-4 py-3">

                        {{ $participant->designation ?: 'N/A' }}

                    </div>

                </div>

                <div>

                    <label class="text-sm font-medium text-slate-500">

                        Organization / Project

                    </label>

                    <div class="mt-2 rounded-xl border bg-slate-50 px-4 py-3">

                        {{ $participant->project_name ?: 'N/A' }}

                    </div>

                </div>

            </div>

            <!-- Notice -->

            <div class="mt-8 rounded-2xl border border-blue-200 bg-blue-50 p-5">

                <p class="text-sm text-blue-900">

                    Please review the above information carefully. If these details belong to you, click
                    <strong>Confirm Attendance</strong>.
                    If the information is incorrect, click
                    <strong>Go Back</strong> and search again.

                </p>

            </div>

            <!-- Buttons -->

            <div class="mt-10 flex flex-col-reverse gap-4 sm:flex-row">

                <a
                    href="{{ route('attendance') }}"
                    class="flex-1 rounded-xl border border-slate-300 py-4 text-center font-semibold text-slate-700 transition hover:bg-slate-100">

                    ← Go Back

                </a>

                <form
                    action="{{ route('attendance.checkin', $participant) }}"
                    method="POST"
                    class="flex-1">

                    @csrf

                    <button
                        type="submit"
                        class="w-full rounded-xl bg-[#00477A] py-4 font-semibold text-white transition hover:bg-[#003760]">

                        ✓ Confirm Attendance

                    </button>

                </form>

            </div>

        </div>

        @endif

    </div>

</div>

@endsection
