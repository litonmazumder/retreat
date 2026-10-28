<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Asia Seminar')</title>

    <meta
        name="description"
        content="Asia Seminar Portal">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')

</head>

<body class="min-h-screen bg-slate-100 text-gray-800">

    <!-- Background Decoration -->

    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div class="absolute -top-40 -left-40 w-96 h-96 bg-[#00477A]/10 rounded-full blur-3xl"></div>

        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-sky-200/30 rounded-full blur-3xl"></div>

    </div>

    <!-- Header -->

    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-200">

        <div class="max-w-7xl mx-auto px-6">

            <div class="h-20 flex items-center justify-between">

                <!-- Logo -->

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-xl bg-[#00477A] flex items-center justify-center">

                        <span class="text-white text-xl font-bold">
                            S
                        </span>

                    </div>

                    <div>

                        <h1 class="text-xl font-bold text-[#00477A]">

                            Asia Seminar

                        </h1>

                        <p class="text-sm text-gray-500">

                            Registration Portal

                        </p>

                    </div>

                </div>

                <!-- Navigation -->

                <nav class="hidden md:flex items-center gap-8 text-sm font-medium">

                    <a href="{{ route('home') }}"
                       class="hover:text-[#00477A] transition">

                        Home

                    </a>

                    <a href="{{ route('schedule') }}"
                       class="hover:text-[#00477A] transition">

                        Schedule

                    </a>

                    <a href=""
                       class="hover:text-[#00477A] transition">

                        Speakers

                    </a>

                    <a href=""
                       class="hover:text-[#00477A] transition">

                        Venue

                    </a>

                    <a href="{{ route('feedback') }}"
                       class="hover:text-[#00477A] transition">

                        Feedback

                    </a>

                </nav>

            </div>

        </div>

    </header>

    <!-- Page Header -->

    @hasSection('page-header')

        <section class="py-16">

            <div class="max-w-7xl mx-auto px-6">

                @yield('page-header')

            </div>

        </section>

    @endif

    <!-- Main -->

    <main>

        <div class="max-w-7xl mx-auto px-6 py-10">

            @yield('content')

        </div>

    </main>

    <!-- Footer -->

    <footer class="mt-20 border-t border-slate-200 bg-white">

        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="grid md:grid-cols-3 gap-10">

                <div>

                    <h3 class="font-bold text-lg text-[#00477A]">

                        Asia Seminar

                    </h3>

                    <p class="mt-3 text-gray-500 text-sm leading-6">

                        A modern event registration and attendance platform
                        designed for seminars, workshops and conferences.

                    </p>

                </div>

                <div>

                    <h4 class="font-semibold mb-4">

                        Quick Links

                    </h4>

                    <ul class="space-y-2 text-gray-500">

                        <li>
                            <a href="#" class="hover:text-[#00477A]">
                                Registration
                            </a>
                        </li>

                        <!-- <li>
                            <a href="#" class="hover:text-[#00477A]">
                                Event Pass
                            </a>
                        </li> -->

                        <li>
                            <a href="#" class="hover:text-[#00477A]">
                                Check Attendance
                            </a>
                        </li>

                    </ul>

                </div>

                <div>

                    <h4 class="font-semibold mb-4">

                        Need Help?

                    </h4>

                    <p class="text-gray-500 text-sm">

                        support@Asia.org

                    </p>

                    <p class="text-gray-500 text-sm mt-2">

                        +880 1XXXXXXXXX

                    </p>

                </div>

            </div>

            <div class="mt-10 pt-6 border-t text-center text-sm text-gray-500">

                © {{ date('Y') }} Asia Seminar.
                All rights reserved.

            </div>

        </div>

    </footer>

    @stack('scripts')

</body>

</html>