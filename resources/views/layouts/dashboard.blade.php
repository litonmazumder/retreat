<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#00477A">
    <meta name="description" content="Retreat 2026 Participant Portal">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Retreat 2026">
    <meta name="mobile-web-app-capable" content="yes">

    <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
    <link rel="apple-touch-icon" href="{{ asset('icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('icons/icon-192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('icons/icon-512.png') }}">

    <title>@yield('title', 'Swisscontact Retreat 2026')</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])
</head>

<body>
<div class="mx-auto flex min-h-screen max-w-md flex-col bg-white app-shadow">

    {{-- ========================= APP HEADER ========================= --}}
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

        <div class="relative flex items-start justify-between gap-3 px-4 py-5">

            {{-- Participant information --}}
            <div class="min-w-0 flex-1 ml-4 text-center">
                <div class="flex items-center justify-center gap-2">
                    <h1 class="text-xl font-bold leading-tight text-[#1F2937]">
                        {{ $participant->first_name }} {{ $participant->last_name }}
                    </h1>

                    <span
                        class="inline-block text-2xl motion-safe:animate-bounce"
                        role="img"
                        aria-label="{{ $mood['message'] }}"
                        title="{{ $mood['message'] }}">
                        {{ $mood['emoji'] }}
                    </span>
                </div>

                <p class="mt-1 text-sm leading-5 text-slate-600">
                    {{ $participant->designation }}
                </p>

                <span class="mt-3 inline-flex items-center rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-700 ring-1 ring-slate-200">
                    {{ $participant->project_name }}
                </span>

                <p class="mt-2 text-sm text-slate-500">
                    {{ $mood['message'] }}
                </p>
            </div>

            {{-- Header actions dropdown --}}
            <div class="relative shrink-0">
                <button
                    type="button"
                    id="header-menu-toggle"
                    aria-label="Open account menu"
                    aria-expanded="false"
                    aria-controls="header-action-menu"
                    class="flex h-11 w-11 items-center justify-center rounded-full border border-white/80 bg-white/90 text-slate-700 shadow-sm active:scale-95"
                    style="touch-action:manipulation;">

                    <i id="header-menu-arrow" class="fa-solid fa-chevron-down text-sm" aria-hidden="true"></i>
                </button>

                {{-- Exactly one dropdown; hidden attribute controls visibility --}}
                <div
                    id="header-action-menu"
                    hidden
                    class="absolute right-0 top-14 z-[100] w-64 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">

                    {{-- Notifications --}}
                    <div class="flex min-h-[68px] items-center justify-between gap-3 px-4 py-3">
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#00477A]">
                                <i class="fa-solid fa-bell" aria-hidden="true"></i>
                            </div>

                            <div class="min-w-0">
                                <p class="text-sm font-semibold leading-5 text-slate-800">
                                    Notifications
                                </p>
                                <p id="notification-status" class="text-xs leading-4 text-slate-500">
                                    Checking...
                                </p>
                            </div>
                        </div>

                        <button
                            type="button"
                            id="notification-toggle"
                            role="switch"
                            aria-checked="false"
                            aria-label="Enable notifications"
                            disabled
                            class="relative ml-1 flex h-7 w-12 shrink-0 items-center rounded-full bg-slate-300 transition-colors disabled:cursor-not-allowed disabled:opacity-60"
                            style="touch-action:manipulation;">

                            <span
                                id="notification-toggle-circle"
                                class="absolute left-1 top-1 h-5 w-5 rounded-full bg-white shadow-sm transition-transform">
                            </span>
                        </button>
                    </div>

                    <div class="border-t border-slate-100"></div>

                    {{-- Logout --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="flex min-h-[52px] w-full items-center gap-3 px-4 text-left text-sm font-semibold text-red-600 transition-colors hover:bg-red-50 active:bg-red-100"
                            style="touch-action:manipulation;">

                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-50">
                                <i class="fa-solid fa-arrow-right-from-bracket" aria-hidden="true"></i>
                            </span>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    {{-- ========================= RECHARGE YOURSELF BATTERY ========================= --}}
    <!-- @php
        $rechargePercentage = max(0, min(100, (int) ($rechargePercentage ?? 0)));
    @endphp

    <section
        aria-label="Recharge Yourself progress"
        class="border-t border-white/60 bg-white/85 px-5 py-3 backdrop-blur-sm">

        <div class="flex items-center justify-between gap-3">

            <div class="flex min-w-0 items-center gap-3">

                {{-- Battery icon --}}
                <div class="relative flex h-7 w-12 shrink-0 items-center rounded-md border-2 border-slate-600 p-[2px]"
                     role="progressbar"
                     aria-label="Recharge Yourself battery"
                     aria-valuemin="0"
                     aria-valuemax="100"
                     aria-valuenow="{{ $rechargePercentage }}">

                    <span class="absolute -right-[5px] top-[7px] h-2 w-[3px] rounded-r-sm bg-slate-600"></span>

                    <span
                        class="h-full rounded-[2px] transition-all duration-500"
                        style="
                            width: {{ $rechargePercentage }}%;
                            background-color: {{ $rechargePercentage >= 70 ? '#16A34A' : ($rechargePercentage >= 30 ? '#D97706' : '#DC2626') }};
                        ">
                    </span>
                </div>

                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-x-2 gap-y-0.5">
                        <h2 class="text-sm font-bold leading-5 text-slate-800">
                            Recharge Yourself
                        </h2>

                        <span
                            class="text-sm font-extrabold tabular-nums"
                            style="color: {{ $rechargePercentage >= 70 ? '#15803D' : ($rechargePercentage >= 30 ? '#B45309' : '#B91C1C') }};">
                            
                            {{ $rechargePercentage }}%
                        </span>
                    </div>

                    <p class="text-[11px] leading-4 text-slate-500">
                        Your session acknowledgement progress
                    </p>
                </div>

            </div>

            <span class="shrink-0 rounded-full px-2.5 py-1 text-[10px] font-semibold"
                  style="
                    background-color: {{ $rechargePercentage >= 70 ? '#DCFCE7' : ($rechargePercentage >= 30 ? '#FEF3C7' : '#FEE2E2') }};
                    color: {{ $rechargePercentage >= 70 ? '#166534' : ($rechargePercentage >= 30 ? '#92400E' : '#991B1B') }};
                  ">
                @if ($rechargePercentage >= 100)
                    Fully recharged!
                @elseif ($rechargePercentage >= 70)
                    Almost there
                @elseif ($rechargePercentage >= 30)
                    Keep going
                @else
                    Get recharged
                @endif
            </span>

        </div>
    </section> -->

    </header>

    {{-- ========================= PAGE CONTENT ========================= --}}
    <main class="flex-1 pb-24">
        @yield('content')
    </main>
</div>

{{-- ========================= PWA INSTALL MODAL ========================= --}}
<div
    id="install-modal"
    class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/50 p-5">

    <div class="w-full max-w-sm rounded-3xl bg-white p-6 shadow-2xl">
        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#00477A]/10">
            <i class="fa-solid fa-mobile-screen-button text-3xl text-[#00477A]"></i>
        </div>

        <h2 class="mt-6 text-center text-2xl font-bold text-slate-800">
            Install Swisscontact Annual Retreat 2026
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

{{-- Keep header-height measurement for pages that use --header-height --}}
<script>
    (() => {
        const header = document.getElementById('app-header');
        if (!header) return;

        const updateHeaderHeight = () => {
            document.documentElement.style.setProperty(
                '--header-height',
                `${header.getBoundingClientRect().height}px`
            );
        };

        updateHeaderHeight();
        window.addEventListener('resize', updateHeaderHeight);

        if ('ResizeObserver' in window) {
            new ResizeObserver(updateHeaderHeight).observe(header);
        }
    })();
</script>

{{-- Service worker registration --}}
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

{{-- Header dropdown and existing retreat push helper integration --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.getElementById('header-menu-toggle');
        const menu = document.getElementById('header-action-menu');
        const arrow = document.getElementById('header-menu-arrow');

        const notificationToggle = document.getElementById('notification-toggle');
        const notificationCircle = document.getElementById('notification-toggle-circle');
        const notificationStatus = document.getElementById('notification-status');

        if (!menuToggle || !menu || !arrow) return;

        const openMenu = () => {
            menu.hidden = false;
            menuToggle.setAttribute('aria-expanded', 'true');
            menuToggle.setAttribute('aria-label', 'Close account menu');
            arrow.classList.replace('fa-chevron-down', 'fa-chevron-up');
        };

        const closeMenu = () => {
            menu.hidden = true;
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.setAttribute('aria-label', 'Open account menu');
            arrow.classList.replace('fa-chevron-up', 'fa-chevron-down');
        };

        menuToggle.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();
            menu.hidden ? openMenu() : closeMenu();
        });

        document.addEventListener('click', (event) => {
            if (!menu.hidden && !menu.contains(event.target) && !menuToggle.contains(event.target)) {
                closeMenu();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !menu.hidden) {
                closeMenu();
                menuToggle.focus();
            }
        });

        // Notification controls use the existing window.retreatPush helper.
        const setNotificationState = (enabled, message = null) => {
            if (!notificationToggle || !notificationCircle || !notificationStatus) return;

            notificationToggle.disabled = false;
            notificationToggle.setAttribute('aria-checked', enabled ? 'true' : 'false');
            notificationToggle.setAttribute(
                'aria-label',
                enabled ? 'Disable notifications' : 'Enable notifications'
            );

            notificationToggle.style.backgroundColor = enabled ? '#16A34A' : '#CBD5E1';
            notificationCircle.style.transform = enabled ? 'translateX(20px)' : 'translateX(0)';
            notificationStatus.textContent = message || (enabled ? 'Enabled' : 'Disabled');
            notificationStatus.style.color = enabled ? '#15803D' : '#64748B';
        };

        const checkNotificationState = async () => {
            if (!notificationToggle) return;

            if (!('Notification' in window) || !('serviceWorker' in navigator) || !('PushManager' in window)) {
                setNotificationState(false, 'Not supported');
                notificationToggle.disabled = true;
                return;
            }

            if (Notification.permission === 'denied') {
                setNotificationState(false, 'Blocked in browser');
                return;
            }

            try {
                const registration = await navigator.serviceWorker.ready;
                const subscription = await registration.pushManager.getSubscription();

                setNotificationState(
                    Notification.permission === 'granted' && !!subscription,
                    Notification.permission === 'granted' && subscription ? 'Enabled' : 'Disabled'
                );
            } catch (error) {
                console.error('Unable to check push subscription:', error);
                setNotificationState(false, 'Unavailable');
            }
        };

        if (notificationToggle) {
            notificationToggle.addEventListener('click', async () => {
                const currentlyEnabled = notificationToggle.getAttribute('aria-checked') === 'true';
                const push = window.retreatPush;

                if (!push || typeof push.enablePush !== 'function' || typeof push.disablePush !== 'function') {
                    setNotificationState(currentlyEnabled, 'Push service unavailable');
                    console.error('window.retreatPush.enablePush/disablePush is not available.');
                    return;
                }

                notificationToggle.disabled = true;
                notificationStatus.textContent = currentlyEnabled ? 'Disabling...' : 'Enabling...';

                try {
                    if (currentlyEnabled) {
                        await push.disablePush();
                    } else {
                        if (!('Notification' in window)) {
                            throw new Error('Notifications are not supported by this browser.');
                        }

                        if (Notification.permission !== 'granted') {
                            const permission = await Notification.requestPermission();
                            if (permission !== 'granted') {
                                throw new Error('Notification permission was not granted.');
                            }
                        }

                        await push.enablePush();
                    }

                    await checkNotificationState();
                } catch (error) {
                    console.error('Notification setting update failed:', error);
                    await checkNotificationState();
                    notificationStatus.textContent = 'Could not update';
                } finally {
                    notificationToggle.disabled = false;
                }
            });

            checkNotificationState();
        }
    });
</script>

<script>
    window.retreatPushConfig = {
        publicKey: @json(config('services.webpush.public_key')),
        subscribeUrl: @json(route('push-subscriptions.store')),
        unsubscribeUrl: @json(route('push-subscriptions.destroy')),
    };
</script>

<script src="{{ asset('js/retreat-push.js') }}"></script>

<script src="{{ asset('js/retreat-schedule.js') }}?v=6" defer></script>

</body>
</html>
