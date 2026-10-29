<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1">

<meta
    name="theme-color"
    content="#00477A">

<meta
    name="description"
    content="Retreat 2026 Participant Portal">

<meta
    name="apple-mobile-web-app-capable"
    content="yes">

<meta
    name="apple-mobile-web-app-status-bar-style"
    content="default">

<meta
    name="apple-mobile-web-app-title"
    content="Asia Seminar">

<meta
    name="mobile-web-app-capable"
    content="yes">

<link
    rel="manifest"
    href="{{ asset('manifest.webmanifest') }}">

<link
    rel="apple-touch-icon"
    href="{{ asset('icons/apple-touch-icon.png') }}">

<link
    rel="icon"
    type="image/png"
    sizes="192x192"
    href="{{ asset('icons/icon-192.png') }}">

<link
    rel="icon"
    type="image/png"
    sizes="512x512"
    href="{{ asset('icons/icon-512.png') }}">

<title>@yield('title', 'Swisscontact Retreat 2026')</title>

@vite([
    'resources/css/app.css',
    'resources/js/app.js',
])

<body>

<div class="mx-auto flex min-h-screen max-w-md flex-col bg-white app-shadow">

    {{-- =========================
        APP HEADER
    ========================== --}}

<header
    id="app-header"
    class="sticky top-0 z-50"
    style="
        background-color:#F2EDE8;
        background-image:url('{{ asset('images/bg/annual_retreat2026.webp') }}');
        background-repeat:no-repeat;
        background-size:cover;
        background-position:center;
    ">

    <div class="flex items-center justify-between px-20 py-12">

        <div class="flex items-center gap-5">

            {{-- Branding --}}
            <!-- <div class="shrink-0">

                <img
                    src="{{ asset('images/logo/annual_retreat_mnemonic.webp') }}"
                    alt="Annual Retreat 2026 Logo"
                    class="h-16 w-auto">

            </div> -->

            {{-- Participant --}}
            <!-- <div>

                <h1 class="text-xl font-bold leading-tight text-[#1F2937]">
                    {{ $participant->first_name }} {{ $participant->last_name }}
                </h1>

                <p class="mt-1 text-sm leading-5 text-slate-600">
                    {{ $participant->designation }}
                </p>

                <span
                    class="mt-3 inline-flex items-center rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-700 ring-1 ring-slate-200">
                    {{ $participant->project_name }}
                </span>

            </div> -->

            
            <div>
                <div class="flex items-center gap-2">
                    <h1 class="text-xl font-bold leading-tight text-[#1F2937]">
                        {{ $participant->first_name }} {{ $participant->last_name }}
                    </h1>

                    <span
                        class="inline-block text-2xl motion-safe:animate-bounce"
                        role="img"
                        aria-label="{{ $mood['message'] }}"
                        title="{{ $mood['message'] }}"
                    >
                        {{ $mood['emoji'] }}
                    </span>
                </div>

                <p class="mt-1 text-sm leading-5 text-slate-600">
                    {{ $participant->designation }}
                </p>

                <span
                    class="mt-3 inline-flex items-center rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-700 ring-1 ring-slate-200"
                >
                    {{ $participant->project_name }}
                </span>

                <p class="mt-2 text-sm text-slate-500">
                    {{ $mood['message'] }}
                </p>
            </div>


        </div>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button
                type="submit"
                title="Logout"
                class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-600 transition hover:border-red-500 hover:bg-red-500 hover:text-white">

                <i class="fa-solid fa-arrow-right-from-bracket"></i>

            </button>

        </form>

    </div>

</header>

    {{-- =========================
        PAGE CONTENT
    ========================== --}}

    <main class="flex-1 pb-24">
        @yield('content')
    </main>

</div>

<div
    id="install-modal"
    class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/50 p-5">

    <div class="w-full max-w-sm rounded-3xl bg-white p-6 shadow-2xl">

        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#00477A]/10">

            <i class="fa-solid fa-mobile-screen-button text-3xl text-[#00477A]"></i>

        </div>

        <h2 class="mt-6 text-center text-2xl font-bold text-slate-800">
            Install Asia Seminar
        </h2>

        <div class="mt-8 space-y-3">

            <button
                id="install-app"
                onclick="installPWA()"
                class="hidden w-full rounded-xl bg-[#00477A] py-3 font-semibold text-white">

                Install

            </button>

            <button
                onclick="dismissPWA()"
                class="w-full rounded-xl border border-slate-300 py-3 font-medium text-slate-700">

                Not Now

            </button>

        </div>

    </div>

</div>

<script>

    (() => {
        const updateHeaderHeight = () => {
            const header = document.getElementById('app-header');

            if (!header) return;

            document.documentElement.style.setProperty(
                '--header-height',
                `${header.getBoundingClientRect().height}px`
            );
        };

        updateHeaderHeight();

        window.addEventListener('resize', updateHeaderHeight);

        if ('ResizeObserver' in window) {
            const header = document.getElementById('app-header');

            if (header) {
                new ResizeObserver(updateHeaderHeight).observe(header);
            }
        }
    })();

</script>

<script>
    if ('serviceWorker' in navigator) {

        window.addEventListener('load', async () => {

            try {

                const registration = await navigator.serviceWorker.register('/sw.js');

                console.log('Service Worker registered:', registration.scope);

            } catch (error) {

                console.error('Service Worker registration failed:', error);

            }

        });

    }
</script>

<script src="{{ asset('js/retreat-schedule.js') }}?v=6" defer></script>

</body>

</html>