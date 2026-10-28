<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="google" content="notranslate">
    <meta http-equiv="Content-Language" content="{{ app()->getLocale() === 'bn' ? 'bn-BD' : 'en' }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <meta name="theme-color" content="#00477A">

    <meta name="description" content="Asia Seminar 2026 Participant Portal">

    <title>@yield('title', 'Asia Seminar 2026')</title>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;600;700&family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        :root {
            --navy-600: #00477A;
            --navy-50: #F0F5FB;
            --teal-600: #0D9488;
            --teal-50: #F0FDF4;
            --gold-600: #B8860B;
            --gold-50: #FEFCE8;
            --slate-50: #F8FAFC;
            --slate-100: #F1F5F9;
            --slate-200: #E2E8F0;
            --slate-600: #475569;
            --slate-900: #0F172A;
        }

        * {
            font-family: 'IBM Plex Sans', sans-serif;
        }

        .font-serif {
            font-family: 'Source Serif 4', serif;
        }

        .font-mono {
            font-family: 'IBM Plex Mono', monospace;
        }

        /* Color utilities */
        .text-navy-600 { color: var(--navy-600); }
        .bg-navy-600 { background-color: var(--navy-600); }
        .bg-navy-50 { background-color: var(--navy-50); }
        .border-navy-200 { border-color: #E0EAF8; }

        .text-teal-600 { color: var(--teal-600); }
        .bg-teal-50 { background-color: var(--teal-50); }

        .text-gold-600 { color: var(--gold-600); }
        .bg-gold-50 { background-color: var(--gold-50); }

        /* Smooth transitions */
        button, a {
            transition: all 150ms ease-in-out;
        }

        /* Status badge animation */
        @keyframes pulse-status {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .animate-pulse-status {
            animation: pulse-status 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Fade in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(4px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Safe area support for notch devices */
        body {
            padding-top: max(12px, env(safe-area-inset-top));
            padding-bottom: max(12px, env(safe-area-inset-bottom));
        }

        /* Header blur effect */
        .header-blur {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
        }

        /* Smooth scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>

</head>

<body class="bg-slate-50 text-slate-900">

<div x-data="participantApp()" class="mx-auto flex min-h-screen max-w-md flex-col bg-white shadow-2xl">

    {{-- ===============================================
        PREMIUM HEADER WITH LOGO
    ================================================= --}}
    <header class="sticky top-0 z-50 header-blur border-b border-slate-200">

        {{-- Logo & Branding Section --}}
{{-- ===========================================
    Seminar Branding
=========================================== --}}
<div
    class="relative overflow-hidden bg-gradient-to-br from-[#00477A] via-[#005D99] to-[#007CC2] px-6 pt-8 pb-10 text-white">

    {{-- Decorative circles --}}
    <div class="absolute -top-10 -right-10 h-36 w-36 rounded-full bg-white/10"></div>
    <div class="absolute -bottom-8 -left-8 h-28 w-28 rounded-full bg-white/10"></div>

    <div class="relative flex flex-col items-center">

        {{-- Logo --}}
        <div
            class="flex h-20 w-20 items-center justify-center rounded-full bg-white shadow-xl">

            {{-- Replace with your own logo --}}
            <img
                src="{{ asset('images/seminar-logo.png') }}"
                alt="Asia Seminar"
                class="h-14 w-14 object-contain">

            {{-- OR use your SVG --}}
            {{-- SVG HERE --}}

        </div>

        <h1 class="mt-5 text-2xl font-bold tracking-wide">
            Asia Seminar
        </h1>

        <p class="text-lg font-semibold text-blue-100">
            2026
        </p>

        <span
            class="mt-3 rounded-full bg-white/15 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.25em] text-blue-50 backdrop-blur">

            Participant Portal

        </span>

    </div>

</div>

        {{-- User Profile Bar --}}
        @isset($participant)
            <div class="flex items-center justify-between px-5 py-4 bg-gradient-to-r from-navy-50 to-teal-50">

                <div class="flex-1">
                    <p class="text-xs font-semibold uppercase tracking-widest text-slate-500 mb-1">
                        Welcome
                    </p>
                    <h2 class="text-base font-semibold text-slate-900">
                        {{ $participant->first_name }} {{ $participant->last_name }}
                    </h2>
                    <p class="text-xs text-slate-600 mt-1">
                        <i class="fa-solid fa-location-dot text-teal-600 mr-1.5"></i>
                        {{ $participant->country }}
                    </p>
                </div>

                {{-- Participant Status Indicator --}}
                <div class="ml-4 text-center">
                    <div class="inline-block rounded-full bg-white px-3 py-2 shadow-sm border border-slate-200">
                        @if($participant->profile_confirmed)
                            <div class="flex flex-col items-center gap-1">
                                <i class="fa-solid fa-circle-check text-lg text-teal-600"></i>
                                <span class="text-xs font-semibold text-teal-700">Verified</span>
                            </div>
                        @else
                            <div class="flex flex-col items-center gap-1">
                                <i class="fa-solid fa-hourglass-end text-lg text-gold-600 animate-pulse-status"></i>
                                <span class="text-xs font-semibold text-gold-700">Pending</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Logout Button --}}
                <form action="{{ route('participant.logout') }}" method="POST" class="ml-4">
                    @csrf
                    <button
                        type="submit"
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-slate-100 text-slate-600 transition-all hover:bg-red-100 hover:text-red-600"
                        title="Logout">
                        <i class="fa-solid fa-right-from-bracket text-lg"></i>
                    </button>
                </form>

            </div>
        @endisset

    </header>

    {{-- ===============================================
        FLASH MESSAGES
    ================================================= --}}
    <div class="px-5 pt-4 space-y-3 animate-fadeIn">

        @if(session('success'))
            <div class="flex items-start gap-3 rounded-lg border border-teal-200 bg-teal-50 px-4 py-3 shadow-sm">
                <i class="fa-solid fa-circle-check flex-shrink-0 mt-0.5 text-teal-600 text-lg"></i>
                <div class="flex-1">
                    <p class="font-semibold text-sm text-teal-900">
                        Success
                    </p>
                    <p class="text-sm text-teal-800 mt-1">
                        {{ session('success') }}
                    </p>
                </div>
                <button @click="$el.closest('div').remove()" class="text-teal-600 hover:text-teal-700 flex-shrink-0">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="flex items-start gap-3 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 shadow-sm">
                <i class="fa-solid fa-circle-exclamation flex-shrink-0 mt-0.5 text-rose-600 text-lg"></i>
                <div class="flex-1">
                    <p class="font-semibold text-sm text-rose-900">
                        Error
                    </p>
                    <p class="text-sm text-rose-800 mt-1">
                        {{ session('error') }}
                    </p>
                </div>
                <button @click="$el.closest('div').remove()" class="text-rose-600 hover:text-rose-700 flex-shrink-0">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

    </div>

    {{-- ===============================================
        MAIN CONTENT
    ================================================= --}}
    <main class="flex-1 overflow-y-auto pb-8">

        @yield('content')

    </main>

    {{-- ===============================================
        FLOATING ACTION BUTTON (Optional - for quick actions)
    ================================================= --}}
    <div class="fixed bottom-8 right-5 z-40">
        <button
            @click="showHelpMenu = !showHelpMenu"
            class="flex h-14 w-14 items-center justify-center rounded-full bg-gradient-to-br from-navy-600 to-teal-600 text-white shadow-lg transition-all hover:shadow-xl hover:scale-110"
            title="Help & Support">
            <i class="fa-solid fa-question text-lg"></i>
        </button>

        {{-- Help Menu --}}
        <div
            x-show="showHelpMenu"
            x-transition
            class="absolute bottom-20 right-0 bg-white rounded-lg shadow-lg border border-slate-200 py-2 w-48">
            <a href="#" class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-50 transition-colors text-sm">
                <i class="fa-solid fa-headset text-navy-600 w-4"></i>
                <span>Contact Support</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-50 transition-colors text-sm border-t border-slate-100">
                <i class="fa-solid fa-book text-navy-600 w-4"></i>
                <span>Documentation</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-50 transition-colors text-sm border-t border-slate-100">
                <i class="fa-solid fa-question-circle text-navy-600 w-4"></i>
                <span>FAQ</span>
            </a>
        </div>
    </div>

</div>

</body>

</html>
