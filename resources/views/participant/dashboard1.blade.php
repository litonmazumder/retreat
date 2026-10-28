@extends('layouts.register')

@section('title', 'Asia Seminar 2026')

@section('content')
<main class="min-h-screen bg-slate-50 pb-20">
    <div class="mx-auto max-w-lg px-4 py-4">

        {{-- Tabs --}}
        <div class="flex gap-3 overflow-x-auto pb-4">
            <a href="#day1" class="shrink-0 rounded-full border border-blue-900 bg-blue-900 px-4 py-2 text-sm font-medium text-white">
                Day 1
            </a>
            <a href="#day2" class="shrink-0 rounded-full border border-slate-400 bg-white px-4 py-2 text-sm font-medium text-slate-700">
                Day 2
            </a>
            <a href="#day3" class="shrink-0 rounded-full border border-slate-400 bg-white px-4 py-2 text-sm font-medium text-slate-700">
                Day 3
            </a>
        </div>

        {{-- Day 1 Schedule --}}
        <section id="day1" class="mb-8">
            <h2 class="text-xl font-bold text-slate-900">11 Aug 2026, Tuesday</h2>
            <a href="#" class="mt-1 inline-block text-blue-800 font-semibold underline">
                Renaissance Dhaka Gulshan Hotel
            </a>

            <div class="mt-6 space-y-6">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-4 text-sm font-semibold text-slate-500">
                        12:00–18:00
                    </div>
                    <div class="col-span-8">
                        <h3 class="text-base font-bold text-slate-900">Flight and Arrival</h3>
                        <p class="mt-1 text-sm text-slate-500">All participants</p>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-4 text-sm font-semibold text-slate-500">
                        18:00–20:00
                    </div>
                    <div class="col-span-8">
                        <h3 class="text-base font-bold text-slate-900">Welcome Reception</h3>
                        <p class="mt-1 text-sm text-slate-500">All participants</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Attendance Section --}}
        <section id="day2" class="mb-8 rounded-2xl bg-white p-4 shadow-sm">
            <div class="mb-3 flex items-center gap-2">
                <span class="inline-block h-2 w-2 rounded-full bg-pink-700"></span>
                <p class="text-sm text-slate-700">You have not confirmed your attendance for day 2</p>
            </div>

            <a href="#confirm-attendance"
               class="block rounded-lg bg-fuchsia-800 px-4 py-4 text-center text-base font-semibold text-white transition hover:bg-fuchsia-900">
                Confirm your attendance
            </a>

            <h2 class="mt-6 text-xl font-bold text-slate-900">12 Aug 2026, Wednesday</h2>
            <a href="#" class="mt-1 inline-block text-blue-800 font-semibold underline">
                Renaissance Dhaka Gulshan Hotel
            </a>

            <div class="mt-6 space-y-6">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-4 text-sm font-semibold text-slate-500">08:30–08:45</div>
                    <div class="col-span-8">
                        <h3 class="text-base font-bold text-slate-900">Registration/Attendance</h3>
                        <p class="mt-1 text-sm text-slate-500">All participants</p>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-4 text-sm font-semibold text-slate-500">08:45–09:20</div>
                    <div class="col-span-8">
                        <h3 class="text-base font-bold text-slate-900">Opening Remarks</h3>
                        <p class="mt-1 text-sm text-slate-500">Helal Hussain, Alamgir Kabir, Prashant Rana & Hotel Representative</p>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-4 text-sm font-semibold text-slate-500">09:20–10:10</div>
                    <div class="col-span-8">
                        <h3 class="text-base font-bold text-slate-900">Swisscontact Global Update</h3>
                        <p class="mt-1 text-sm text-slate-500">Manish Pandey</p>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-4 text-sm font-semibold text-slate-500">10:10–10:20</div>
                    <div class="col-span-8">
                        <h3 class="text-base font-bold text-slate-900">SSA Overview</h3>
                        <p class="mt-1 text-sm text-slate-500">Prashant Rana</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 rounded-xl border border-slate-200 bg-slate-50 p-4">
                <label class="flex items-start gap-3 text-sm text-slate-700">
                    <input type="checkbox" class="mt-1 h-4 w-4 rounded border-slate-300 text-blue-900 focus:ring-blue-900">
                    <span>I hereby confirm that I am present at the official venue</span>
                </label>

                <button type="button"
                    class="mt-4 w-full rounded-lg bg-blue-900 px-4 py-3 text-base font-semibold text-white transition hover:bg-blue-950">
                    Confirm my attendance
                </button>
            </div>
        </section>

        {{-- Key Contacts --}}
        <section class="mb-8">
            <h2 class="mb-4 text-xl font-bold text-slate-900">Key Contact Personnel</h2>

            <div class="flex gap-4 overflow-x-auto pb-2">
                <article class="min-w-[260px] rounded-xl bg-slate-100 p-4">
                    <h3 class="text-lg font-semibold text-slate-900">Rubayet Alam Kusum</h3>
                    <p class="mt-1 text-sm text-slate-600">Admin & Logistics, Country Office, Swisscontact Bangladesh</p>
                    <a href="mailto:rubayet.kusum@swisscontact.org" class="mt-2 block text-sm font-semibold text-blue-800 break-all">
                        rubayet.kusum@swisscontact.org
                    </a>
                    <a href="tel:+8801737609255" class="mt-1 block text-sm font-semibold text-blue-800">
                        +880 1737 609255
                    </a>
                </article>

                <article class="min-w-[260px] rounded-xl bg-slate-100 p-4">
                    <h3 class="text-lg font-semibold text-slate-900">John Doe</h3>
                    <p class="mt-1 text-sm text-slate-600">Manager, Customer Relations, Renaissance Dhaka</p>
                    <a href="mailto:john.doe@renaissance.com" class="mt-2 block text-sm font-semibold text-blue-800 break-all">
                        john.doe@renaissance.com
                    </a>
                    <a href="tel:+8801737609255" class="mt-1 block text-sm font-semibold text-blue-800">
                        +880 1737 60....
                    </a>
                </article>
            </div>

            <div class="mt-4 flex justify-center gap-2">
                <span class="h-2 w-2 rounded-full bg-blue-900"></span>
                <span class="h-2 w-2 rounded-full bg-slate-300"></span>
                <span class="h-2 w-2 rounded-full bg-slate-300"></span>
            </div>
        </section>

        {{-- Other Information --}}
        <section>
            <h2 class="mb-4 text-xl font-bold text-slate-900">Other Information</h2>

            <div class="grid grid-cols-3 gap-3 sm:grid-cols-4">
                @php
                    $infoItems = [
                        ['Visa', '🌐', true],
                        ['Airport', '✈', false],
                        ['Hotel', '🏨', false],
                        ['Security', '🛡', false],
                        ['Food', '🍴', false],
                        ['Weather', '☀', false],
                        ['SIM Card', '📱', false],
                        ['Money Exchange', '💲', false],
                    ];
                @endphp

                @foreach ($infoItems as $item)
                    <a href="#"
                       class="flex flex-col items-center justify-center rounded-lg border px-3 py-4 text-center transition {{ $item[2] ? 'border-blue-900 bg-blue-900 text-white' : 'border-slate-200 bg-white text-slate-600' }}">
                        <div class="text-2xl leading-none">{{ $item[1] }}</div>
                        <div class="mt-2 text-xs font-medium">{{ $item[0] }}</div>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
</main>
@endsection