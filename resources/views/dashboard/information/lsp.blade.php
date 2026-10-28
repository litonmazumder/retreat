@extends('layouts.dashboard')

@section('title', 'LSP')

@section('content')

<div class="mx-auto max-w-4xl px-6 pt-6">

    {{-- Header --}}
    <div class="mb-10 flex items-center gap-3">

        <a href="{{ url()->previous() }}"
            class="text-slate-700 transition hover:text-[#00477A]">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-7 w-7"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7" />

            </svg>

        </a>

        <h2 class="text-3xl font-bold text-slate-800">
            LSP
        </h2>

    </div>

    {{-- Introduction --}}
    <section class="mb-8">

        <h1 class="text-4xl font-bold text-slate-800">
            Local Security Plan (LSP)
        </h1>

        <p class="mt-4 leading-8 text-slate-700">
            Please review the Local Security Plan (LSP) carefully before your journey.
            The document contains important security guidance, emergency contacts,
            and essential information for your stay in Bangladesh.
        </p>

    </section>

    {{-- PDF Actions --}}
    <div class="mb-6 flex flex-wrap gap-3">

        <a href="{{ asset('documents/Retreat_LSP.pdf') }}"
            target="_blank"
            class="inline-flex items-center gap-2 rounded-xl bg-[#00477A] px-5 py-3 text-white transition hover:bg-[#00355c]">

            <i class="fa-solid fa-eye"></i>
            View PDF

        </a>

        <a href="{{ asset('documents/LSP_Swisscontact_Bangladesh_Visitors_Jul 2026.pdf') }}"
            download
            class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-slate-700 transition hover:bg-slate-100">

            <i class="fa-solid fa-download"></i>
            Download PDF

        </a>

    </div>

    {{-- PDF Viewer --}}
<!-- <div >
    <iframe
        src="{{ asset('documents/LSP_Swisscontact_Bangladesh_Visitors_Jul 2026n.pdf') }}"
        class="w-full h-[calc(100vh-120px)]">
    </iframe>
</div> -->

</div>

@include('components.bottom-nav')

@endsection