@extends('layouts.attendance')

@section('title', 'Self Check-in Kiosk')

@section('content')

<!-- Main -->
<main class="flex min-h-[calc(100vh-145px)] items-center justify-center px-6 py-10">

    <div class="w-full max-w-2xl rounded-3xl border border-slate-200 bg-white p-12 shadow-2xl">

        <div class="text-center">

            <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-[#00477A]/10">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-12 w-12 text-[#00477A]"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0"/>

                </svg>

            </div>

            <h2 class="mt-8 text-4xl font-bold text-slate-900">
                Welcome
            </h2>

            <p class="mt-4 text-lg text-slate-500">
                Enter your Participant ID to confirm your attendance.
            </p>

        </div>

<form
    action="{{ route('attendance.search') }}"
    method="POST"
    class="mt-12">

    @csrf

    <label class="mb-4 block text-xl font-semibold text-slate-700">

        Participant ID or Full Name

    </label>

    <input
        name="keyword"
        type="text"
        autocomplete="off"
        autofocus
        required
        placeholder="Enter Participant ID or Full Name"
        class="w-full rounded-2xl border-2 border-slate-300 px-6 py-5 text-center text-2xl font-semibold outline-none transition focus:border-[#00477A] focus:ring-4 focus:ring-[#00477A]/20">

    @error('keyword')

        <p class="mt-3 text-center text-red-600">

            {{ $message }}

        </p>

    @enderror

    <button
        type="submit"
        class="mt-8 w-full rounded-2xl bg-[#00477A] py-5 text-xl font-bold text-white transition hover:bg-[#00365f]">

        Continue

    </button>

</form>

        <div
            id="status"
            class="mt-8 hidden rounded-2xl p-6 text-center text-xl font-semibold">
        </div>

        <div class="mt-10 border-t pt-8 text-center">

            <p class="text-slate-500">
                Forgot your Participant ID?
            </p>

            <p class="mt-2 font-semibold text-[#00477A]">
               <a href="{{ route('participant.resend') }}" class="underline">Click here to resend your Participant ID</a>
            </p>

        </div>

    </div>

</main>

@endsection