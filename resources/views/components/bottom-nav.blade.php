<nav class="fixed bottom-0 left-1/2 z-50 w-full max-w-md -translate-x-1/2 border-t border-slate-200 bg-white">

    <div class="grid grid-cols-4">

        {{-- Schedule --}}
        <a
            href="{{ route('dashboard') }}"
            class="flex flex-col items-center gap-1 py-3 transition
                {{ request()->routeIs('dashboard') ? 'text-[#00477A]' : 'text-slate-500' }}">

            <i class="fa-regular fa-calendar-days text-xl"></i>

            <span class="text-[11px] font-medium">
                Schedule
            </span>

        </a>

        {{-- Info --}}
        <a
            href="{{ route('info') }}"
            class="flex flex-col items-center gap-1 py-3 transition
                {{ request()->routeIs('info') ? 'text-[#00477A]' : 'text-slate-500' }}">

            <i class="fa-solid fa-circle-info text-xl"></i>

            <span class="text-[11px] font-medium">
                Info
            </span>

        </a>

        {{-- Carnival --}}
        <a
            href="{{ route('carnival') }}"
            class="flex flex-col items-center gap-1 py-3 transition
                {{ request()->routeIs('carnival') ? 'text-[#00477A]' : 'text-slate-500' }} disabled">

            <i class="fa-solid fa-tent"></i>

            <span class="text-[11px] font-medium">
                Carnival
            </span>

        </a>

        <a
            href="{{ route('feedback') }}"
            class="flex flex-col items-center justify-center">

            <i class="fa-regular fa-message text-xl"></i>

            <span class="text-[11px] font-medium">
                Feedback
            </span>

        </a>

    </div>

</nav>

<div
    id="feedback-modal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 px-4">

    <div class="w-full max-w-sm rounded-2xl bg-white p-6 shadow-xl">

        <div class="flex justify-center">
            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-amber-100">
                <i class="fa-solid fa-clock text-2xl text-amber-600"></i>
            </div>
        </div>

        <h3 class="mt-4 text-center text-lg font-semibold text-slate-900">
            Feedback Not Available Yet
        </h3>

        <p class="mt-2 text-center text-sm leading-6 text-slate-500">
            The feedback form will be available on the seminar day.
            Thank you for your patience.
        </p>

        <button
            onclick="hideFeedbackNotice()"
            class="mt-6 w-full rounded-xl bg-[#00477A] py-3 font-medium text-white transition hover:bg-[#00588F]">
            OK
        </button>

    </div>

</div>

<script>
function showFeedbackNotice() {
    document.getElementById('feedback-modal').classList.remove('hidden');
    document.getElementById('feedback-modal').classList.add('flex');
}

function hideFeedbackNotice() {
    document.getElementById('feedback-modal').classList.add('hidden');
    document.getElementById('feedback-modal').classList.remove('flex');
}
</script>