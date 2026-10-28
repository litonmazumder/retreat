<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Asia Seminar 2026')</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="min-h-screen bg-gradient-to-br from-slate-100 to-blue-50">

<!-- Header -->
<header class="border-b bg-white shadow-sm">

    <div class="mx-auto flex max-w-7xl items-center justify-between px-8 py-6">

        <div>
            <h1 class="text-3xl font-bold text-[#00477A]">
                Swisscontact Retreat 2026
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


@yield('content')


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
@stack('scripts')
</body>
</html>