<aside
    id="sidebar"
    class="fixed left-0 top-0 z-30 h-screen w-64 bg-[#00477A] pt-16 text-white border-t border-white/30">

    <div class="flex h-full flex-col overflow-y-auto px-4 py-6">

        {{-- Logo --}}
        <!-- <div class="mb-8 border-b border-white/10 pb-6">

            <h2 class="text-xl font-bold">
                Asia Seminar 2026
            </h2>

            <p class="mt-1 text-sm text-blue-200">
                Administration
            </p>

        </div> -->

        <nav class="flex-1 space-y-6">

            {{-- Dashboard --}}
            <div>

                <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-blue-300">
                    Overview
                </p>

                <a
                    href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 transition
                    {{ request()->routeIs('dashboard') ? 'bg-white/15 font-semibold text-white' : 'text-blue-100 hover:bg-white/10' }}">

                    <i class="fa-solid fa-gauge-high w-5"></i>

                    Dashboard

                </a>

            </div>

            {{-- Participant Management --}}
            <div>

                <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-blue-300">
                    Participants
                </p>

                <a
                    href="{{route('admin.participants.index')}}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-blue-100 transition hover:bg-white/10">

                    <i class="fa-solid fa-users w-5"></i>

                    Participants

                </a>

                <!-- <a
                    href="{{ route('admin.attendance.index') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-blue-100 transition hover:bg-white/10">

                    <i class="fa-solid fa-user-check w-5"></i>

                    Attendance

                </a> -->

                <!-- <a
                    href="#"
                    class="mt-1 flex items-center gap-3 rounded-lg px-4 py-3 text-blue-100 transition hover:bg-white/10">

                    <i class="fa-solid fa-id-card w-5"></i>

                    Profile Verification

                </a> -->

            </div>

            {{-- Event Operations --}}
            <div>

                <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-blue-300">
                    Event Operations
                </p>
<!-- 
                <a
                    href="#"
                    class="mt-1 flex items-center gap-3 rounded-lg px-4 py-3 text-blue-100 transition hover:bg-white/10">

                    <i class="fa-solid fa-key w-5"></i>

                    Attendance PIN

                </a> -->

                <!-- <a
                    href="#"
                    class="mt-1 flex items-center gap-3 rounded-lg px-4 py-3 text-blue-100 transition hover:bg-white/10">

                    <i class="fa-solid fa-calendar-days w-5"></i>

                    Programme

                </a> -->

                <a
                    href="#"
                    class="mt-1 flex items-center gap-3 rounded-lg px-4 py-3 text-blue-100 transition hover:bg-white/10">

                    <i class="fa-solid fa-comments w-5"></i>

                    Feedback

                </a>

            </div>

            {{-- Content --}}
            <div>

                <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-blue-300">
                    Content
                </p>

                <a
                    href="#"
                    class="mt-1 flex items-center gap-3 rounded-lg px-4 py-3 text-blue-100 transition hover:bg-white/10">

                    <i class="fa-solid fa-folder-open w-5"></i>

                    Documents

                </a>

            </div>

            {{-- Reports --}}
            <div>

                <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-blue-300">
                    Reports
                </p>

                <a
                    href="#"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-blue-100 transition hover:bg-white/10">

                    <i class="fa-solid fa-chart-column w-5"></i>

                    Reports

                </a>

                <a
                    href="#"
                    class="mt-1 flex items-center gap-3 rounded-lg px-4 py-3 text-blue-100 transition hover:bg-white/10">

                    <i class="fa-solid fa-award w-5"></i>

                    Certificates

                </a>

            </div>

            {{-- Settings --}}
            <div>

                <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-blue-300">
                    Administration
                </p>

                <a
                    href="#"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-blue-100 transition hover:bg-white/10">

                    <i class="fa-solid fa-gear w-5"></i>

                    Settings

                </a>

            </div>

        </nav>

    </div>

</aside>