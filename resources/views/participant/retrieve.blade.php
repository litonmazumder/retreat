@extends('layouts.app')

@section('title', 'Retrieve Event Pass')

@section('content')

<div class="max-w-xl mx-auto">

    <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden">

        <!-- Header -->

        <div class="bg-gradient-to-r from-[#00477A] to-[#0063A6] px-8 py-8 text-center">

            <h1 class="text-3xl font-bold text-white">

                Retrieve Your Event Pass

            </h1>

            <p class="mt-3 text-blue-100">

                Lost your Event Pass?
                Enter the email address used during registration.
                We'll send it to you again.

            </p>

        </div>

        <div class="p-8">

            @if(session('success'))

                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">

                    {{ session('success') }}

                </div>

            @endif

            <form
                method="POST"
                action="{{ route('participant.retrieve.submit') }}"
                class="space-y-6">

                @csrf

                <div>

                    <label class="block mb-2 font-semibold text-gray-700">

                        Registered Email Address

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="example@email.com"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-[#00477A] focus:ring-4 focus:ring-blue-100 outline-none">

                    @error('email')

                        <p class="mt-2 text-sm text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                </div>

                <button
                    type="submit"
                    class="w-full rounded-xl bg-[#00477A] py-4 text-lg font-semibold text-white transition hover:bg-[#003760]">

                    Send My Event Pass

                </button>

            </form>

        </div>

        <div class="border-t bg-slate-50 px-8 py-6">

            <h3 class="font-semibold text-[#00477A]">

                Didn't receive the email?

            </h3>

            <ul class="mt-3 space-y-2 text-sm text-slate-600 list-disc pl-5">

                <li>Check your Spam or Junk folder.</li>

                <li>Make sure you entered the same email used during registration.</li>

                <li>If you still need assistance, contact the event organizer.</li>

            </ul>

        </div>

    </div>

</div>

@endsection