
@extends('layouts.dashboard')

@section('title', 'Emergency & Support Contacts')

@section('content')

<div class="mx-auto max-w-3xl space-y-8 px-4 py-6 sm:px-6">

    {{-- Header --}}
    <div class="flex items-center gap-3">
        <a href="{{ url()->previous() }}"
           class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-slate-600 transition hover:bg-slate-100 hover:text-[#00477A]"
           aria-label="Go back">
            <i class="fa-solid fa-arrow-left text-lg"></i>
        </a>

        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">
                Emergency &amp; Support Contacts
            </h1>
            <!-- <p class="mt-1 text-sm text-slate-500">
                Swisscontact Bangladesh • Annual Retreat 2026
            </p> -->
        </div>
    </div>

    {{-- Introduction --}}
    <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5">
        <div class="flex items-start gap-4">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-[#00477A] shadow-sm">
                <i class="fa-solid fa-address-book text-xl"></i>
            </div>

            <div>
                <h2 class="text-lg font-bold text-slate-900">
                    Emergency Contacts
                </h2>
                <p class="mt-1 text-sm leading-6 text-slate-600">
                    For first aid, security, resort assistance and other
                    urgent support during the retreat.
                </p>
            </div>
        </div>
    </section>

                {{-- Reception --}}
    <details class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-5 hover:bg-slate-50 [&::-webkit-details-marker]:hidden">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-700">
                    <i class="fa-solid fa-bell-concierge text-lg"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900">
                        Reception
                    </h3>
                    <p class="mt-1 text-xs text-slate-500">
                        Sarah Resort
                    </p>
                </div>
            </div>

            <i class="fa-solid fa-chevron-down text-sm text-slate-400 transition-transform group-open:rotate-180"></i>
        </summary>

        <div class="border-t border-slate-100 p-4 sm:p-5">
            <div class="rounded-xl bg-amber-50 p-4">
                <p class="font-semibold text-slate-900">
                    Sarah Resort Reception
                </p>

                <div class="mt-3 flex items-start gap-3 text-sm leading-6 text-slate-700">
                    <i class="fa-solid fa-phone-volume mt-1 text-amber-700"></i>
                    <p>
                        Dial <strong>0</strong> from the room telephone
                        to contact reception.
                    </p>
                </div>
            </div>
        </div>
    </details>

    {{-- Emergency Contacts --}}
    <section>
        <div class="mb-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                <i class="fa-solid fa-kit-medical text-lg"></i>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900">
                    Emergency Contacts
                </h2>
                <p class="text-sm text-slate-500">
                    First aid and immediate assistance
                </p>
            </div>
        </div>

        <div class="space-y-3">

            {{-- In-house First Aiders --}}
            <details open class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-5 hover:bg-slate-50 [&::-webkit-details-marker]:hidden">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                            <i class="fa-solid fa-user-doctor text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900">
                                In-house First Aiders
                            </h3>
                            <p class="mt-1 text-xs text-slate-500">
                                3 contacts
                            </p>
                        </div>
                    </div>

                    <i class="fa-solid fa-chevron-down text-sm text-slate-400 transition-transform group-open:rotate-180"></i>
                </summary>

                <div class="space-y-3 border-t border-slate-100 p-4 sm:p-5">
                    @foreach ([
                        ['Rezaul Karim', '+880 1711 148917'],
                        ['Salma Akhter', '+880 1781 400438'],
                        ['Zannatul Ferdous Pushpa', '+880 1829 231055'],
                    ] as $contact)
                        <div class="flex items-center justify-between gap-3 rounded-xl bg-slate-50 p-3">
                            <div class="min-w-0">
                                <p class="font-medium text-slate-800">
                                    {{ $contact[0] }}
                                </p>
                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $contact[1] }}
                                </p>
                            </div>

                            <a href="tel:{{ preg_replace('/\s+/', '', $contact[1]) }}"
                               aria-label="Call {{ $contact[0] }}"
                               class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700 transition hover:bg-emerald-600 hover:text-white">
                                <i class="fa-solid fa-phone"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </details>

            {{-- First Aid Boxes --}}
            <details class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-5 hover:bg-slate-50 [&::-webkit-details-marker]:hidden">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#00477A]">
                            <i class="fa-solid fa-briefcase-medical text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900">
                                First Aid Boxes Kept With
                            </h3>
                            <p class="mt-1 text-xs text-slate-500">
                                4 contacts
                            </p>
                        </div>
                    </div>

                    <i class="fa-solid fa-chevron-down text-sm text-slate-400 transition-transform group-open:rotate-180"></i>
                </summary>

                <div class="space-y-3 border-t border-slate-100 p-4 sm:p-5">
                    @foreach ([
                        ['Masud Parvez', '+880 1718 585880'],
                        ['Harun Ar Rashid', '+880 1715 690782'],
                        ['Hafizur Rahman', '+880 1724 947230'],
                        ['Aminur Islam', '+880 1719 822679'],
                    ] as $contact)
                        <div class="flex items-center justify-between gap-3 rounded-xl bg-slate-50 p-3">
                            <div class="min-w-0">
                                <p class="font-medium text-slate-800">
                                    {{ $contact[0] }}
                                </p>
                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $contact[1] }}
                                </p>
                            </div>

                            <a href="tel:{{ preg_replace('/\s+/', '', $contact[1]) }}"
                               aria-label="Call {{ $contact[0] }}"
                               class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#00477A] transition hover:bg-[#00477A] hover:text-white">
                                <i class="fa-solid fa-phone"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </details>

            {{-- Resort Emergency Contact --}}
            <details class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-5 hover:bg-slate-50 [&::-webkit-details-marker]:hidden">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-700">
                            <i class="fa-solid fa-hotel text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900">
                                Sarah Resort Emergency Contact
                            </h3>
                            <p class="mt-1 text-xs text-slate-500">
                                Resort emergency assistance
                            </p>
                        </div>
                    </div>

                    <i class="fa-solid fa-chevron-down text-sm text-slate-400 transition-transform group-open:rotate-180"></i>
                </summary>

                <div class="border-t border-slate-100 p-4 sm:p-5">
                    <div class="rounded-xl bg-amber-50 p-4">
                        <p class="font-semibold text-slate-900">
                            Subrata Mondol
                        </p>
                        <p class="mt-1 text-sm text-slate-600">
                            Operation Manager – Sarah Resort (emergency)
                        </p>

                        <a href="tel:+8801321200350"
                           class="mt-4 inline-flex min-h-10 items-center gap-2 rounded-lg bg-white px-4 py-2 text-sm font-semibold text-amber-800 shadow-sm transition hover:bg-amber-100">
                            <i class="fa-solid fa-phone"></i>
                            +880 1321 200350
                        </a>
                    </div>
                </div>
            </details>

        </div>
    </section>

    {{-- Security & Other Contacts --}}
    <section>
        <div class="mb-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-100 text-indigo-700">
                <i class="fa-solid fa-shield-halved text-lg"></i>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900">
                    Security &amp; Other Contacts
                </h2>
                <p class="text-sm text-slate-500">
                    Additional support during the retreat
                </p>
            </div>
        </div>

        <div class="space-y-3">

            {{-- Security Committee --}}
            <details class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-5 hover:bg-slate-50 [&::-webkit-details-marker]:hidden">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-700">
                            <i class="fa-solid fa-shield-halved text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900">
                                Security Committee
                            </h3>
                            <p class="mt-1 text-xs text-slate-500">
                                3 contacts
                            </p>
                        </div>
                    </div>

                    <i class="fa-solid fa-chevron-down text-sm text-slate-400 transition-transform group-open:rotate-180"></i>
                </summary>

                <div class="space-y-3 border-t border-slate-100 p-4 sm:p-5">
                    @foreach ([
                        ['Tamiz Uddin Mullick', '+880 1673 685680'],
                        ['Suranjan Chandra Dey', '+880 1810 045656'],
                        ['Rubayet Alam Kusum', '+880 1737 609255'],
                    ] as $contact)
                        <div class="flex items-center justify-between gap-3 rounded-xl bg-slate-50 p-3">
                            <div class="min-w-0">
                                <p class="font-medium text-slate-800">
                                    {{ $contact[0] }}
                                </p>
                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $contact[1] }}
                                </p>
                            </div>

                            <a href="tel:{{ preg_replace('/\s+/', '', $contact[1]) }}"
                               aria-label="Call {{ $contact[0] }}"
                               class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-700 transition hover:bg-indigo-600 hover:text-white">
                                <i class="fa-solid fa-phone"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </details>

            {{-- Police Station --}}
            <details class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-5 hover:bg-slate-50 [&::-webkit-details-marker]:hidden">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#00477A]">
                            <i class="fa-solid fa-building-shield text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900">
                                Nearest Police Station
                            </h3>
                            <p class="mt-1 text-xs text-slate-500">
                                Sreepur Thana
                            </p>
                        </div>
                    </div>

                    <i class="fa-solid fa-chevron-down text-sm text-slate-400 transition-transform group-open:rotate-180"></i>
                </summary>

                <div class="border-t border-slate-100 p-4 sm:p-5">
                    <div class="flex items-center justify-between gap-3 rounded-xl bg-slate-50 p-3">
                        <div>
                            <p class="font-medium text-slate-800">Sreepur Thana</p>
                            <p class="mt-1 text-sm text-slate-500">
                                +880 1713 373366
                            </p>
                        </div>

                        <a href="tel:+8801713373366"
                           aria-label="Call Sreepur Thana"
                           class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#00477A] transition hover:bg-[#00477A] hover:text-white">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                    </div>
                </div>
            </details>

            {{-- Standby Drivers --}}
            <details class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-5 hover:bg-slate-50 [&::-webkit-details-marker]:hidden">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-cyan-50 text-cyan-700">
                            <i class="fa-solid fa-car text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900">
                                Standby Drivers
                            </h3>
                            <p class="mt-1 text-xs text-slate-500">
                                3 contacts
                            </p>
                        </div>
                    </div>

                    <i class="fa-solid fa-chevron-down text-sm text-slate-400 transition-transform group-open:rotate-180"></i>
                </summary>

                <div class="space-y-3 border-t border-slate-100 p-4 sm:p-5">
                    @foreach ([
                        ['Nipu Hazra', '+880 1726 245555'],
                        ['Tutul Roy', '+880 1705 156238'],
                        ['Saiful Islam Milon', '+880 1775 550123'],
                    ] as $contact)
                        <div class="flex items-center justify-between gap-3 rounded-xl bg-slate-50 p-3">
                            <div class="min-w-0">
                                <p class="font-medium text-slate-800">
                                    {{ $contact[0] }}
                                </p>
                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $contact[1] }}
                                </p>
                            </div>

                            <a href="tel:{{ preg_replace('/\s+/', '', $contact[1]) }}"
                               aria-label="Call {{ $contact[0] }}"
                               class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-cyan-50 text-cyan-700 transition hover:bg-cyan-600 hover:text-white">
                                <i class="fa-solid fa-phone"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </details>

        </div>
    </section>

        {{-- National Emergency Number --}}
    <section class="overflow-hidden rounded-2xl border border-red-200 bg-red-50">
        <div class="flex items-start gap-4 p-5">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-700">
                <i class="fa-solid fa-phone-volume text-xl"></i>
            </div>

            <div class="min-w-0 flex-1">
                <p class="text-xs font-bold uppercase tracking-widest text-red-700">
                    National Emergency Service
                </p>

                <h2 class="mt-1 text-lg font-bold text-red-900">
                    National Emergency Number
                </h2>

                <p class="mt-1 text-sm text-red-800">
                    For urgent emergencies in Bangladesh.
                </p>

                <a href="tel:999"
                   class="mt-4 inline-flex min-h-12 items-center gap-3 rounded-xl bg-red-600 px-5 py-3 text-white shadow-sm transition hover:bg-red-700">
                    <i class="fa-solid fa-phone"></i>
                    <span class="text-xl font-bold tracking-wide">999</span>
                    <span class="text-sm font-medium">Call now</span>
                </a>
            </div>
        </div>
    </section>

    {{-- Important Reminder --}}
    <section class="rounded-2xl border-l-4 border-red-500 bg-red-50 p-5">
        <div class="flex items-start gap-3">
            <i class="fa-solid fa-triangle-exclamation mt-1 text-xl text-red-600"></i>

            <div>
                <h3 class="font-bold text-red-900">
                    Important Reminder
                </h3>

                <p class="mt-2 text-sm leading-6 text-red-800">
                    In an emergency, contact the appropriate first aider,
                    the resort emergency contact or the national emergency
                    service. For resort reception assistance, dial 0 from
                    your room telephone.
                </p>
            </div>
        </div>
    </section>

</div>

@include('components.bottom-nav')

@endsection
