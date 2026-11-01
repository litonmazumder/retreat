const CACHE_NAME = 'retreat-v2';

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(() => self.skipWaiting())
    );
});

self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys()
            .then(keys => Promise.all(
                keys
                    .filter(key => key !== CACHE_NAME)
                    .map(key => caches.delete(key))
            ))
            .then(() => self.clients.claim())
    );
});

// Display incoming push notifications.
self.addEventListener('push', event => {
    let payload = {};

    try {
        payload = event.data ? event.data.json() : {};
    } catch {
        payload = {
            title: 'Retreat Companion',
            body: event.data?.text() || 'You have a new retreat notification.'
        };
    }

    const title = payload.title || 'Retreat Companion';

    const options = {
        body: payload.body || 'Your retreat adventure awaits!',
        icon: '/icons/icon-192x192.png',
        badge: '/icons/icon-192x192.png',
        tag: payload.tag || 'retreat-notification',
        data: {
            url: payload.url || '/dashboard',
            type: payload.type || 'general',
            scheduleId: payload.schedule_id || null
        },
        renotify: false,
        requireInteraction: payload.requireInteraction ?? false
    };

    event.waitUntil(
        self.registration.showNotification(title, options)
    );
});

// Open the relevant page when a notification is tapped.
self.addEventListener('notificationclick', event => {
    event.notification.close();

    const targetUrl = new URL(
        event.notification.data?.url || '/dashboard',
        self.location.origin
    );

    // Never navigate to an external URL from notification payload data.
    if (targetUrl.origin !== self.location.origin) {
        return;
    }

    event.waitUntil(
        self.clients.matchAll({
            type: 'window',
            includeUncontrolled: true
        }).then(async clients => {
            const existingClient = clients.find(client => {
                return new URL(client.url).origin === self.location.origin;
            });

            if (existingClient) {
                await existingClient.focus();
                return existingClient.navigate(targetUrl.href);
            }

            return self.clients.openWindow(targetUrl.href);
        })
    );
});

// Conservative offline fallback for same-origin GET requests.
// Do not cache Laravel POST requests or dynamic authenticated pages.
self.addEventListener('fetch', event => {
    const request = event.request;
    const url = new URL(request.url);

    if (
        request.method !== 'GET' ||
        url.origin !== self.location.origin ||
        url.pathname.startsWith('/api/')
    ) {
        return;
    }

    event.respondWith(
        fetch(request).catch(async () => {
            const cached = await caches.match(request);

            if (cached) {
                return cached;
            }

            throw new Error('Network unavailable and resource not cached.');
        })
    );
});