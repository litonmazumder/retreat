<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="google" content="notranslate">
    <meta http-equiv="Content-Language"
          content="{{ app()->getLocale() === 'bn' ? 'bn-BD' : 'en' }}">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="theme-color"
          content="#00477A">

    <meta name="description"
          content="Asia Seminar 2026 Participant Portal">

    <title>@yield('title', 'Asia Seminar 2026')</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Alpine --}}
    <script defer
            src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>

        body{
            background:#eef4f8;
            font-family:Inter,system-ui,sans-serif;
        }

        .app-shadow{
            box-shadow:
                0 20px 45px rgba(15,23,42,.08),
                0 5px 15px rgba(15,23,42,.05);
        }

        .glass{
            backdrop-filter:blur(12px);
            background:rgba(255,255,255,.15);
        }

    </style>

    <style>
    [x-cloak] {
        display: none !important;
        }
    </style>

</head>

<body class="bg-[#eef4f8]">

<div class="mx-auto max-w-7xl px-4 py-6 lg:px-6">

    <div class="lg:flex lg:justify-center">

        <div
            class="min-h-screen w-full bg-white app-shadow
                   lg:max-w-3xl lg:rounded-3xl lg:overflow-hidden">


    {{-- =========================
        APP HEADER
    ========================== --}}
    <header
        class="sticky top-0 z-50 overflow-hidden bg-gradient-to-br from-[#00477A] via-[#005A95] to-[#006BB3] text-white shadow">

        {{-- Decorative --}}
        <div class="absolute right-[-30px] top-[-30px] h-36 w-36 rounded-full bg-white/10"></div>
        <div class="absolute left-[-50px] bottom-[-50px] h-44 w-44 rounded-full bg-white/5"></div>

        <div class="relative px-6 pt-8 pb-6 lg:px-8 lg:pt-10 lg:pb-8">

            <div class="flex items-start justify-between">

                <div class="flex items-center gap-4">

                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white shadow-xl lg:h-20 lg:w-20">
                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="Asia Seminar"
                            class="h-12 w-12 object-contain lg:h-14 lg:w-14">
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-[3px] text-blue-100">
                            Participant Portal
                        </p>

                        <h1 class="mt-1 text-xl font-bold lg:text-2xl">
                            Asia Seminar 2026
                        </h1>
                    </div>

                </div>

            </div>

            @isset($participant)

            <div class="mt-6 flex items-center justify-between">

                <div>

                    <p class="text-xs uppercase tracking-widest text-blue-100">
                        Welcome
                    </p>

                    <h2 class="mt-1 text-lg font-semibold lg:text-xl">
                        {{ $participant->first_name }} {{ $participant->last_name }}
                    </h2>

                    <p class="mt-1 text-sm text-blue-100">
                        <i class="fa-solid fa-location-dot mr-1"></i>
                        {{ $participant->country }}
                    </p>

                </div>

                <div class="flex items-center gap-3">

                    @if($participant->profile_confirmed)
                    <span
                        class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                        <i class="fa-solid fa-circle-check mr-1"></i>

                        Verified

                    </span>
                    @endif

                    <form
                        action="{{ route('participant.logout') }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-slate-600 shadow transition hover:bg-red-500 hover:text-white">

                            <i class="fa-solid fa-arrow-right-from-bracket"></i>

                        </button>

                    </form>

                </div>

            </div>

            @endisset

        </div>

    </header>

    {{-- Flash Messages --}}
    <div class="px-5 pt-5 lg:px-8">

        @if(session('success'))

        <div class="mb-4 rounded-2xl border border-green-200 bg-green-50 p-4">

            <div class="flex gap-3">

                <i class="fa-solid fa-circle-check mt-1 text-green-600"></i>

                <div>

                    <h4 class="font-semibold text-green-700">
                        Success
                    </h4>

                    <p class="mt-1 text-sm text-green-700">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        </div>

        @endif

        @if(session('error'))

        <div class="mb-4 rounded-2xl border border-red-200 bg-red-50 p-4">

            <div class="flex gap-3">

                <i class="fa-solid fa-circle-xmark mt-1 text-red-600"></i>

                <div>

                    <h4 class="font-semibold text-red-700">
                        Error
                    </h4>

                    <p class="mt-1 text-sm text-red-700">
                        {{ session('error') }}
                    </p>

                </div>

            </div>

        </div>

        @endif

    </div>

    {{-- =========================
        PAGE CONTENT
    ========================== --}}
    <main class="px-5 pb-28 lg:px-8 lg:pb-10">

        @yield('content')

    </main>

        </div>

    </div>

</div>

</body>

</html>