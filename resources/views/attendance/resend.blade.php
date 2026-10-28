@extends('layouts.attendance')

@section('title', 'Participant ID Reminder')

@section('content')

<main class="flex min-h-[calc(100vh-145px)] items-center justify-center px-6 py-10">

    <div class="w-full max-w-xl rounded-3xl bg-white shadow-2xl ring-1 ring-slate-200 overflow-hidden">

        {{-- Header --}}
        <div class="bg-[#00477A] px-10 py-10 text-center">

            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-white/15">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-10 w-10 text-white"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>

                </svg>

            </div>

            <h1 class="mt-6 text-3xl font-bold text-white">
                Participant ID Reminder
            </h1>

            <p class="mt-3 text-blue-100">
                Enter your registered email address and we'll send your Participant ID.
            </p>

        </div>

        {{-- Body --}}
        <div class="p-10">

            @if(session('success'))

                <div class="mb-8 rounded-2xl border border-green-200 bg-green-50 p-5">

                    <div class="flex items-start gap-3">

                        <svg class="mt-1 h-6 w-6 text-green-600"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5 13l4 4L19 7"/>

                        </svg>

                        <div>

                            <h3 class="font-semibold text-green-800">
                                Email Sent Successfully
                            </h3>

                            <p class="mt-1 text-sm text-green-700">
                                {{ session('success') }}
                            </p>

                        </div>

                    </div>

                </div>

            @endif

            @if($errors->any())

                <div class="mb-8 rounded-2xl border border-red-200 bg-red-50 p-5">

                    <div class="flex items-start gap-3">

                        <svg class="mt-1 h-6 w-6 text-red-600"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>

                        </svg>

                        <div>

                            <h3 class="font-semibold text-red-800">
                                Unable to Send Email
                            </h3>

                            <p class="mt-1 text-sm text-red-700">
                                {{ $errors->first() }}
                            </p>

                        </div>

                    </div>

                </div>

            @endif

            <form action="{{ route('participant.resend-email') }}" method="POST">

                @csrf

                <label class="mb-2 block text-sm font-semibold uppercase tracking-wide text-slate-600">
                    Registered Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="off"
                    placeholder="name@example.com"
                    class="w-full rounded-xl border border-slate-300 px-5 py-4 text-lg outline-none transition focus:border-[#00477A] focus:ring-4 focus:ring-[#00477A]/15">

                <button
                    type="submit"
                    class="mt-6 w-full rounded-xl bg-[#00477A] py-4 text-lg font-semibold text-white transition hover:bg-[#00365f]">

                    Resend Participant ID

                </button>

            </form>

            <div class="mt-10 border-t pt-8 text-center">

                <p class="text-slate-500">
                    Already have your Participant ID?
                </p>

                <a href="{{ route('attendance') }}"
                   class="mt-2 inline-block font-semibold text-[#00477A] hover:underline">

                    Claim Your Attendance

                </a>

            </div>

        </div>

    </div>

</main>

@endsection