<nav class="fixed top-0 z-40 w-full border-b border-white bg-[#00477A] shadow">

    <div class="flex h-16 items-center justify-between px-4 lg:px-6">

        {{-- Left --}}
        <div class="flex items-center gap-4">

            {{-- Mobile Sidebar Toggle --}}
            <button
                data-drawer-target="sidebar"
                data-drawer-toggle="sidebar"
                aria-controls="sidebar"
                class="rounded-lg p-2 text-white transition hover:bg-white/10 lg:hidden">

                <i class="fa-solid fa-bars text-lg"></i>

            </button>

            {{-- Logo --}}
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3">

                <!-- <img
                    src="{{ asset('images/logo.png') }}"
                    class="h-9 w-auto"
                    alt="Logo"> -->

                <div class="hidden sm:block">

                    <h1 class="text-lg font-semibold text-white">
                        Asia Seminar 2026
                    </h1>

                    <!-- <p class="text-xs text-blue-200">
                        Admin Panel
                    </p> -->

                </div>

            </a>

        </div>

        {{-- Right --}}
        <div class="flex items-center">

            <button
                type="button"
                data-dropdown-toggle="user-dropdown"
                class="flex items-center gap-3 rounded-lg px-3 py-2 transition hover:bg-white/10">

                {{-- Avatar --}}
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-white text-sm font-bold text-[#00477A]">

                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                </div>

                {{-- User Info --}}
                <div class="hidden text-left lg:block">

                    <p class="text-sm font-semibold text-white">
                        {{ auth()->user()->name ?? 'Administrator' }}
                    </p>

                    <p class="text-xs text-blue-200">
                        Administrator
                    </p>

                </div>

                <i class="fa-solid fa-chevron-down text-xs text-blue-200"></i>

            </button>

            {{-- Dropdown --}}
            <div
                id="user-dropdown"
                class="z-50 hidden w-56 divide-y divide-gray-100 rounded-xl bg-white shadow-xl">

                <div class="px-4 py-3">

                    <p class="font-medium text-gray-800">
                        {{ auth()->user()->name ?? 'Administrator' }}
                    </p>

                    <p class="truncate text-sm text-gray-500">
                        
                    </p>

                </div>

                <ul class="py-2">

                    <li>
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 transition hover:bg-gray-100">

                            <i class="fa-regular fa-user w-4"></i>
                            Profile

                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 transition hover:bg-gray-100">

                            <i class="fa-solid fa-gear w-4"></i>
                            Settings

                        </a>
                    </li>

                </ul>

                <div class="p-2">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="flex w-full items-center gap-2 rounded-lg px-3 py-2 text-sm text-red-600 transition hover:bg-red-50">

                            <i class="fa-solid fa-right-from-bracket w-4"></i>

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</nav>