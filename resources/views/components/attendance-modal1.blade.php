<div
    x-cloak
    x-show="attendanceModal"
    x-transition.opacity
    class="fixed inset-0 z-[999] flex items-center justify-center bg-black/60 p-4">

    <div
        @click.outside="attendanceModal = false"
        x-transition.scale
        class="w-full max-w-md rounded-3xl bg-white p-6 shadow-2xl">

        {{-- Icon --}}
        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-100">
            <i class="fa-solid fa-key text-2xl text-[#00477A]"></i>
        </div>

        {{-- Title --}}
        <h3 class="mt-5 text-center text-xl font-bold text-slate-800">
            Verify Attendance
        </h3>

        {{-- Description --}}
        <p class="mt-3 text-center text-sm leading-6 text-slate-500">
            Enter today's <strong>4-digit attendance PIN</strong> provided by the facilitator to confirm your attendance for
            <span class="font-semibold text-[#00477A]">
                Day <span x-text="attendanceDay"></span>
            </span>.
        </p>

        <form
            method="POST"
            action="{{ route('attendance.store') }}"
            class="mt-8">

            @csrf

            <input
                type="hidden"
                name="day"
                :value="attendanceDay">

            {{-- PIN --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Attendance PIN
                </label>

                <input
                    type="text"
                    name="pin"
                    maxlength="4"
                    inputmode="numeric"
                    pattern="[0-9]*"
                    autocomplete="one-time-code"
                    required
                    class="w-full rounded-2xl border border-slate-300 py-4 text-center text-3xl font-bold tracking-[0.6em] text-[#00477A] outline-none transition focus:border-[#00477A] focus:ring-4 focus:ring-[#00477A]/10"
                    placeholder="••••">

                <p class="mt-3 text-center text-xs text-slate-500">
                    The PIN is announced during the session.
                </p>

            </div>

            {{-- Buttons --}}
            <div class="mt-8 grid grid-cols-2 gap-3">

                <button
                    type="button"
                    @click="attendanceModal = false"
                    class="rounded-2xl border border-slate-300 py-3 font-semibold text-slate-700 transition hover:bg-slate-100">

                    Cancel

                </button>

                <button
                    type="submit"
                    class="rounded-2xl bg-[#00477A] py-3 font-semibold text-white transition hover:bg-[#00365d]">

                    <i class="fa-solid fa-circle-check mr-2"></i>

                    Verify

                </button>

            </div>

        </form>

    </div>

</div>