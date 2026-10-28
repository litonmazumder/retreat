<div
    x-cloak
    x-show="attendanceModal"
    x-transition.opacity
    class="fixed inset-0 z-[999] flex items-center justify-center bg-black/60 p-4"
>

    {{-- Modal --}}
    <div
        @click.outside="attendanceModal = false"
        x-transition.scale
        class="w-full max-w-md rounded-t-3xl bg-white p-6 shadow-2xl sm:rounded-3xl">

        {{-- Icon --}}
        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-100">
            <i class="fa-solid fa-user-check text-2xl text-[#00477A]"></i>
        </div>

        {{-- Title --}}
        <h3 class="mt-5 text-center text-xl font-bold text-slate-800">
            Confirm Attendance
        </h3>

        {{-- Description --}}
        <p class="mt-3 text-center text-sm leading-6 text-slate-500">
            You are about to confirm your attendance for
            <span class="font-semibold text-[#00477A]">
                Day <span x-text="attendanceDay"></span>
            </span>.

            <br><br>

            Once submitted, your attendance cannot be changed.
        </p>

        {{-- Form --}}
        <form method="POST" action="{{ route('attendance.store') }}" class="mt-8">
            @csrf

            {{-- Selected Day --}}
            <input
                type="hidden"
                name="day"
                :value="attendanceDay">

            <div class="grid grid-cols-2 gap-3">

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

                    Confirm

                </button>

            </div>

        </form>

    </div>

</div>