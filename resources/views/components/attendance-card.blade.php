<div x-show="!attendance[day]">

    <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5">

        <div class="flex items-center gap-2">
            <i class="fa-solid fa-circle-exclamation text-amber-600"></i>

            <div>
                <h3 class="font-semibold text-amber-900">
                    Attendance Required
                </h3>

                <p class="mt-1 text-sm text-amber-700">
                    Please confirm your attendance before joining today's sessions.
                </p>
            </div>
        </div>

        <button
            @click="openAttendance(day)"
            class="mt-4 w-full rounded-xl bg-[#00477A] py-3 text-white">

            Confirm Attendance

        </button>

    </div>

</div>

<div
    x-show="attendance[day]"
    x-cloak>

    <div class="rounded-2xl border border-green-200 bg-green-50 p-5">

        <div class="flex items-center gap-3">

            <i class="fa-solid fa-circle-check text-2xl text-green-600"></i>

            <div>

                <p class="font-semibold text-green-800">

                    Attendance Confirmed

                </p>

                <p class="text-sm text-green-600">

                    Thank you.

                </p>

            </div>

        </div>

    </div>

</div>