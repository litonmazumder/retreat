@extends('layouts.dashboard')

@section('title', 'Seminar Information')

@section('content')

<div class="space-y-8 px-5 py-6 pb-24">

    {{-- Contacts --}}
    <section>

        <div class="mb-5">
            <h2 class="text-2xl font-bold text-slate-900">
                Key Contacts
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Contact the organizing team if you need any assistance.
            </p>
        </div>

        <div class="space-y-4">

            {{-- Contact Card --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                {{-- Contact 1 --}}
                <details class="group">

                    <summary class="flex cursor-pointer list-none items-center justify-between p-5">

                        <div>

                            <h3 class="font-semibold text-slate-900">
                                Rubayet Alam Kusum
                            </h3>

                            <p class="text-sm text-slate-500">
                                Admin & Logistics
                            </p>

                        </div>

                        <i class="fa-solid fa-chevron-down text-slate-400 transition duration-300 group-open:rotate-180"></i>

                    </summary>

                    <div class="space-y-3 px-5 pb-5">

                        <a href="mailto:rubayet.kusum@swisscontact.org"
                        class="flex items-center gap-3 rounded-xl bg-slate-50 p-3 hover:bg-slate-100">

                            <i class="fa-solid fa-envelope text-[#00477A]"></i>

                            <span class="text-sm break-all">
                                rubayet.kusum@swisscontact.org
                            </span>

                        </a>

                        <a href="tel:+8801737609255"
                        class="flex items-center gap-3 rounded-xl bg-slate-50 p-3 hover:bg-slate-100">

                            <i class="fa-solid fa-phone text-[#00477A]"></i>

                            <span class="text-sm">
                                +880 1737 609255
                            </span>

                        </a>

                    </div>

                </details>

                <div class="border-t border-dashed border-slate-300"></div>

                {{-- Contact 2 --}}
                <details class="group">

                    <summary class="flex cursor-pointer list-none items-center justify-between p-5">

                        <div>

                            <h3 class="font-semibold text-slate-900">
                                Tamiz Uddin Mullick
                            </h3>

                            <p class="text-sm text-slate-500">
                                Head of Business Administration
                            </p>

                        </div>

                        <i class="fa-solid fa-chevron-down text-slate-400 transition duration-300 group-open:rotate-180"></i>

                    </summary>

                    <div class="space-y-3 px-5 pb-5">

                        <a href="mailto:tamiz.mullick@swisscontact.org"
                        class="flex items-center gap-3 rounded-xl bg-slate-50 p-3">
                            <i class="fa-solid fa-envelope text-[#00477A]"></i>
                            <span class="text-sm">tamiz.mullick@swisscontact.org</span>
                        </a>

                        <a href="tel:+880 1673 685680"
                        class="flex items-center gap-3 rounded-xl bg-slate-50 p-3">
                            <i class="fa-solid fa-phone text-[#00477A]"></i>
                            <span class="text-sm">+880 1673 685680</span>
                        </a>

                    </div>

                </details>

                <div class="border-t border-dashed border-slate-300"></div>

                {{-- Contact 3 --}}
                <details class="group">

                    <summary class="flex cursor-pointer list-none items-center justify-between p-5">

                        <div>

                            <h3 class="font-semibold text-slate-900">
                                Sabbir Rahman Khan
                            </h3>

                            <p class="text-sm text-slate-500">
                                Manager - MRM and KCM
                            </p>

                        </div>

                        <i class="fa-solid fa-chevron-down text-slate-400 transition duration-300 group-open:rotate-180"></i>

                    </summary>

                    <div class="space-y-3 px-5 pb-5">

                        <a href="mailto:sabbir.rahman@swisscontact.org"
                        class="flex items-center gap-3 rounded-xl bg-slate-50 p-3">
                            <i class="fa-solid fa-envelope text-[#00477A]"></i>
                            <span class="text-sm">sabbir.rahman@swisscontact.org</span>
                        </a>

                        <a href="tel:+880 1964 593658"
                        class="flex items-center gap-3 rounded-xl bg-slate-50 p-3">
                            <i class="fa-solid fa-phone text-[#00477A]"></i>
                            <span class="text-sm">+880 1964 593658</span>
                        </a>

                    </div>

                </details>

            </div>

            {{-- Add more contact cards here --}}

        </div>

    </section>

    {{-- Information --}}
    <section>

        <div class="mb-4">

            <h2 class="text-2xl font-bold text-slate-900">
                Information
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Everything you need during the seminar.
            </p>

        </div>

        <div class="grid grid-cols-2 gap-4">

            {{-- Emergency Contacts --}}
            <a href="{{ route('emergency-contacts') }}" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-[#00477A] hover:shadow-md">
                <i class="fa-solid fa-address-book text-3xl text-[#00477A]"></i>
                <h3 class="mt-4 font-semibold">Emergency Contacts</h3>
            </a>

            {{-- Rooms --}}

            <a href="{{route('rooms')}}" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-[#00477A] hover:shadow-md">
                <i class="fa-solid fa-door-open text-3xl text-[#00477A]"></i>
                <h3 class="mt-4 font-semibold">Rooms</h3>
            </a>

            {{-- LSP --}}
            <a href="{{route('lsp')}}" class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-[#00477A] hover:shadow-md">
                <i class="fa-solid fa-file-lines text-3xl text-[#00477A]"></i>
                <h3 class="mt-4 font-semibold">LSP</h3>
            </a>

        </div>

    </section>

</div>

@include('components.bottom-nav')

@endsection