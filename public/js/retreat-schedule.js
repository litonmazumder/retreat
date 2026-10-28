
(() => {
    function getDhakaDateTime() {
        const parts = new Intl.DateTimeFormat('en-CA', {
            timeZone: 'Asia/Dhaka',
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
        }).formatToParts(new Date());

        const values = Object.fromEntries(
            parts.map(part => [part.type, part.value])
        );

        return {
            date: `${values.year}-${values.month}-${values.day}`,
            timestamp: Date.now()
        };
    }

    function updateSchedule() {
        // for live pod
       // const { date: todayDate, timestamp: now } = getDhakaDateTime();

       //temp check

       const simulatedDateTime = new Date('2026-11-03T10:00:00+06:00');

        const todayDate = new Intl.DateTimeFormat('en-CA', {
            timeZone: 'Asia/Dhaka',
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
        }).format(simulatedDateTime);

        const now = simulatedDateTime.getTime();

        //temp check end

        document.querySelectorAll('[data-retreat-day]').forEach(section => {
            const date = section.dataset.retreatDay;
            const cards = [...section.querySelectorAll('[data-schedule-card]')];

            const timeToTimestamp = time =>
                new Date(`${date}T${time}:00+06:00`).getTime();

            const live = date === todayDate
                ? cards.find(card =>
                    now >= timeToTimestamp(card.dataset.start) &&
                    now < timeToTimestamp(card.dataset.end)
                )
                : null;

            const next = date === todayDate
                ? cards.find(card =>
                    timeToTimestamp(card.dataset.start) > now
                )
                : null;

            cards.forEach(card => {
                const badge = card.querySelector('[data-schedule-badge]');
                if (!badge) return;

                badge.className =
                    'hidden shrink-0 rounded-full px-3 py-1 text-xs font-bold';

                badge.textContent = '';
                card.classList.remove('ring-2', 'ring-blue-300');

                if (card === live) {
                    badge.className =
                        'inline-flex shrink-0 rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700';
                    badge.textContent = '🔴 LIVE NOW';
                    card.classList.add('ring-2', 'ring-blue-300');
                } else if (card === next) {
                    badge.className =
                        'inline-flex shrink-0 rounded-full bg-blue-100 px-3 py-1 text-xs font-bold text-blue-800';
                    badge.textContent = '→ UP NEXT';
                }
            });
        });
    }

    updateSchedule();
    setInterval(updateSchedule, 15000);

    document.addEventListener('visibilitychange', () => {
        if (!document.hidden) updateSchedule();
    });
})();
