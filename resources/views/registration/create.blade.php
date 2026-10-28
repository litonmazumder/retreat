@extends('layouts.register')

@section('title', 'Seminar Registration')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;600;700&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400&display=swap');

    :root {
        --navy: #1a2f47;
        --navy-light: #2a3f57;
        --teal: #4a7c8c;
        --teal-light: #6b9aaa;
        --gold: #d4af6a;
        --neutral-900: #0f1419;
        --neutral-50: #f8f7f6;
        --neutral-100: #ede9e5;
        --neutral-200: #ddd5ca;
        --neutral-400: #a59e93;
        --neutral-600: #6d665d;
    }

    * {
        font-family: 'IBM Plex Sans', sans-serif;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Source Serif 4', serif;
    }
</style>

<div class="min-h-screen bg-neutral-50 p-4 md:p-0">

    <div class="mx-auto max-w-4xl">

        <div class="bg-white rounded-2xl md:rounded-3xl overflow-hidden md:border md:border-neutral-200 md:shadow-lg">

            <!-- Header -->
            <div class="px-4 py-6 md:px-10 md:py-10 text-center" style="background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);">

                <p class="mt-2 md:mt-3 text-sm md:text-lg text-white/90">
                    Complete your registration to access event dashboard.
                </p>

            </div>

            <!-- Form -->
            <form
                action="{{route('participant.register.store')}}"
                method="POST"
                class="p-4 md:p-10 space-y-5 md:space-y-8">

                @csrf

                <!-- Error Messages -->
                @if ($errors->any())
                    <ul class="space-y-2">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-start gap-2 text-sm text-red-600">
                                <span class="mt-1 h-1.5 w-1.5 rounded-full bg-red-500 flex-shrink-0"></span>
                                <span>{{ $error }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <!-- First Name -->
                <div>
                    <label class="block mb-2 text-sm md:text-base font-medium text-neutral-900">
                        First Name
                        <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        placeholder="Enter first name"
                        autocomplete="given-name"
                        required
                        class="w-full rounded-lg md:rounded-xl border border-neutral-200 px-4 py-3 md:py-3 text-base text-neutral-900 outline-none transition placeholder:text-neutral-400 focus:border-var(--teal) focus:ring-3 focus:ring-var(--teal)/15"
                        style="border-color: var(--neutral-200);">
                </div>

                <!-- Last Name -->
                <div>
                    <label class="block mb-2 text-sm md:text-base font-medium text-neutral-900">
                        Last Name
                        <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        placeholder="Enter last name"
                        autocomplete="family-name"
                        required
                        class="w-full rounded-lg md:rounded-xl border border-neutral-200 px-4 py-3 md:py-3 text-base text-neutral-900 outline-none transition placeholder:text-neutral-400 focus:border-var(--teal) focus:ring-3 focus:ring-var(--teal)/15"
                        style="border-color: var(--neutral-200);">
                </div>

                <!-- Email -->
                <div>
                    <label class="block mb-2 text-sm md:text-base font-medium text-neutral-900">
                        Email Address
                        <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter email address"
                        autocomplete="email"
                        required
                        class="w-full rounded-lg md:rounded-xl border border-neutral-200 px-4 py-3 md:py-3 text-base text-neutral-900 outline-none transition placeholder:text-neutral-400 focus:border-var(--teal) focus:ring-3 focus:ring-var(--teal)/15"
                        style="border-color: var(--neutral-200);">
                </div>

                <!-- Designation -->
                <div>
                    <label class="block mb-2 text-sm md:text-base font-medium text-neutral-900">
                        Designation
                    </label>
                    <input
                        type="text"
                        name="designation"
                        value="{{ old('designation') }}"
                        placeholder="e.g., Project Manager"
                        class="w-full rounded-lg md:rounded-xl border border-neutral-200 px-4 py-3 md:py-3 text-base text-neutral-900 outline-none transition placeholder:text-neutral-400 focus:border-var(--teal) focus:ring-3 focus:ring-var(--teal)/15"
                        style="border-color: var(--neutral-200);">
                </div>

                <!-- Project Name -->
                <!-- <div>
                    <label class="block mb-2 text-sm md:text-base font-medium text-neutral-900">
                        Project Name
                    </label>
                    <input
                        type="text"
                        name="project_name"
                        value="{{ old('project_name') }}"
                        placeholder="Enter project name"
                        class="w-full rounded-lg md:rounded-xl border border-neutral-200 px-4 py-3 md:py-3 text-base text-neutral-900 outline-none transition placeholder:text-neutral-400 focus:border-var(--teal) focus:ring-3 focus:ring-var(--teal)/15"
                        style="border-color: var(--neutral-200);">
                </div> -->

                <!-- Country -->
                <div>
                    <label class="block mb-2 text-sm md:text-base font-medium text-neutral-900">
                        Country
                    </label>
                    <select
                        name="region"
                        class="w-full rounded-lg md:rounded-xl border border-neutral-200 bg-white px-4 py-3 md:py-3 text-base text-neutral-900 outline-none transition focus:border-var(--teal) focus:ring-3 focus:ring-var(--teal)/15"
                        style="border-color: var(--neutral-200);">
                        <option value="" disabled {{ old('country') ? '' : 'selected' }}>
                            Select country
                        </option>
                        <option value="Bangladesh" {{ old('country') == 'BGD' ? 'selected' : '' }}>Bangladesh</option>
                        <option value="Cambodia" {{ old('country') == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                        <option value="Indonesia" {{ old('country') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                        <option value="Laos" {{ old('country') == 'Laos' ? 'selected' : '' }}>Laos</option>
                        <option value="Myanmar" {{ old('country') == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
                        <option value="Nepal" {{ old('country') == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                    </select>
                </div>

                <!-- Terms Checkbox -->
                <div class="rounded-lg md:rounded-2xl border border-neutral-200 bg-neutral-50 p-3 md:p-5">
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input
                            type="checkbox"
                            required
                            class="mt-1 rounded border-neutral-300 accent-blue-600"
                            style="accent-color: var(--navy);">
                        <span class="text-xs md:text-sm text-neutral-600 leading-relaxed">
                            I confirm that the information provided is accurate and consent to receiving event communications.
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full rounded-lg md:rounded-xl py-3 md:py-4 text-base md:text-lg font-medium text-white transition"
                    style="background-color: var(--navy);"
                    onmouseover="this.style.backgroundColor='var(--navy-light)'; this.style.boxShadow='0 4px 12px rgba(26, 47, 71, 0.2)'"
                    onmouseout="this.style.backgroundColor='var(--navy)'; this.style.boxShadow='none'">
                    Submit Registration
                </button>

            <!-- Already Registered Link -->
                <a href="/"
                   class="w-full rounded-lg md:rounded-xl py-3 md:py-4 text-base md:text-lg font-medium text-center transition border block"
                   style="border-color: var(--navy); color: var(--navy);"
                   onmouseover="this.style.backgroundColor='var(--navy)'; this.style.color='white'"
                   onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--navy)'">
                    Already Registered?
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
