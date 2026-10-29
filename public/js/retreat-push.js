(() => {
    const config = window.retreatPushConfig;

    if (!config || !('serviceWorker' in navigator) ||
        !('PushManager' in window) || !('Notification' in window)) {
        console.warn('Push notifications are not supported in this browser.');
        return;
    }

    function decodeVapidKey(base64String) {
        const padding = '='.repeat((4 - base64String.length % 4) % 4);
        const base64 = (base64String + padding)
            .replace(/-/g, '+')
            .replace(/_/g, '/');

        return Uint8Array.from(atob(base64), char => char.charCodeAt(0));
    }

    async function enablePush() {
        const permission = await Notification.requestPermission();

        if (permission !== 'granted') {
            throw new Error('Notification permission was not granted.');
        }

        const registration = await navigator.serviceWorker.ready;

        let subscription = await registration.pushManager.getSubscription();

        if (!subscription) {
            subscription = await registration.pushManager.subscribe({
                userVisibleOnly: true,
                applicationServerKey: decodeVapidKey(config.publicKey),
            });
        }

        const response = await fetch(config.subscribeUrl, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector(
                    'meta[name="csrf-token"]'
                )?.content || '',
            },
            body: JSON.stringify(subscription.toJSON()),
        });

        if (!response.ok) {
            throw new Error('Unable to save your push subscription.');
        }

        return subscription;
    }

    async function disablePush() {
        const registration = await navigator.serviceWorker.ready;
        const subscription = await registration.pushManager.getSubscription();

        if (!subscription) return;

        const response = await fetch(config.unsubscribeUrl, {
            method: 'DELETE',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector(
                    'meta[name="csrf-token"]'
                )?.content || '',
            },
            body: JSON.stringify({ endpoint: subscription.endpoint }),
        });

        if (!response.ok) {
            throw new Error('Unable to disable push notifications.');
        }

        await subscription.unsubscribe();
    }

    // Make these available to the existing notification-bell UI.
    window.retreatPush = { enablePush, disablePush };
})();