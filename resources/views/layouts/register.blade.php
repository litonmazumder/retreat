<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Annual Retreat 2026')</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="min-h-screen bg-slate-100">

<div class="mx-auto flex min-h-screen max-w-md flex-col bg-slate-100 shadow-xl">

    <!-- App Header -->

    <!-- <header
    class="relative h-56 overflow-hidden bg-cover bg-center"
    style="background-image: url('{{ asset('images/11th-Asia-Seminar-KV.png') }}');">

    <div class="absolute inset-0 bg-gradient-to-t from-[#00477A]/70 via-transparent to-transparent"></div>

    <div class="absolute bottom-6 left-0 right-0 text-center text-white">
        <h1 class="text-3xl font-bold">Asia Seminar 2026</h1>
        <p class="text-blue-100">Event Companion</p>
    </div>

</header> -->

<!-- <header
    class="relative overflow-hidden bg-[#00477A] bg-cover bg-center px-6 pt-10 pb-8 text-white"
    style="background-image: url('{{ asset('images/bg/11th-Asia-Seminar-KV.webp') }}');">

    {{-- Dark Overlay --}}
    <div class="absolute inset-0 bg-[#00477A]/75"></div>

    {{-- Content --}}
    <div class="relative z-10">

        <div class="flex items-center justify-center">

            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/10 backdrop-blur-sm">

                <span class="text-3xl">
                    🌏
                </span>

            </div>

        </div>

        <h1 class="mt-5 text-center text-3xl font-bold">
            Asia Seminar 2026
        </h1>

        <p class="mt-2 text-center text-blue-100">
            Event Companion
        </p>

    </div>

</header> -->

    <header
        class="h-60 bg-cover bg-center bg-no-repeat h-60 rounded-b-3xl bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/bg/annual-retreat-login-2026.webp') }}');">
    </header>

    <!-- <header class="bg-[#00477A] px-6 pt-10 pb-8 text-white">

        <div class="flex items-center justify-center">

            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/10">

                <span class="text-3xl">

                    🌏

                </span>

            </div>

        </div>

        <h1 class="mt-5 text-center text-3xl font-bold">

            Asia Seminar 2026

        </h1>

        <p class="mt-2 text-center text-blue-100">

            Event Companion

        </p>

    </header> -->

    <!-- Page -->

    <main class="-mt-12 flex-1 px-6 pb-8 relative z-10">

        @yield('content')

    </main>

    <!-- Footer -->

    <footer class="border-t bg-slate-50 px-6 py-4">

        <p class="text-center text-xs text-slate-500">

            Design & Developed by SC Bangladesh ICT Team

        </p>

    </footer>

</div>

@stack('scripts')

</body>

</html>