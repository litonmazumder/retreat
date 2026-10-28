@extends('layouts.admin')

@section('title', 'Attendance')

@section('content')

<script src="https://cdn.sheetjs.com/xlsx-0.20.3/package/dist/xlsx.full.min.js"></script>

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Attendance
            </h1>

            <p class="mt-1 text-slate-500">
                Total Participants: {{ $participants->total() }}
            </p>

        </div>

    </div>

    <a
        href="{{ route('admin.attendance.export') }}"
        class="inline-flex items-center gap-2 rounded-xl bg-[#00477A] px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#00385F]"
    >
        <i class="fa-solid fa-file-excel"></i>
        Export Attendance
    </a>

    {{-- Table --}}
    <div class="overflow-hidden rounded-2xl bg-white shadow">

        <table class="min-w-full">

            <thead class="bg-slate-50">

                <tr class="text-left text-sm font-semibold text-slate-600">

                    <th class="px-6 py-4">#</th>

                    <th class="px-6 py-4">Participant</th>

                    <th class="px-6 py-4">Country</th>

                    <th class="px-6 py-4 text-center">Day 1</th>

                    <th class="px-6 py-4 text-center">Day 2</th>

                    <th class="px-6 py-4 text-center">Attendance</th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-100">

                @forelse($participants as $participant)

                    @php

                        $day1 = $participant->attendances->firstWhere('day',1);

                        $day2 = $participant->attendances->firstWhere('day',2);

                        $total = collect([$day1,$day2])->filter()->count();

                        $percentage = ($total / 2) * 100;

                    @endphp

                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4">

                            {{ $loop->iteration + ($participants->currentPage()-1) * $participants->perPage() }}

                        </td>

                        <td class="px-6 py-4">

                            <div class="font-semibold text-slate-800">

                                {{ $participant->first_name }}
                                {{ $participant->last_name }}

                            </div>

                            <div class="text-sm text-slate-500">

                                {{ $participant->designation }}

                            </div>

                        </td>

                        <td class="px-6 py-4">

                            {{ $participant->region }}

                        </td>

                        {{-- Day 1 --}}
                        <td class="px-6 py-4 text-center">

                            @if($day1)

                                <div class="inline-flex flex-col items-center">

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                        Present

                                    </span>

                                    <span class="mt-1 text-xs text-slate-500">

                                        {{ \Carbon\Carbon::parse($day1->checked_in_at)->format('H:i') }}

                                    </span>

                                </div>

                            @else

                                <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                    Absent

                                </span>

                            @endif

                        </td>

                        {{-- Day 2 --}}
                        <td class="px-6 py-4 text-center">

                            @if($day2)

                                <div class="inline-flex flex-col items-center">

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                        Present

                                    </span>

                                    <span class="mt-1 text-xs text-slate-500">

                                        {{ \Carbon\Carbon::parse($day2->checked_in_at)->format('H:i') }}

                                    </span>

                                </div>

                            @else

                                <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                    Absent

                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-4 text-center">

                            <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-semibold text-[#00477A]">

                                {{ $percentage }}%

                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-10 text-center text-slate-500">

                            No attendance records found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{ $participants->links() }}

</div>

<script>
function exportAttendance() {

    const table = document.querySelector('table');

    if (!table) {
        alert('Attendance table not found.');
        return;
    }

    const workbook = XLSX.utils.table_to_book(
        table,
        {
            sheet: 'Attendance'
        }
    );

    XLSX.writeFile(
        workbook,
        'attendance-report.xlsx'
    );
}
</script>

@endsection