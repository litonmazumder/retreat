@extends('layouts.dashboard')

@section('title', 'Senses of Bangladesh')

@section('content')

<div class="mx-auto max-w-3xl px-6 py-6">

    {{-- Header --}}
    <div class="mb-10 flex items-center gap-3">

        <!-- <a href="{{ url()->previous() }}"
            class="text-slate-700 hover:text-[#00477A]">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-7 w-7"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"/>

            </svg>

        </a> -->

         <h2 class="text-2xl font-bold text-slate-900">
            Senses of Bangladesh
        </h2>

    </div>

    <!-- <p class="mb-10 text-lg leading-8 text-slate-600">

    </p> -->

    <div class="space-y-5">

        {{-- Taste --}}
        <a href="{{ route('taste') }}"
            class="group flex items-center overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:border-[#00477A] hover:shadow-lg">

            <div class="flex w-32 items-center justify-center border-r bg-orange-50 p-8">

                <h2 class="text-xl font-bold">
                    Taste
                </h2>

            </div>

            <div class="flex flex-1 items-center justify-between p-6">

                <div>

                    <p class="text-slate-500">
                        Traditional foods & local flavours
                    </p>

                </div>

                <!-- <div class="text-5xl">
                    🍜
                </div> -->

                <div class="w-16 h-16">
                    <img src="{{ asset('images/icons/taste.svg') }}" alt="Hand" class="w-full h-full">
                </div>

            </div>

        </a>

        {{-- Touch --}}
        <a href="{{ route('touch') }}"
            class="group flex items-center overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:border-[#00477A] hover:shadow-lg">

            <div class="flex w-32 items-center justify-center border-r bg-amber-50 p-8">

                <h2 class="text-xl font-bold">
                    Touch
                </h2>

            </div>

            <div class="flex flex-1 items-center justify-between p-6">

                <p class="text-slate-500">
                    Handicrafts & local traditions
                </p>

                <div class="w-16 h-16">
                    <img src="{{ asset('images/icons/touch.svg') }}" alt="Hand" class="w-full h-full">
                </div>

                <!-- <div class="text-5xl">
                    🛍️
                </div> -->

            </div>

        </a>

        {{-- Sight --}}
        <a href="{{ route('sight') }}"
            class="group flex items-center overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:border-[#00477A] hover:shadow-lg">

            <div class="flex w-32 items-center justify-center border-r bg-green-50 p-8">

                <h2 class="text-xl font-bold">
                    Sight
                </h2>

            </div>

            <div class="flex flex-1 items-center justify-between p-6">

                <p class="text-slate-500">
                    Beautiful places to discover
                </p>

                <!-- <div class="text-5xl">
                    👁️
                </div> -->

                <div class="w-16 h-16">
                    <img src="{{ asset('images/icons/sight.svg') }}" alt="Eye" class="w-full h-full">
                </div>

            </div>

        </a>

        {{-- Hear --}}
        <a href="{{ route('hear') }}"
            class="group flex items-center overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:border-[#00477A] hover:shadow-lg">

            <div class="flex w-32 items-center justify-center border-r bg-blue-50 p-8">

                <h2 class="text-xl font-bold">
                    Hear
                </h2>

            </div>

            <div class="flex flex-1 items-center justify-between p-6">

                <p class="text-slate-500">
                    Music & sounds of Bangladesh
                </p>

                <div class="w-16 h-16">
                    <img src="{{ asset('images/icons/hear.svg') }}" alt="Ear" class="w-full h-full">
                </div>

                <!-- <div class="text-5xl">
                    🎵
                </div> -->
                <!-- 
                <div class="w-16 h-16">
                    <img src="{{ asset('images/icons/Hear.svg') }}" alt="Eye" class="w-full h-full">
                </div> -->

            </div>

        </a>

        {{-- Smell --}}
        <a href="{{ route('smell') }}"
            class="group flex items-center overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:border-[#00477A] hover:shadow-lg">

            <div class="flex w-32 items-center justify-center border-r bg-pink-50 p-8">

                <h2 class="text-xl font-bold">
                    Smell
                </h2>

            </div>

            <div class="flex flex-1 items-center justify-between p-6">

                <p class="text-slate-500">
                    Flowers, spices & fresh air
                </p>

                <div class="w-16 h-16">
                    <img src="{{ asset('images/icons/smell.svg') }}" alt="Nose" class="w-full h-full">
                </div>

                <!-- <div class="text-5xl">
                    🌸
                </div> -->

            </div>

        </a>

        {{-- Feel --}}
        <a href="{{ route('feel') }}"
            class="group flex items-center overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:border-[#00477A] hover:shadow-lg">

            <div class="flex w-32 items-center justify-center border-r bg-yellow-50 p-8">

                <h2 class="text-xl font-bold">
                    Feel
                </h2>

            </div>

            <div class="flex flex-1 items-center justify-between p-6">

                <p class="text-slate-500">
                    Experience the warmth of Bangladesh
                </p>

                <div class="w-16 h-16">
                    <img src="{{ asset('images/icons/feel.svg') }}" alt="Hand" class="w-full h-full">
                </div>

                <!-- <div class="text-5xl">
                    😊
                </div> -->

            </div>

        </a>

    </div>

</div>

@include('components.bottom-nav')

@endsection