@extends('layouts.dashboard')

@section('title', 'Room Allocation')

@section('content')

@php
    $rooms = json_decode(<<<'ROOMS_JSON'
[{"number":"211","category":"Twin-1","type":"Twin","members":[{"sl":1,"name":"Sibbir Riyan","designation":"Sr. Officer - Business Development","project":"CoOf","bed_category":"Twin Bed"},{"sl":2,"name":"Shakif Ahmed","designation":"Coordinator - KCM & MRM","project":"ASTHA","bed_category":"Twin Bed"}]},{"number":"504","category":"Twin-2","type":"Twin","members":[{"sl":3,"name":"Nazim Reza","designation":"Manager, Programme","project":"InSPIRE","bed_category":"Twin Bed"},{"sl":4,"name":"Ahsan Habib","designation":"Senior Officer, Business Administration","project":"PROGRESS","bed_category":"Twin Bed"}]},{"number":"503","category":"Twin-3","type":"Twin","members":[{"sl":5,"name":"Shohidul Alam","designation":"Manager, Business Administration","project":"PROGRESS","bed_category":"Twin Bed"},{"sl":6,"name":"Araf Al Mehedi","designation":"Officer - MRM and KCM","project":"PROGRESS","bed_category":"Twin Bed"}]},{"number":"201","category":"Twin-4","type":"Twin","members":[{"sl":7,"name":"Mir Rafiat Salman","designation":"Sr. Manager - Partnership & Implementation","project":"SAFE BD","bed_category":"King Bed"},{"sl":8,"name":"Abu Thaher Siddik","designation":"Sr. Coordinator-Implementation","project":"BYETS","bed_category":"Extra Bed"}]},{"number":"401","category":"Twin-5","type":"Twin","members":[{"sl":9,"name":"Nadira Anzum","designation":"Officer - MRM and KCM","project":"PROGRESS","bed_category":"Extra Bed"},{"sl":10,"name":"Nowshin Anjum","designation":"Coordinator, Programme","project":"PROGRESS","bed_category":"King Bed"}]},{"number":"513","category":"Twin-6","type":"Twin","members":[{"sl":11,"name":"Nazmul Haque","designation":"Senior Officer - Finance","project":"PRABRIDDHI","bed_category":"Twin Bed"},{"sl":12,"name":"Md. Hafizur Rahman","designation":"Office Assistant","project":"PRABRIDDHI","bed_category":"Twin Bed"}]},{"number":"222","category":"Twin-7","type":"Twin","members":[{"sl":13,"name":"Sunjida Zaman Ria","designation":"Officer - Business Administration","project":"SAFE BD","bed_category":"Extra Bed"},{"sl":14,"name":"Romana Sanjida Akter","designation":"Sr. Coordinator - HR","project":"CoOf","bed_category":"King Bed"}]},{"number":"502","category":"Twin-8","type":"Twin","members":[{"sl":15,"name":"Md. Ashikujjaman","designation":"Sr. Coordinator-Implementation","project":"BYETS","bed_category":"Twin Bed"},{"sl":16,"name":"Quazi Shuvro Salamat Rahman","designation":"Intern (Full-Term)","project":"SAfEBD","bed_category":"Twin Bed"}]},{"number":"404","category":"Twin-9","type":"Twin","members":[{"sl":17,"name":"T M Abu Saleh","designation":"Manager, Programme","project":"PROGRESS","bed_category":"Twin Bed"},{"sl":18,"name":"M. D.Tahmeed Chowdhury","designation":"Coordinator, Programme","project":"PROGRESS","bed_category":"Twin Bed"}]},{"number":"403","category":"Twin-10","type":"Twin","members":[{"sl":19,"name":"S M Emtiaj Mahmud Mumu","designation":"Consultant (Full-Term)","project":"BYETS","bed_category":"Twin Bed"},{"sl":20,"name":"Faisal Mina","designation":"Consultant (Full-Term)","project":"BYETS","bed_category":"Twin Bed"}]},{"number":"904","category":"Twin-11","type":"Twin","members":[{"sl":21,"name":"Saika Binte Islam","designation":"Sr. Officer – Portfolio and Communications","project":"CoOf","bed_category":"King Bed"},{"sl":22,"name":"Humaira Ferdous Shifa","designation":"Senior Officer, MRM and KCM","project":"PROGRESS","bed_category":"Extra Bed"}]},{"number":"514","category":"Twin-12","type":"Twin","members":[{"sl":23,"name":"Sharmin Akter","designation":"Coordinator, Finance and Accounts","project":"PROGRESS","bed_category":"Twin Bed"},{"sl":24,"name":"Suraiya Rashed Runa","designation":"Sr. Coordinator - Finance","project":"CoOf","bed_category":"Twin Bed"}]},{"number":"524","category":"Twin-13","type":"Twin","members":[{"sl":25,"name":"Ali Moahmmad Moyeth","designation":"Sr. Officer - MRM & KCM","project":"SHOMPRITEE","bed_category":"King Bed"},{"sl":26,"name":"Nirjan Neeladri","designation":"Consultant (Full-Term)","project":"ASTHA","bed_category":"Extra Bed"}]},{"number":"213","category":"Twin-14","type":"Twin","members":[{"sl":27,"name":"Anik Saha","designation":"Sr. Officer - Field Operations","project":"ASTHA","bed_category":"Extra Bed"},{"sl":28,"name":"A.S. Nur Ahmed","designation":"Specialist - Field Operations","project":"ASTHA","bed_category":"King Bed"}]},{"number":"202","category":"Twin-15","type":"Twin","members":[{"sl":29,"name":"Moumita A Mallick","designation":"Consultant (Full-Term)","project":"BYETS","bed_category":"King Bed"},{"sl":30,"name":"Farian Alam","designation":"Officer - Implementation","project":"SAFE BD","bed_category":"Extra Bed"}]},{"number":"903","category":"Twin-16","type":"Twin","members":[{"sl":31,"name":"Tasmim Sinha","designation":"Senior Officer, Programme","project":"PROGRESS","bed_category":"King Bed"},{"sl":32,"name":"Nawar Nasar Khan","designation":"Senior Officer, Programme","project":"PROGRESS","bed_category":"Extra Bed"}]},{"number":"101","category":"Twin-17","type":"Twin","members":[{"sl":33,"name":"Sabrina Alamgir","designation":"Senior Officer - MRM","project":"SAFE BD","bed_category":"King Bed"},{"sl":34,"name":"Rubayet Alam Kusum","designation":"Sr. Officer - Admin & Logistics","project":"CoOf","bed_category":"Extra Bed"}]},{"number":"113","category":"Twin-18","type":"Twin","members":[{"sl":35,"name":"Farhana Akter Akhi","designation":"Officer - Business Administration","project":"SMILE","bed_category":"Extra Bed"},{"sl":36,"name":"Zannatul Ferdous Pushpa","designation":"Officer - HR","project":"CoOf","bed_category":"King Bed"}]},{"number":"515","category":"Twin-19","type":"Twin","members":[{"sl":37,"name":"Nazmur Rashid Tonmoy","designation":"Senior Officer, Programme","project":"InSPIRE","bed_category":"Twin Bed"},{"sl":38,"name":"Tanzeel Rashid","designation":"Senior Officer, Programme","project":"PROGRESS","bed_category":"Twin Bed"}]},{"number":"516","category":"Twin-20","type":"Twin","members":[{"sl":39,"name":"Nahid Farhana Rahman","designation":"Senior Officer, Business Administration","project":"PROGRESS","bed_category":"Twin Bed"},{"sl":40,"name":"Rupa Debnath","designation":"MEAL Coordinator","project":"CALL PMU","bed_category":"Twin Bed"}]},{"number":"402","category":"Twin-21","type":"Twin","members":[{"sl":41,"name":"Suranjan Chandra Dey","designation":"Manager-BA","project":"BYETS","bed_category":"Twin Bed"},{"sl":42,"name":"Sabbir Rahman Khan","designation":"Manager - MRM & KCM","project":"PROGRESS","bed_category":"Twin Bed"}]},{"number":"107","category":"Twin-22","type":"Twin","members":[{"sl":43,"name":"Ahmed Rifat Kabir Sristy","designation":"Coordinator - Trade Facilitation","project":"SAFE BD","bed_category":"Twin Bed"},{"sl":44,"name":"Tawhidul Anwar","designation":"Senior Officer - Partnership and Trade","project":"SAFE BD","bed_category":"Twin Bed"}]},{"number":"303","category":"Twin-23","type":"Twin","members":[{"sl":45,"name":"Md. Bappy Shahrier","designation":"Sr. Manager - MEAL","project":"CALL PMU","bed_category":"Twin Bed"},{"sl":46,"name":"Mohtahsam Billah","designation":"Sr. Manager, MRM & KCM","project":"PROGRESS","bed_category":"Twin Bed"}]},{"number":"521","category":"Twin-24","type":"Twin","members":[{"sl":47,"name":"Samira Sifat Swarna","designation":"Officer - Programme","project":"PROGRESS","bed_category":"King Bed"},{"sl":48,"name":"Salmun Nahar Aishi","designation":"Intern (Full-Term)","project":"CBFT_HILTI","bed_category":"Extra Bed"}]},{"number":"111","category":"Twin-25","type":"Twin","members":[{"sl":49,"name":"Parmita Ray","designation":"Sr. Officer-Skills & Training Implementation","project":"BYETS","bed_category":"King Bed"},{"sl":50,"name":"Projna Dasgupta","designation":"Sr. Officer-Skills and Training Implementation","project":"BYETS","bed_category":"Extra Bed"}]},{"number":"703","category":"Twin-26","type":"Twin","members":[{"sl":51,"name":"Abdul Kader","designation":"Sr. Officer - Program Implementation","project":"SMILE","bed_category":"Twin Bed"},{"sl":52,"name":"Mahboob Uddin Neon","designation":"Senior Officer, MRM and KCM","project":"PROGRESS","bed_category":"Twin Bed"}]},{"number":"112","category":"Twin-27","type":"Twin","members":[{"sl":53,"name":"Md. Marjad Mir Kameli","designation":"Sr. Manager - MEL","project":"GO4IMPact","bed_category":"King Bed"},{"sl":54,"name":"Saiduzzaman Pulak","designation":"Specialist - Private Sector Engagement","project":"GO4IMPact","bed_category":"Extra Bed"}]},{"number":"512","category":"Twin-28","type":"Twin","members":[{"sl":55,"name":"Reserved","designation":"","project":"","bed_category":"Twin Bed"},{"sl":56,"name":"Salma Akhtar","designation":"Advisor, Advocacy and KEL","project":"PROGRESS","bed_category":"Twin Bed"}]},{"number":"604","category":"Twin-29","type":"Twin","members":[{"sl":57,"name":"Fahmid Ahmed Khan","designation":"Coordinator – Communications & Knowledge Management","project":"GO4IMPact","bed_category":"Twin Bed"},{"sl":58,"name":"Pragati Lahiri","designation":"IT Administrator","project":"CoOf","bed_category":"Twin Bed"}]},{"number":"302","category":"Twin-30","type":"Twin","members":[{"sl":59,"name":"Sabrina Fatema Chowdhury","designation":"Senior Officer, MRM","project":"PROGRESS","bed_category":"Twin Bed"},{"sl":60,"name":"Warda Ashraf","designation":"Consultant","project":"CoOf","bed_category":"Twin Bed"}]},{"number":"224","category":"Twin-31","type":"Twin","members":[{"sl":61,"name":"Sayed Monirul Hossain","designation":"Driver","project":"PRABRIDDHI","bed_category":"King Bed"},{"sl":62,"name":"Harun-Ar-Rashid","designation":"Sr. Office Assistant","project":"SAFE BD","bed_category":"Extra Bed"}]},{"number":"511","category":"Twin-32","type":"Twin","members":[{"sl":63,"name":"Saiful Islam Milon","designation":"Driver","project":"CoOf","bed_category":"Twin Bed"},{"sl":64,"name":"Milon Shah","designation":"Driver","project":"BYETS","bed_category":"Twin Bed"}]},{"number":"223","category":"Twin-33","type":"Twin","members":[{"sl":65,"name":"Seyam Rabbi","designation":"Senior Officer - Product Development","project":"PROGRESS","bed_category":"Extra Bed"},{"sl":66,"name":"Abdullah Al Arafat","designation":"Digitalisation Expert","project":"PROGRESS","bed_category":"King Bed"}]},{"number":"204","category":"Twin-34","type":"Twin","members":[{"sl":67,"name":"Syed Sabit Tamim","designation":"Sr.Officer-MRM & Communication","project":"BYETS","bed_category":"Twin Bed"},{"sl":68,"name":"Md. Abir Hossain","designation":"Sr. Officer-Finance","project":"BYETS","bed_category":"Twin Bed"}]},{"number":"214","category":"Twin-35","type":"Twin","members":[{"sl":69,"name":"Mahafuz Rahman Khandker","designation":"Driver","project":"ASTHA","bed_category":"Extra Bed"},{"sl":70,"name":"Md. Monir Hossain","designation":"Driver","project":"ASTHA","bed_category":"King Bed"}]},{"number":"203","category":"Twin-36","type":"Twin","members":[{"sl":71,"name":"Syed Abu Sufian","designation":"Senior Manager - Municipalities","project":"PRABRIDDHI","bed_category":"Twin Bed"},{"sl":72,"name":"Rukhen Uddin Ahmed","designation":"Senior Adviser for Public Sector Engagement","project":"PRABRIDDHI","bed_category":"Twin Bed"}]},{"number":"603","category":"Twin-37","type":"Twin","members":[{"sl":73,"name":"Masud Parvez","designation":"Office Assistant","project":"SHOMPRITEE","bed_category":"Twin Bed"},{"sl":74,"name":"Md. Aminur Islam","designation":"Office Assistant","project":"PROGRESS","bed_category":"Twin Bed"}]},{"number":"423","category":"Twin-38","type":"Twin","members":[{"sl":75,"name":"Nayeem Shahriar","designation":"Officer - Programme","project":"PROGRESS","bed_category":"Extra Bed"},{"sl":76,"name":"Md.Tawhidul Islam","designation":"Senior Manager, MRM and KCM","project":"PROGRESS","bed_category":"King Bed"}]},{"number":"424","category":"Twin-39","type":"Twin","members":[{"sl":77,"name":"Noshin Fariha","designation":"Officer - Access to Finance","project":"ASTHA","bed_category":"Extra Bed"},{"sl":78,"name":"Nithora Mehrab","designation":"Sr. Officer - Public Partnership & Advocacy","project":"ASTHA","bed_category":"King Bed"}]},{"number":"526","category":"Twin-40","type":"Twin","members":[{"sl":79,"name":"Md. Tonmoy Hasan","designation":"Senior Officer, Business Administration","project":"PROGRESS","bed_category":"Twin Bed"},{"sl":80,"name":"Mohammad Nahidul Islam","designation":"Sr. Officer - Finance","project":"ASTHA","bed_category":"Twin Bed"}]},{"number":"902","category":"Twin-41","type":"Twin","members":[{"sl":81,"name":"Tutul Roy","designation":"Driver","project":"CoOf","bed_category":"King Bed"},{"sl":82,"name":"Nipu Hazra","designation":"Driver","project":"SAFE BD/CoOf","bed_category":"Extra Bed"}]},{"number":"802","category":"Twin-42","type":"Twin","members":[{"sl":83,"name":"Sayeda Zeenat Karim","designation":"Senior Officer, Programme","project":"PROGRESS","bed_category":"Twin Bed"},{"sl":84,"name":"Rabeya Khatun","designation":"Sr.Officer-Procurement & Logistics","project":"BYETS","bed_category":"Twin Bed"}]},{"number":"803","category":"Twin-43","type":"Twin","members":[{"sl":85,"name":"Azmul Huda","designation":"Manager, MRM and KEL","project":"InSPIRE","bed_category":"Twin Bed"},{"sl":86,"name":"Md. Marajul Islam","designation":"Coordinator, Programme","project":"PROGRESS","bed_category":"Twin Bed"}]},{"number":"804","category":"Twin-44","type":"Twin","members":[{"sl":87,"name":"Swopnil Louis Cruze","designation":"Officer - Partnership & Local Implementation","project":"SHOMPRITEE","bed_category":"Twin Bed"},{"sl":88,"name":"Nahin Ferdous","designation":"Senior Manager - Institutionalization & Advocacy","project":"PROGRESS","bed_category":"Twin Bed"}]},{"number":"704","category":"Twin-45","type":"Twin","members":[{"sl":89,"name":"Md. Rezaul Karim","designation":"Sr. Manager - Interventions Portfolio","project":"ASTHA","bed_category":"Twin Bed"},{"sl":90,"name":"Rabiul Islam","designation":"Manager - Business Administration","project":"CoOf","bed_category":"Twin Bed"}]},{"number":"525","category":"Twin-46","type":"Twin","members":[{"sl":91,"name":"Md. Asifur Rahaman","designation":"Coordinator - Procurement & Government Relations","project":"CoOf","bed_category":"King Bed"},{"sl":92,"name":"Liton Mazumder","designation":"Sr. Officer - ICT","project":"CoOf","bed_category":"Extra Bed"}]},{"number":"501","category":"Single-1","type":"Single","members":[{"sl":93,"name":"Mohammed Helal Hussain","designation":"Country Director","project":"CoOf","bed_category":"King Bed"}]},{"number":"212","category":"Single-2","type":"Single","members":[{"sl":94,"name":"Syeda Ishrat Fatema","designation":"Deputy Country Director","project":"CoOf","bed_category":"King Bed"}]},{"number":"522","category":"Single-3","type":"Single","members":[{"sl":95,"name":"Tamiz Uddin Mullick","designation":"Head of Business Administration","project":"CoOf","bed_category":"King Bed"}]},{"number":"221","category":"Single-4","type":"Single","members":[{"sl":96,"name":"Parvez Mohammed Asheque","designation":"Head of Programme","project":"CoOf","bed_category":"King Bed"}]},{"number":"601","category":"Single-5","type":"Single","members":[{"sl":97,"name":"Md. Alamgir Kabir","designation":"Business Development Advisor","project":"Global Office","bed_category":"King Bed"}]},{"number":"901","category":"Single-6","type":"Single","members":[{"sl":98,"name":"Mohammad Sakib Khaled","designation":"Head of Business Development","project":"CoOf","bed_category":"King Bed"}]},{"number":"801","category":"Single-7","type":"Single","members":[{"sl":99,"name":"Abdul Awal","designation":"Team Leader","project":"ASTHA & SAFE BD","bed_category":"King Bed"}]},{"number":"523","category":"Single-8","type":"Single","members":[{"sl":100,"name":"Nadia Afrin Shams","designation":"Team Leader","project":"BYETS & SMILE","bed_category":"King Bed"}]},{"number":"301","category":"Single-9","type":"Single","members":[{"sl":101,"name":"Rabeya Sultana","designation":"Corporate Budget Controller","project":"Regional Office","bed_category":"King Bed"}]},{"number":"422","category":"Single-10","type":"Single","members":[{"sl":102,"name":"Md. Makbul Hossain","designation":"Sr. Technical Advisor","project":"EARN","bed_category":"King Bed"}]},{"number":"421","category":"Single-11","type":"Single","members":[{"sl":103,"name":"Bidowra Tahmin Khan","designation":"Team Leader","project":"InSPIRE","bed_category":"King Bed"}]},{"number":"701","category":"Single-12","type":"Single","members":[{"sl":104,"name":"Farzana Amin","designation":"Team Leader","project":"PROGRESS & TRACE","bed_category":"King Bed"}]},{"number":"702","category":"Twin-47","type":"Twin","members":[{"sl":105,"name":"Jhorna Sangma","designation":"Office Assistant","project":"BYETS","bed_category":"Twin Bed"},{"sl":106,"name":"Laila Akther","designation":"Office Assistant","project":"ASTHA","bed_category":"Twin Bed"}]},{"number":"104","category":"Twin-48","type":"Twin","members":[{"sl":107,"name":"Md. Sydul Islam","designation":"Office Assistant","project":"PROGRESS","bed_category":"Twin Bed"},{"sl":108,"name":"Md Shahidul Islam","designation":"Driver","project":"SMILE","bed_category":"Twin Bed"}]},{"number":"109","category":"Twin-49","type":"Twin","members":[{"sl":109,"name":"Anika Noor","designation":"Manager – Pogramme Implementation","project":"SMILE","bed_category":"Twin Bed"},{"sl":110,"name":"Mehreen Adeeba Choudhury","designation":"Sr. Officer - Monitoring and Results Measurement & Communication","project":"SMILE","bed_category":"Twin Bed"}]},{"number":"103","category":"Twin-50","type":"Twin","members":[{"sl":111,"name":"Nahian Iftekhar Alam","designation":"Coordinator - Partnership & Innovation","project":"ASTHA","bed_category":"Twin Bed"},{"sl":112,"name":"Khairul Islam","designation":"Manager - Field Operations","project":"ASTHA","bed_category":"Twin Bed"}]},{"number":"102","category":"Twin-51","type":"Twin","members":[{"sl":113,"name":"Md. Mahfuzul Hauque","designation":"Community Engagement and Socio-Emotional Behavior Expert","project":"EARN","bed_category":"Twin Bed"},{"sl":114,"name":"Mohammad Mizanur Rahman","designation":"Community Engagement and Socio-Emotional Behavior Expert","project":"EARN","bed_category":"Twin Bed"}]},{"number":"602","category":"Twin-52","type":"Twin","members":[{"sl":115,"name":"Jocky Dewan","designation":"Gender and Social Norm Expert","project":"EARN","bed_category":"Twin Bed"},{"sl":116,"name":"Naznin Begum","designation":"Gender and Social Norm Expert","project":"EARN","bed_category":"Twin Bed"}]},{"number":"311","category":"Twin-53","type":"Twin","members":[{"sl":117,"name":"Monoj Kumar Roy","designation":"Consultant","project":"SAFE BD","bed_category":"King Bed"},{"sl":118,"name":"Reserved","designation":"","project":"","bed_category":""}]},{"number":"108","category":"Single-13","type":"Single","members":[{"sl":119,"name":"Sukanta Saha","designation":"Regional Corporate Project Accountant","project":"Regional Office","bed_category":"King Bed"}]},{"number":"312","category":"Single-14","type":"Single","members":[{"sl":120,"name":"Abul Basar","designation":"Team Leader","project":"SHOMPRITEE","bed_category":"King Bed"}]}]
ROOMS_JSON, true);

    $participants = collect($rooms)->flatMap(function ($room) {
        return collect($room['members'])->map(function ($member) use ($room) {
            return array_merge($member, [
                'room_number' => $room['number'],
                'room_category' => $room['category'],
                'room_type' => $room['type'],
            ]);
        });
    })->values();

    $twinRooms = collect($rooms)->where('type', 'Twin')->count();
    $singleRooms = collect($rooms)->where('type', 'Single')->count();
    $assignedPeople = $participants->where('name', '!=', 'Reserved')->count();
@endphp

<div class="mx-auto max-w-3xl space-y-8 px-4 py-6 sm:px-6">

    {{-- Header --}}
    <div class="flex items-center gap-3">
        <a href="{{ url()->previous() }}"
           class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-slate-600 transition hover:bg-slate-100 hover:text-[#00477A]"
           aria-label="Go back">
            <i class="fa-solid fa-arrow-left text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Room Allocation</h1>
            <p class="mt-1 text-sm text-slate-500">Swisscontact Bangladesh • Annual Retreat 2026</p>
        </div>
    </div>

    {{-- Introduction --}}
    <!-- <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5">
        <div class="flex items-start gap-4">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-[#00477A] shadow-sm">
                <i class="fa-solid fa-bed text-xl"></i>
            </div>
            <div>
                <h2 class="font-bold text-slate-900">Find your room</h2>
                <p class="mt-1 text-sm leading-6 text-slate-600">
                    Search by participant name or room number to find the assigned room, room category and bed category.
                </p>
            </div>
        </div>
    </section> -->

    {{-- Summary --}}
    <!-- <section class="grid grid-cols-3 gap-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs text-slate-500">Participants</p>
            <p class="mt-1 text-2xl font-bold text-slate-900">{{ $assignedPeople }}</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs text-slate-500">Twin rooms</p>
            <p class="mt-1 text-2xl font-bold text-slate-900">{{ $twinRooms }}</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-xs text-slate-500">Single rooms</p>
            <p class="mt-1 text-2xl font-bold text-slate-900">{{ $singleRooms }}</p>
        </div>
    </section> -->

    {{-- Quick Search --}}
    <section class="space-y-3">
        <div>
            <h2 class="font-bold text-slate-900">Quick room lookup</h2>
            <p class="mt-1 text-sm text-slate-500">Enter at least 3 letters of a name or a room number.</p>
        </div>

        <div class="flex w-full items-center gap-3 rounded-xl border border-slate-200 bg-white px-3 py-2">
            <span class="flex h-8 w-5 shrink-0 items-center justify-center text-slate-400" aria-hidden="true">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input id="room-search"
                   type="text"
                   autocomplete="off"
                   placeholder="Search participant or room number..."
                   class="!m-0 !min-w-0 !w-full !flex-1 !border-0 !bg-transparent !p-0 !text-sm !leading-8 !text-slate-900 !shadow-none !outline-none !ring-0 placeholder:!text-slate-400 focus:!border-0 focus:!outline-none focus:!ring-0"
                   style="border:0 !important; outline:none !important; box-shadow:none !important;">
            <button id="room-search-clear"
                    type="button"
                    class="hidden h-8 w-8 shrink-0 items-center justify-center rounded-full text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                    aria-label="Clear search">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="room-search-results" class="hidden space-y-3" aria-live="polite"></div>
    </section>

    {{-- Room Lists --}}
    <section class="space-y-4" id="room-allocation-list">
        <div class="flex items-center justify-between gap-3">
            <div>
                <h2 class="text-xl font-bold text-slate-900">All room allocations</h2>
                <p class="text-sm text-slate-500">Browse by room category.</p>
            </div>
            <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-[#00477A]">
                {{ count($rooms) }} rooms
            </span>
        </div>

        <div class="flex flex-wrap gap-2">
            <button type="button" data-room-filter="all" class="room-filter rounded-full bg-[#00477A] px-4 py-2 text-xs font-semibold text-white">All rooms</button>
            <button type="button" data-room-filter="Twin" class="room-filter rounded-full bg-slate-100 px-4 py-2 text-xs font-semibold text-slate-600">Twin rooms</button>
            <button type="button" data-room-filter="Single" class="room-filter rounded-full bg-slate-100 px-4 py-2 text-xs font-semibold text-slate-600">Single rooms</button>
        </div>

        <div id="room-cards" class="space-y-3">
            @foreach ($rooms as $room)
                <details class="room-card group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm"
                         data-room-type="{{ $room['type'] }}"
                         data-room-number="{{ $room['number'] }}"
                         data-room-category="{{ $room['category'] }}">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-4 hover:bg-slate-50 [&::-webkit-details-marker]:hidden">
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl {{ $room['type'] === 'Twin' ? 'bg-blue-50 text-[#00477A]' : 'bg-violet-50 text-violet-700' }}">
                                <i class="fa-solid {{ $room['type'] === 'Twin' ? 'fa-bed' : 'fa-bed-front' }} text-lg"></i>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-semibold text-slate-900">Room {{ $room['number'] }}</h3>
                                <p class="mt-1 text-xs text-slate-500">{{ $room['category'] }} · {{ $room['type'] }} room · {{ count($room['members']) }} {{ count($room['members']) === 1 ? 'occupant' : 'occupants' }}</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-down shrink-0 text-sm text-slate-400 transition-transform group-open:rotate-180"></i>
                    </summary>

                    <div class="space-y-3 border-t border-slate-100 p-4">
                        @foreach ($room['members'] as $member)
                            <div class="rounded-xl bg-slate-50 p-3"
                                 data-room-person
                                 data-person-name="{{ $member['name'] }}"
                                 data-person-designation="{{ $member['designation'] }}"
                                 data-person-project="{{ $member['project'] }}"
                                 data-person-bed="{{ $member['bed_category'] }}">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <p class="font-semibold text-slate-900">{{ $member['name'] }}</p>
                                        @if ($member['designation'])
                                            <p class="mt-1 text-xs leading-5 text-slate-500">{{ $member['designation'] }}</p>
                                        @endif
                                        @if ($member['project'])
                                            <p class="mt-1 text-xs text-slate-500">{{ $member['project'] }}</p>
                                        @endif
                                    </div>
                                    @if ($member['bed_category'])
                                        <span class="shrink-0 rounded-full bg-white px-2.5 py-1 text-[10px] font-semibold text-slate-600 ring-1 ring-slate-200">
                                            {{ $member['bed_category'] }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </details>
            @endforeach
        </div>
    </section>

    <p class="text-xs leading-5 text-slate-400">
        Room assignments are displayed according to the supplied Room Allocation – Retreat 2026 document. Reserved entries are retained as shown in the source.
    </p>
</div>

@include('components.bottom-nav')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('room-search');
    const clear = document.getElementById('room-search-clear');
    const results = document.getElementById('room-search-results');
    const roomList = document.getElementById('room-allocation-list');
    const roomCards = Array.from(document.querySelectorAll('.room-card'));
    const filters = Array.from(document.querySelectorAll('.room-filter'));

    if (!input || !clear || !results || !roomList) return;

    const escapeHtml = value => String(value ?? '').replace(/[&<>"']/g, char => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;'
    })[char]);

    function searchRooms() {
        const query = input.value.trim().toLocaleLowerCase();
        clear.classList.toggle('hidden', !query);

        if (query.length < 3) {
            results.classList.add('hidden');
            results.innerHTML = '';
            roomList.classList.remove('hidden');
            return;
        }

        const matches = [];
        document.querySelectorAll('[data-room-person]').forEach(person => {
            const name = person.dataset.personName || '';
            const designation = person.dataset.personDesignation || '';
            const project = person.dataset.personProject || '';
            const card = person.closest('.room-card');
            const roomNumber = card?.dataset.roomNumber || '';
            const roomCategory = card?.dataset.roomCategory || '';
            const haystack = `${name} ${designation} ${project} ${roomNumber} ${roomCategory}`.toLocaleLowerCase();

            if (haystack.includes(query)) {
                matches.push({
                    name, designation, project,
                    bed: person.dataset.personBed || '',
                    roomNumber, roomCategory,
                    roomType: card?.dataset.roomType || '',
                    isReserved: name.toLocaleLowerCase() === 'reserved'
                });
            }
        });

        matches.sort((a, b) => {
            const aStarts = a.name.toLocaleLowerCase().startsWith(query) ? 0 : 1;
            const bStarts = b.name.toLocaleLowerCase().startsWith(query) ? 0 : 1;
            return aStarts - bStarts || a.name.localeCompare(b.name);
        });

        roomList.classList.add('hidden');
        results.classList.remove('hidden');

        if (!matches.length) {
            results.innerHTML = '<p class="rounded-xl border border-slate-200 bg-white p-4 text-sm text-slate-500">No matching participant or room found.</p>';
            return;
        }

        results.innerHTML = `
            <p class="text-xs font-medium text-slate-500">${matches.length} matching result${matches.length === 1 ? '' : 's'}</p>
            ${matches.map(item => `
                <article class="rounded-2xl border border-blue-100 bg-white p-4 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0">
                            <h3 class="font-bold text-slate-900">${escapeHtml(item.name)}</h3>
                            ${item.designation ? `<p class="mt-1 text-xs text-slate-500">${escapeHtml(item.designation)}</p>` : ''}
                            ${item.project ? `<p class="mt-1 text-xs text-slate-500">${escapeHtml(item.project)}</p>` : ''}
                        </div>
                        <div class="shrink-0 text-right">
                            <p class="font-bold text-[#00477A]">Room ${escapeHtml(item.roomNumber)}</p>
                            <p class="mt-1 text-xs text-slate-500">${escapeHtml(item.roomCategory)}</p>
                        </div>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-2">
                        ${item.bed ? `<span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-[#00477A]">${escapeHtml(item.bed)}</span>` : ''}
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600">${escapeHtml(item.roomType)} room</span>
                    </div>
                </article>
            `).join('')}
        `;
    }

    input.addEventListener('input', searchRooms);

    clear.addEventListener('click', function () {
        input.value = '';
        searchRooms();
        input.focus();
    });

    filters.forEach(button => {
        button.addEventListener('click', function () {
            const selected = button.dataset.roomFilter;
            filters.forEach(filter => {
                const active = filter === button;
                filter.classList.toggle('bg-[#00477A]', active);
                filter.classList.toggle('text-white', active);
                filter.classList.toggle('bg-slate-100', !active);
                filter.classList.toggle('text-slate-600', !active);
            });

            roomCards.forEach(card => {
                card.classList.toggle('hidden', selected !== 'all' && card.dataset.roomType !== selected);
            });
        });
    });
});
</script>

@endsection
