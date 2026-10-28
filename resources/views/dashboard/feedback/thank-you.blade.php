@extends('layouts.dashboard')

@section('title', 'Thank You')

@section('content')

<div class="space-y-8 px-5 py-6 pb-24">

    <div class="flex min-h-[70vh] items-center justify-center">

        <div class="w-full rounded-3xl border border-slate-200 bg-white p-8 text-center shadow-sm">

            {{-- Success icon --}}

            <div
                class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-green-50"
            >
                <i class="fa-solid fa-check text-3xl text-green-600"></i>
            </div>


            {{-- Message --}}

            <h1 class="mt-6 text-2xl font-bold text-slate-900">
                Thank You!
            </h1>

            <p class="mx-auto mt-3 max-w-md text-sm leading-6 text-slate-500">
                Your feedback has been submitted successfully.
                Thank you for taking the time to share your thoughts
                with us.
            </p>


            {{-- Confirmation --}}

            <div
                class="mt-6 rounded-2xl bg-blue-50 p-4 text-sm text-slate-600"
            >
                <i class="fa-solid fa-circle-check mr-1 text-[#00477A]"></i>

                Your responses have been recorded.
            </div>

        </div>

    </div>

</div>

@include('components.bottom-nav')

@endsection