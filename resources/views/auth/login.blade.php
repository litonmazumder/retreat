@extends('layouts.register')

@section('title', 'Sign In - Asia Seminar 2026')

@section('content')

<div class="mx-auto w-full">

    <div class="rounded-3xl bg-white p-6 shadow-2xl md:p-8">

        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-slate-900 md:text-3xl">
                Welcome
            </h1>
            <p class="mt-2 text-sm leading-relaxed text-slate-600 md:mt-3">
                Sign in with your Swisscontact email address to access all Annual Retreat 2026 content.
            </p>
        </div>

        <!-- General Error Message -->
        @if ($errors->any() && !$errors->has('email'))
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                <p class="text-sm font-medium text-red-800">
                    <i class="fa-solid fa-circle-exclamation mr-2"></i>
                    Unable to sign in. Please check your credentials and try again.
                </p>
            </div>
        @endif

        <!-- Login Form -->
        <form
            action="{{ route('auth.authenticate') }}"
            method="POST"
            novalidate>

            @csrf

            <!-- Email Field -->
            <div class="mb-6">

                <label for="email" class="mb-2 block text-sm font-medium text-slate-700">
                    Email Address
                </label>

                <div class="relative">
                    <i class="fa-regular fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="email"
                        placeholder="john.doe@swisscontact.org"
                        aria-label="Email Address"
                        aria-describedby="email-error"
                        class="w-full rounded-2xl border border-slate-300 py-3 pl-12 pr-4 text-base transition focus:border-[#00477A] focus:outline-none focus:ring-4 focus:ring-[#00477A]/10 @error('email') border-red-500 focus:ring-red-500/10 @enderror">

                </div>

                @error('email')
                    <p id="email-error" class="mt-2 text-sm text-red-600">
                        <i class="fa-solid fa-circle-xmark mr-1"></i>
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full rounded-2xl bg-[#00477A] py-3 font-semibold text-white transition hover:bg-[#00588F] focus:outline-none focus:ring-4 focus:ring-[#00477A]/20 active:scale-95 md:py-4">

                <span class="flex items-center justify-center gap-2">
                    Continue
                    <i class="fa-solid fa-arrow-right text-sm"></i>
                </span>

            </button>

        </form>

        <!-- Help Text -->
        <p class="mt-6 text-center text-xs text-slate-500">
            Only registered staff can access this portal
        </p>

    </div>

</div>

@endsection
