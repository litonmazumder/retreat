@extends('layouts.admin')

@section('title', 'Add Participant')

@section('content')

<div class="mx-auto max-w-5xl space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div class="flex items-center gap-4">

            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#00477A]/10">

                <i class="fa-solid fa-user-plus text-2xl text-[#00477A]"></i>

            </div>

            <div>

                <h1 class="text-3xl font-bold text-slate-800">
                    Add Participant
                </h1>

                <p class="mt-1 text-slate-500">
                    Register a participant for Asia Seminar 2026.
                </p>

            </div>

        </div>

        <a
            href="{{ route('admin.participants.index') }}"
            class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 font-medium text-slate-700 transition hover:bg-slate-50">

            <i class="fa-solid fa-arrow-left"></i>

            Participant List

        </a>

    </div>

    {{-- Success --}}
    @if(session('success'))

        <div class="rounded-2xl border border-green-200 bg-green-50 p-5">

            <div class="flex items-start gap-4">

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100">

                    <i class="fa-solid fa-circle-check text-green-600"></i>

                </div>

                <div>

                    <h3 class="font-semibold text-green-800">
                        Success
                    </h3>

                    <p class="mt-1 text-green-700">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        </div>

    @endif

    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="rounded-2xl border border-red-200 bg-red-50 p-5">

            <div class="flex items-start gap-4">

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100">

                    <i class="fa-solid fa-circle-exclamation text-red-600"></i>

                </div>

                <div>

                    <h3 class="font-semibold text-red-800">
                        Please correct the following errors
                    </h3>

                    <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif

    <form
        action="{{ route('admin.participants.store') }}"
        method="POST"
        class="space-y-6">

        @csrf

        {{-- Personal Information --}}
        <div class="rounded-2xl bg-white shadow">

            <div class="border-b px-8 py-5">

                <h2 class="flex items-center gap-2 text-lg font-semibold text-slate-800">

                    <i class="fa-solid fa-user text-[#00477A]"></i>

                    Personal Information

                </h2>

            </div>

            <div class="grid gap-6 p-8 md:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-medium">

                        First Name
                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        required
                        autofocus
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 transition focus:border-[#00477A] focus:ring-4 focus:ring-[#00477A]/10">

                </div>

                <div>

                    <label class="mb-2 block text-sm font-medium">

                        Last Name
                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 transition focus:border-[#00477A] focus:ring-4 focus:ring-[#00477A]/10">

                </div>

                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-medium">

                        Email Address
                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 transition focus:border-[#00477A] focus:ring-4 focus:ring-[#00477A]/10">

                </div>

            </div>

        </div>

        {{-- Professional Information --}}
        <div class="rounded-2xl bg-white shadow">

            <div class="border-b px-8 py-5">

                <h2 class="flex items-center gap-2 text-lg font-semibold text-slate-800">

                    <i class="fa-solid fa-briefcase text-[#00477A]"></i>

                    Professional Information

                </h2>

            </div>

            <div class="grid gap-6 p-8 md:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-medium">
                        Designation
                    </label>

                    <input
                        type="text"
                        name="designation"
                        value="{{ old('designation') }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 transition focus:border-[#00477A] focus:ring-4 focus:ring-[#00477A]/10">

                </div>

                <!-- <div>

                    <label class="mb-2 block text-sm font-medium">
                        Project Name
                    </label>

                    <input
                        type="text"
                        name="project_name"
                        value="{{ old('project_name') }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 transition focus:border-[#00477A] focus:ring-4 focus:ring-[#00477A]/10">

                </div> -->

                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-medium">
                        Region
                    </label>

                <select
                    name="region"
                    required
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 transition focus:border-[#00477A] focus:ring-4 focus:ring-[#00477A]/10">

                    <option value="">Select Region</option>

                    @foreach([
                        'GO' => 'Global Office',
                        'BGD' => 'Bangladesh',
                        'IDN' => 'Indonesia',
                        'NPL' => 'Nepal',
                        'KHM' => 'Cambodia',
                        'KHM/CHE' => 'Cambodia / Switzerland',
                        'KHM/DEU' => 'Cambodia / Germany',
                        'LAO' => 'Laos',
                        'LAO/BGD' => 'Laos / Bangladesh',
                        'LAO/DEU' => 'Laos / Germany',
                        'LAO/PHL' => 'Laos / Philippines',
                        'LAO/NPL' => 'Laos / Nepal',
                        'MMR' => 'Myanmar',
                    ] as $code => $name)
                        <option value="{{ $code }}" @selected(old('region') == $code)>
                            {{ $name }}
                        </option>
                    @endforeach

                </select>

                @error('region')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="rounded-2xl bg-white shadow">

            <div class="flex items-center justify-between p-6">

                <p class="text-sm text-slate-500">
                    Fields marked with
                    <span class="text-red-500">*</span>
                    are required.
                </p>

                <div class="flex gap-3">

                    <a
                        href="{{ route('admin.participants.index') }}"
                        class="rounded-xl border border-slate-300 px-6 py-3 font-medium text-slate-700 transition hover:bg-slate-100">

                        Cancel

                    </a>

                    <button
                        type="submit"
                        class="rounded-xl bg-[#00477A] px-8 py-3 font-medium text-white shadow transition hover:bg-[#00365d]">

                        <i class="fa-solid fa-floppy-disk mr-2"></i>

                        Save Participant

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection