
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="theme-color" content="#00477A">
    <meta name="description" content="Swisscontact Retreat 2026 Participant Portal">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Retreat 2026">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
    <link rel="apple-touch-icon" href="{{ asset('icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
          href="{{ asset('icons/icon-192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512"
          href="{{ asset('icons/icon-512.png') }}">

    <title>@yield('title', 'Swisscontact Retreat 2026')</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])
</head>

<body class="bg-slate-100">

@php
    // Safe defaults for pages that do not provide mood or battery data yet.
    $moodEmoji = data_get($mood ?? [], 'emoji', '😊');
    $moodMessage = data_get($mood ?? [], 'message', 'Your retreat adventure awaits!');
    $batteryPercentage = max(0, min(100, (int) ($batteryPercentage ?? 0)));

    $batteryColor = match (true) {
        $batteryPercentage <= 20 => 'text-red-600',
        $batteryPercentage <= 50 => 'text-amber-600',
        default => 'text-emerald-600',
    };

    $batteryIcon = match (true) {
        $batteryPercentage <= 10 => 'fa-battery-empty',
        $batteryPercentage <= 35 => 'fa-battery-quarter',
        $batteryPercentage <= 60 => 'fa-battery-half',
        $batteryPercentage <= 85 => 'fa-battery-three-quarters',
        default => 'fa-battery-full',
    };
@endphp

<div class="app-shadow mx-auto flex min-h-screen max-w-md flex-col bg-white">

    {{-- Participant header --}}
    <header
        id="app-header"
        class="sticky top-0 z-50 border-b border-white/50"
        style="
            background-color: #F2EDE8;
            background-image: url('{{ asset('images/bg/annual_retreat2026.webp') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        "
    >
        <div class="flex items-center justify-between gap-3 px-4 py-4 sm:px-5">

            {{-- Participant information --}}
            <div class="min-w-0 flex-1">
                <div class="flex items-center gap-2">
                    <h1 class="truncate text-base font-bold leading-tight text-[#1F2937] sm:text-lg">
                        {{ $participant->first_name }} {{ $participant->last_name }}
                    </h1>

                    <span
                        class="shrink-0 text-xl motion-safe:animate-bounce"
                        role="img"
                        aria-label="{{ $moodMessage }}"
                        title="{{ $moodMessage }}"
                    >
                        {{ $moodEmoji }}
                    </span>
                </div>

                <p class="mt-1 truncate text-xs leading-5 text-slate-600 sm:text-sm">
                    {{ $participant->designation }}
                </p>

                <p class="mt-1 truncate text-xs font-medium text-slate-700">
                    {{ $participant->project_name }}
                </p>

                <p class="mt-1 line-clamp-2 text-xs text-slate-500">
                    {{ $moodMessage }}
                </p>
            </div>

            {{-- Header actions --}}
            <div class="flex shrink-0 items-center gap-2">

                {{-- Recharge battery --}}
                <button
                    id="recharge-battery-button"
                    type="button"
                    aria-label="View your retreat recharge progress"
                    title="Your retreat battery"
                    class="flex min-w-[56px] flex-col items-center justify-center rounded-xl border border-white/80 bg-white/90 px-2 py-2 shadow-sm transition hover:bg-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#00477A]"
                >
                    <span class="flex items-center gap-1">
                        <i
                            id="recharge-battery-icon"
                            class="fa-solid {{ $batteryIcon }} {{ $batteryColor }} text-xl"
                        ></i>
                    </span>

                    <span
                        id="recharge-battery-percentage"
                        class="mt-1 text-xs font-bold text-slate-800"
                    >
                        {{ $batteryPercentage }}%
                    </span>
                </button>

                {{-- Notification bell --}}
                <button
                    id="retreat-notification-button"
                    type="button"
                    aria-label="Enable retreat notifications"
                    aria-pressed="false"
                    title="Enable retreat notifications"
                    class="relative flex h-11 w-11 items-center justify-center rounded-xl border border-white/80 bg-white/90 text-slate-600 shadow-sm transition hover:bg-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#00477A]"
                >
                    <i id="retreat-notification-icon"
                       class="fa-regular fa-bell text-lg"></i>

                    <span
                        id="retreat-notification-indicator"
                        class="absolute right-2 top-2 h-2 w-2 rounded-full bg-slate-400"
                    ></span>
                </button>

                {{-- Logout --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button
                        type="submit"
                        aria-label="Logout"
                        title="Logout"
                        class="flex h-11 w-11 items-center justify-center rounded-xl border border-white/80 bg-white/90 text-slate-600 shadow-sm transition hover:border-red-500 hover:bg-red-500 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-500"
                    >
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    {{-- Notification information panel --}}
    <div
        id="retreat-notification-panel"
        class="hidden border-b border-slate-200 bg-blue-50 px-4 py-3"
    >
        <div class="flex items-start gap-3">
            <i class="fa-solid fa-bell mt-1 text-[#00477A]"></i>

            <div class="min-w-0 flex-1">
                <p id="retreat-notification-panel-title"
                   class="text-sm font-semibold text-slate-800">
                    Stay connected to your retreat
                </p>

                <p id="retreat-notification-panel-message"
                   class="mt-1 text-xs leading-5 text-slate-600">
                    Enable notifications to receive session reminders and recharge challenges.
                </p>

                <button
                    id="retreat-notification-enable"
                    type="button"
                    class="mt-3 rounded-lg bg-[#00477A] px-4 py-2 text-xs font-semibold text-white hover:bg-[#00365D]"
                >
                    Enable notifications
                </button>
            </div>

            <button
                id="retreat-notification-panel-close"
                type="button"
                aria-label="Close notification information"
                class="p-1 text-slate-500 hover:text-slate-800"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>

    {{-- Battery details panel --}}
    <div
        id="recharge-battery-panel"
        class="hidden border-b border-slate-200 bg-emerald-50 px-4 py-3"
    >
        <div class="flex items-center justify-between gap-3">
            <div>
                <p class="text-sm font-bold text-slate-800">
                    Recharge Yourself 🔋
                </p>

                <p id="recharge-battery-message"
                   class="mt-1 text-xs text-slate-600">
                    Every recharge opportunity counts. Keep going!
                </p>
            </div>

            <span id="recharge-battery-panel-percentage"
                  class="text-xl font-extrabold text-emerald-700">
                {{ $batteryPercentage }}%
            </span>
        </div>

        <div class="mt-3 h-2 overflow-hidden rounded-full bg-white">
            <div
                id="recharge-battery-progress"
                class="h-full rounded-full bg-emerald-500 transition-all duration-300"
                style="width: {{ $batteryPercentage }}%"
            ></div>
        </div>

        <a
            href="{{ route('dashboard') }}"
            class="mt-3 inline-flex items-center gap-2 text-xs font-semibold text-[#00477A]"
        >
            View retreat schedule
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

    {{-- Page content --}}
    <main class="min-w-0 flex-1 pb-24">
        @yield('content')
    </main>

</div>

{{-- PWA installation modal --}}
<div
    id="install-modal"
    class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/50 p-5"
>
    <div class="w-full max-w-sm rounded-3xl bg-white p-6 shadow-2xl">

        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#00477A]/10">
            <i class="fa-solid fa-mobile-screen-button text-3xl text-[#00477A]"></i>
        </div>

        <h2 class="mt-6 text-center text-2xl font-bold text-slate-800">
            Install Retreat 2026
        </h2>

        <p class="mt-2 text-center text-sm text-slate-600">
            Keep your retreat schedule and activities within easy reach.
        </p>

        <div class="mt-8 space-y-3">
            <button
                id="install-app"
                onclick="installPWA()"
                class="hidden w-full rounded-xl bg-[#00477A] py-3 font-semibold text-white"
            >
                Install app
            </button>

            <button
                onclick="dismissPWA()"
                class="w-full rounded-xl border border-slate-300 py-3 font-medium text-slate-700"
            >
                Not now
            </button>
        </div>
    </div>
</div>

<script>
    
(() => {
    const bell = document.getElementById('retreat-notification-button');
    const bellIcon = document.getElementById('retreat-notification-icon');
    const indicator = document.getElementById('retreat-notification-indicator');
    const panel = document.getElementById('retreat-notification-panel');
    const enableButton = document.getElementById('retreat-notification-enable');
    const closeButton = document.getElementById('retreat-notification-panel-close');
    const panelTitle = document.getElementById('retreat-notification-panel-title');
    const panelMessage = document.getElementById('retreat-notification-panel-message');

    if (!bell || !panel || !enableButton || !closeButton) return;

    function showPanel(title, message, showButton = false) {
        panelTitle.textContent = title;
        panelMessage.textContent = message;
        enableButton.classList.toggle('hidden', !showButton);
        panel.classList.remove('hidden');
    }

    function updateUI(enabled = false) {
        if (!('Notification' in window)) {
            bellIcon.className = 'fa-solid fa-bell-slash text-lg text-red-600';
            indicator.className = 'absolute right-2 top-2 h-2 w-2 rounded-full bg-red-500';
            bell.title = 'Notifications are not supported';
            bell.setAttribute('aria-pressed', 'false');
            return;
        }

        if (enabled) {
            bellIcon.className = 'fa-solid fa-bell text-lg text-emerald-600';
            indicator.className = 'absolute right-2 top-2 h-2 w-2 rounded-full bg-emerald-500';
            bell.title = 'Retreat push notifications enabled';
            bell.setAttribute('aria-pressed', 'true');
        } else {
            bellIcon.className = 'fa-regular fa-bell text-lg';
            indicator.className = 'absolute right-2 top-2 h-2 w-2 rounded-full bg-slate-400';
            bell.title = 'Enable retreat notifications';
            bell.setAttribute('aria-pressed', 'false');
        }
    }

    async function checkSubscription() {
        try {
            if (!('serviceWorker' in navigator) || !('PushManager' in window)) {
                updateUI(false);
                return;
            }

            const registration = await navigator.serviceWorker.ready;
            const subscription = await registration.pushManager.getSubscription();

            updateUI(
                Notification.permission === 'granted' && !!subscription
            );
        } catch (error) {
            console.error('Could not check push subscription:', error);
            updateUI(false);
        }
    }

    async function enableNotifications() {
        if (!window.retreatPush) {
            showPanel(
                'Push setup unavailable',
                'The push subscription script has not loaded. Refresh the page and try again.',
                true
            );
            return;
        }

        if (!window.isSecureContext) {
            showPanel(
                'Secure connection required',
                'Push notifications require HTTPS, except on localhost during development.'
            );
            return;
        }

        try {
            enableButton.disabled = true;
            enableButton.textContent = 'Enabling...';

            await window.retreatPush.enablePush();

            updateUI(true);

            showPanel(
                'Notifications enabled',
                'Your browser subscription has been saved. You can now receive retreat push notifications when the server sends them.'
            );
        } catch (error) {
            console.error('Could not enable push notifications:', error);

            showPanel(
                'Could not enable notifications',
                error.message || 'Check browser permissions and try again.',
                true
            );
        } finally {
            enableButton.disabled = false;
            enableButton.textContent = 'Enable notifications';
        }
    }

    bell.addEventListener('click', async () => {
        if (!panel.classList.contains('hidden')) {
            panel.classList.add('hidden');
            return;
        }

        await checkSubscription();

        if (Notification.permission === 'denied') {
            showPanel(
                'Notifications are blocked',
                'Enable notifications in your browser settings, then return here.'
            );
        } else {
            showPanel(
                'Stay connected to your retreat',
                'Enable push notifications to receive session reminders and recharge challenges.',
                true
            );
        }
    });

    enableButton.addEventListener('click', enableNotifications);
    closeButton.addEventListener('click', () => panel.classList.add('hidden'));

    checkSubscription();
})();

</script>

<script>
    window.retreatPushConfig = {
        publicKey: @json(config('services.webpush.public_key')),
        subscribeUrl: @json(route('push-subscriptions.store')),
        unsubscribeUrl: @json(route('push-subscriptions.destroy')),
    };
</script>

<script>
    (() => {
        const bell = document.getElementById('retreat-notification-button');
        const bellIcon = document.getElementById('retreat-notification-icon');
        const indicator = document.getElementById('retreat-notification-indicator');
        const panel = document.getElementById('retreat-notification-panel');
        const enableButton = document.getElementById('retreat-notification-enable');
        const closeButton = document.getElementById('retreat-notification-panel-close');
        const panelTitle = document.getElementById('retreat-notification-panel-title');
        const panelMessage = document.getElementById('retreat-notification-panel-message');

        if (!bell || !panel) return;

        function setPanel(title, message, showEnableButton) {
            panelTitle.textContent = title;
            panelMessage.textContent = message;
            enableButton.classList.toggle('hidden', !showEnableButton);
            panel.classList.remove('hidden');
        }

        function updatePermissionUI() {
            if (!('Notification' in window)) {
                bellIcon.className = 'fa-solid fa-bell-slash text-lg';
                indicator.className = 'absolute right-2 top-2 h-2 w-2 rounded-full bg-red-500';
                bell.title = 'Notifications are not supported';
                bell.setAttribute('aria-label', 'Notifications are not supported');
                bell.setAttribute('aria-pressed', 'false');
                return;
            }

            const permission = Notification.permission;

            if (permission === 'granted') {
                bellIcon.className = 'fa-solid fa-bell text-lg text-emerald-600';
                indicator.className = 'absolute right-2 top-2 h-2 w-2 rounded-full bg-emerald-500';
                bell.title = 'Browser notification permission granted';
                bell.setAttribute('aria-label', 'Notification permission granted');
                bell.setAttribute('aria-pressed', 'true');
            } else if (permission === 'denied') {
                bellIcon.className = 'fa-solid fa-bell-slash text-lg text-red-600';
                indicator.className = 'absolute right-2 top-2 h-2 w-2 rounded-full bg-red-500';
                bell.title = 'Notifications blocked in browser settings';
                bell.setAttribute('aria-label', 'Notifications blocked');
                bell.setAttribute('aria-pressed', 'false');
            } else {
                bellIcon.className = 'fa-regular fa-bell text-lg';
                indicator.className = 'absolute right-2 top-2 h-2 w-2 rounded-full bg-slate-400';
                bell.title = 'Enable retreat notifications';
                bell.setAttribute('aria-label', 'Enable retreat notifications');
                bell.setAttribute('aria-pressed', 'false');
            }
        }

        async function enableNotifications() {
            if (!('Notification' in window)) {
                setPanel(
                    'Notifications unavailable',
                    'This browser does not support web notifications. You can still view your retreat schedule in the app.',
                    false
                );
                return;
            }

            if (!('serviceWorker' in navigator)) {
                setPanel(
                    'Browser support unavailable',
                    'This browser cannot register the service worker needed for retreat push notifications.',
                    false
                );
                return;
            }

            if (!window.isSecureContext) {
                setPanel(
                    'Secure connection required',
                    'Push notifications require HTTPS, except on localhost during development.',
                    false
                );
                return;
            }

            try {
                const permission = Notification.permission === 'default'
                    ? await Notification.requestPermission()
                    : Notification.permission;

                updatePermissionUI();

                if (permission === 'granted') {
                    setPanel(
                        'Permission granted',
                        'Your browser allows notifications. Push delivery still needs a registered subscription with the retreat server.',
                        false
                    );
                } else if (permission === 'denied') {
                    setPanel(
                        'Notifications are blocked',
                        'Change notification permissions in your browser or device settings if you want to enable retreat alerts.',
                        false
                    );
                } else {
                    setPanel(
                        'Notifications not enabled',
                        'You can continue using the retreat app, but background notifications may not be available.',
                        true
                    );
                }
            } catch (error) {
                console.error('Notification permission request failed:', error);

                setPanel(
                    'Could not enable notifications',
                    'Please check your browser settings and try again.',
                    true
                );
            }
        }

        bell.addEventListener('click', () => {
            if (panel.classList.contains('hidden')) {
                if ('Notification' in window && Notification.permission === 'granted') {
                    setPanel(
                        'Permission granted',
                        'Browser permission is enabled. Background push notifications will work after your device is subscribed to the retreat server.',
                        false
                    );
                } else if ('Notification' in window && Notification.permission === 'denied') {
                    setPanel(
                        'Notifications are blocked',
                        'Change notification permissions in your browser or device settings to enable retreat alerts.',
                        false
                    );
                } else {
                    setPanel(
                        'Stay connected to your retreat',
                        'Enable notifications to receive session reminders and recharge challenges.',
                        true
                    );
                }
            } else {
                panel.classList.add('hidden');
            }
        });

        enableButton.addEventListener('click', enableNotifications);
        closeButton.addEventListener('click', () => panel.classList.add('hidden'));

        updatePermissionUI();
    })();
</script>

<script>
    (() => {
        const batteryButton = document.getElementById('recharge-battery-button');
        const batteryPanel = document.getElementById('recharge-battery-panel');

        if (!batteryButton || !batteryPanel) return;

        batteryButton.addEventListener('click', () => {
            batteryPanel.classList.toggle('hidden');
        });
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
<script src="{{ asset('js/retreat-push.js') }}?v=1" defer></script>

</body>
</html>
