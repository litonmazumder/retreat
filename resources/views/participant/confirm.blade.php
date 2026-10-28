<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Asia Seminar 2026 - Self Check-In</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="min-h-screen bg-gradient-to-br from-slate-100 via-white to-blue-50">

<header class="sticky top-0 z-50 border-b bg-white/95 backdrop-blur shadow-sm">

    <div class="mx-auto max-w-5xl px-5 py-5 flex items-center justify-between">

        <div>

            <h2 class="mt-5 text-3xl font-bold text-white">
                Welcome
            </h2>

            <p class="mt-2 text-blue-100">
                Please review your information before entering the event dashboard.
            </p>

        </div>

        <div class="hidden md:block text-right">

            <div id="clock" class="text-2xl font-bold text-[#00477A]"></div>

            <div id="today" class="text-sm text-slate-500"></div>

        </div>

    </div>

</header>


<main class="px-4 py-6 md:py-12">

    <div class="mx-auto max-w-lg">

        <div class="overflow-hidden rounded-3xl bg-white shadow-xl">

            <!-- Top Banner -->

            <div class="bg-gradient-to-r from-[#00477A] to-[#0063A6] px-6 py-8 text-center">

                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-white/20">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-10 w-10 text-white"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 12l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0"/>

                    </svg>

                </div>

                <h2 class="mt-5 text-3xl font-bold text-white">

                    Confirm Attendance

                </h2>

                <p class="mt-2 text-blue-100">

                    Please verify your details before continuing.

                </p>

            </div>

            <div class="p-6 space-y-5">

                <div class="rounded-2xl border bg-slate-50 p-5">

                    <p class="text-sm text-slate-500">
                        Full Name
                    </p>

                    <p class="mt-1 text-xl font-bold">
                        {{ $participant->first_name }} {{ $participant->last_name }}
                    </p>

                </div>

                <div class="rounded-2xl border bg-slate-50 p-5">

                    <p class="text-sm text-slate-500">
                        Email
                    </p>

                    <p class="mt-1 font-semibold break-all">
                        {{ $participant->email }}
                    </p>

                </div>

                <div class="rounded-2xl border bg-slate-50 p-5">

                    <p class="text-sm text-slate-500">
                        Designation
                    </p>

                    <p class="mt-1 font-semibold">
                        {{ $participant->designation ?: 'N/A' }}
                    </p>

                </div>

                <div class="rounded-2xl border bg-slate-50 p-5">

                    <p class="text-sm text-slate-500">
                        Project
                    </p>

                    <p class="mt-1 font-semibold">
                        {{ $participant->project_name ?: 'N/A' }}
                    </p>

                </div>

                <div class="rounded-2xl border bg-slate-50 p-5">

                    <p class="text-sm text-slate-500">
                        Country
                    </p>

                    <p class="mt-1 font-semibold">
                        {{ $participant->country }}
                    </p>

                </div>

            <div class="rounded-2xl border border-blue-200 bg-blue-50 p-5">

                <p class="text-blue-900 leading-7">

                    Please confirm that the above information belongs to you.

                    <!-- If you notice any incorrect information, please contact the registration desk before proceeding. -->

                </p>

            </div>

            </div>

            <div class="sticky bottom-0 bg-white border-t p-5">

            <div class="sticky bottom-0 border-t bg-white p-5">

                <form action="{{ route('dashboard') }}" method="GET">

                    <button
                        type="submit"
                        class="w-full rounded-xl bg-[#00477A] py-4 text-lg font-bold text-white transition hover:bg-[#003760]">

                        Continue to Dashboard →

                    </button>

                </form>

            </div>

            </div>

            @endif

        </div>

    </div>

</main>

</body>