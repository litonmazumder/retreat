<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Asia Seminar 2026 - Self Check-In</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="min-h-screen bg-gradient-to-br from-slate-100 to-blue-50">

<!-- Header -->
<header class="border-b bg-white shadow-sm">

    <div class="mx-auto flex max-w-7xl items-center justify-between px-8 py-6">

        <div>
            <h1 class="text-3xl font-bold text-[#00477A]">
                Asia Seminar 2026
            </h1>

            <p class="mt-1 text-gray-500">
                Participant Self Check-In
            </p>
        </div>

        <div class="text-right">
            <div id="clock" class="text-3xl font-bold text-[#00477A]"></div>
            <div id="today" class="mt-1 text-sm text-gray-500"></div>
        </div>

    </div>

</header>


<!-- Main -->
<main class="flex min-h-[calc(100vh-145px)] items-center justify-center px-6 py-10">

    <div class="w-full max-w-2xl rounded-3xl border border-slate-200 bg-white p-12 shadow-2xl">

        <div class="text-center">

            <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-[#00477A]/10">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-12 w-12 text-[#00477A]"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0"/>

                </svg>

            </div>

            <h2 class="mt-8 text-4xl font-bold text-slate-900">
                Welcome
            </h2>

            <p class="mt-4 text-lg text-slate-500">
                Enter your Participant ID to confirm your attendance.
            </p>

        </div>

        <form id="attendanceForm" class="mt-12">

            <label class="mb-4 block text-xl font-semibold text-slate-700">
                Participant ID
            </label>

            <input
                id="participant"
                type="text"
                autocomplete="off"
                autofocus
                placeholder="SCBD-2026-00125"
                class="w-full rounded-2xl border-2 border-slate-300 px-6 py-5 text-center text-3xl font-semibold uppercase tracking-wider outline-none transition focus:border-[#00477A] focus:ring-4 focus:ring-[#00477A]/20">

            <button
                class="mt-8 w-full rounded-2xl bg-[#00477A] py-6 text-2xl font-bold text-white transition hover:bg-[#00365f]">

                CHECK IN

            </button>

        </form>

        <div
            id="status"
            class="mt-8 hidden rounded-2xl p-6 text-center text-xl font-semibold">
        </div>

        <div class="mt-10 border-t pt-8 text-center">

            <p class="text-slate-500">
                Need assistance?
            </p>

            <p class="mt-2 font-semibold text-[#00477A]">
                Please visit the Registration Desk.
            </p>

        </div>

    </div>

</main>


<footer class="border-t bg-white py-5">

    <p class="text-center text-sm text-slate-500">
        Powered by Swisscontact South Asia Region
    </p>

</footer>

</body>



<script>

function updateClock() {

    const now = new Date();

    document.getElementById('clock').innerHTML =
        now.toLocaleTimeString([], {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });

}

updateClock();

setInterval(updateClock,1000);

document
.getElementById('attendanceForm')
.addEventListener('submit', function(e){

    e.preventDefault();

    const participant =
        document.getElementById('participant').value.trim();

    const status =
        document.getElementById('status');

    status.classList.remove('hidden');

    if(participant === '')
    {

        status.className =
            "mt-8 rounded-2xl bg-red-100 text-red-700 p-5 text-center text-lg font-semibold";

        status.innerHTML =
            "Please enter your Participant ID.";

        return;

    }

    status.className =
        "mt-8 rounded-2xl bg-blue-100 text-blue-700 p-5 text-center text-lg font-semibold";

    status.innerHTML =
        "Checking attendance...";

    setTimeout(function(){

        status.className =
            "mt-8 rounded-2xl bg-green-100 text-green-700 p-5 text-center text-lg font-semibold";

        status.innerHTML =
            "✓ Attendance confirmed for <strong>" + participant + "</strong>";

    },1500);

});

</script>

</body>
</html>