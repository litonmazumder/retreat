let deferredPrompt;

window.addEventListener('beforeinstallprompt', (e) => {

    e.preventDefault();

    deferredPrompt = e;

});

window.installPWA = async () => {

    if (!deferredPrompt) return;

    deferredPrompt.prompt();

    const { outcome } = await deferredPrompt.userChoice;

    if (outcome === 'accepted') {

        localStorage.setItem('pwa-installed', 'true');

    }

    deferredPrompt = null;

    document
        .getElementById('install-modal')
        ?.classList.add('hidden');

};

window.dismissPWA = () => {

    localStorage.setItem('pwa-dismissed', 'true');

    document
        .getElementById('install-modal')
        ?.classList.add('hidden');

};

window.showPWAModal = () => {

    if (
        window.matchMedia('(display-mode: standalone)').matches ||
        localStorage.getItem('pwa-installed') ||
        localStorage.getItem('pwa-dismissed') ||
        !deferredPrompt
    ) {
        return;
    }

    document
        .getElementById('install-modal')
        ?.classList.remove('hidden');

    document
        .getElementById('install-modal')
        ?.classList.add('flex');

    document
        .getElementById('install-app')
        ?.classList.remove('hidden');

};

window.addEventListener('appinstalled', () => {

    localStorage.setItem('pwa-installed', 'true');

});