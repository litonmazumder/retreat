@extends('layouts.attendance')

@section('title', 'Self Check-in Kiosk')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-100 to-blue-50 flex items-center justify-center px-6 py-10">

    <div class="w-full max-w-2xl rounded-3xl bg-white shadow-2xl overflow-hidden">

        <!-- Header -->

        <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-8 py-10 text-center">

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

                Attendance Confirmed

            </h1>

        </div>

        <!-- Body -->

        <div class="p-10 text-center">

            <h2 class="text-3xl font-bold text-slate-800">

                Thank You,

                <span class="text-[#00477A]">

                    {{ $participant->first_name }}
                    {{ $participant->last_name }}

                </span>

            </h2>

            <p class="mt-5 text-lg text-slate-600">

                Your attendance has been successfully recorded.

            </p>

            <div class="mt-8 rounded-2xl border border-green-200 bg-green-50 p-6">

                <div class="grid gap-5 md:grid-cols-2 text-left">

                    <div>

                        <p class="text-sm text-slate-500">

                            Participant ID

                        </p>

                        <p class="mt-1 font-semibold text-slate-800">

                            {{ $participant->participant_id }}

                        </p>

                    </div>

                    <div>

                        <p class="text-sm text-slate-500">

                            Check-in Time

                        </p>

                        <p class="mt-1 font-semibold text-slate-800">

                            {{ optional($participant->checked_in_at)->format('d M Y, h:i A') ?? 'Just now' }}

                        </p>

                    </div>

                </div>

            </div>

            <div class="mt-8 rounded-xl bg-blue-50 border border-blue-200 p-5">

                <p class="text-blue-800 font-medium">

                    Welcome to <strong>Asia Seminar 2026</strong>.

                    You may now proceed to the seminar venue.

                </p>

            </div>

            <div class="mt-10">

                <p class="text-slate-500">

                    Redirecting to the check-in page in

                    <span
                        id="countdown"
                        class="font-bold text-[#00477A]">

                        5

                    </span>

                    seconds...

                </p>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {

    let seconds = 5;
    const countdown = document.getElementById('countdown');

    const interval = setInterval(() => {

        countdown.textContent = --seconds;

        if (seconds <= 0) {
            clearInterval(interval);
            location.href = "{{ route('attendance') }}";
        }

    }, 1000);

});
</script>
@endpush