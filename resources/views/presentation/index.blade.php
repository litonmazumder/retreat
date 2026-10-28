@extends('layouts.app')

@section('title', 'Presentations')

@section('content')

<div class="mx-auto max-w-7xl px-6 py-10">

    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-4xl font-bold text-[#00477A]">
                Presentation Dashboard
            </h1>

            <p class="mt-2 text-slate-500">
                Asia Seminar 2026
            </p>

        </div>

    </div>

    <div class="mt-10 overflow-hidden rounded-3xl bg-white shadow">

        <table class="min-w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Time
                    </th>

                    <th class="px-6 py-4 text-left">
                        Session
                    </th>

                    <th class="px-6 py-4 text-left">
                        Speaker
                    </th>

                    <th class="px-6 py-4 text-left">
                        File
                    </th>

                    <th class="px-6 py-4 text-center">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($presentations as $presentation)

                <tr class="border-t">

                    <td class="px-6 py-5">

                        {{ \Carbon\Carbon::parse($presentation->eventSession->start_time)->format('h:i A') }}

                    </td>

                    <td class="px-6 py-5 font-semibold">

                        {{ $presentation->eventSession->title }}

                    </td>

                    <td class="px-6 py-5">

                        {{ optional($presentation->eventSession->speaker)->first_name }}
                        {{ optional($presentation->eventSession->speaker)->last_name }}

                    </td>

                    <td class="px-6 py-5">

                        {{ $presentation->file_name }}

                    </td>

                    <td class="px-6 py-5 text-center">

                        <a
                            href="{{ route('presentations.show', $presentation) }}"
                            target="_blank"
                            class="inline-flex rounded-xl bg-[#00477A] px-5 py-3 font-semibold text-white hover:bg-[#003760]">

                            ▶ Present

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="py-10 text-center text-slate-500">

                        No presentations uploaded.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection