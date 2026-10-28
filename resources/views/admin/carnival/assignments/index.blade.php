@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-50 px-8 py-8 xl:px-12">

    {{-- Header --}}
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Carnival Activity Assignments
            </h1>
            <p class="mt-2 text-sm text-gray-500">
                Manage activity allocations for Retreat 2026 participants.
            </p>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white px-5 py-3 shadow-sm">
            <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                Total Participants
            </p>
            <p class="mt-1 text-2xl font-bold text-[#00477A]">
                {{ $participants->total() }}
            </p>
        </div>
    </div>

    {{-- Success message --}}
    @if (session('success'))
        <div class="mb-6 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-800">
            <span class="font-semibold">Success</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Summary cards --}}
    <!-- <div class="mb-7 grid grid-cols-3 gap-5">
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-gray-500">Participants in results</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{ $participants->count() }}
            </p>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-gray-500">Assigned in results</p>
            <p class="mt-2 text-3xl font-bold text-green-700">
                {{ $participants->getCollection()->filter(fn ($p) => $p->carnivalActivities->count() === 2)->count() }}
            </p>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-gray-500">Not fully assigned in results</p>
            <p class="mt-2 text-3xl font-bold text-amber-600">
                {{ $participants->getCollection()->filter(fn ($p) => $p->carnivalActivities->count() !== 2)->count() }}
            </p>
        </div>
    </div> -->

{{-- Activity Assignment Counts --}}
<div class="mb-8">
    <div class="mb-4">
        <h2 class="text-lg font-bold text-gray-900">
            Activity Assignment Overview
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            Number of participants assigned to each activity.
        </p>
    </div>

    <div class="grid grid-cols-3 gap-5">
        @foreach ($activities as $activity)
            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition hover:border-blue-200 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            {{ $activity->name }}
                        </p>

                        <p class="mt-3 text-4xl font-bold text-[#00477A]">
                            {{ $activity->assigned_participants_count }}
                        </p>

                        <p class="mt-2 text-sm text-gray-500">
                            {{ $activity->assigned_participants_count === 1
                                ? 'participant assigned'
                                : 'participants assigned' }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-blue-50 text-[#00477A]">
                        <i class="fa-solid fa-users text-lg"></i>
                    </div>
                </div>

                <div class="mt-5 border-t border-gray-100 pt-4">
                    <span class="text-xs font-medium uppercase tracking-wide text-gray-500">
                        {{ $activity->type ?? 'Activity' }}
                    </span>

                    @if ($activity->facilitators)
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $activity->facilitators }}
                        </p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>


    {{-- Search and filters --}}
    <div class="mb-6 rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
        <form method="GET"
              action="{{ route('carnival.assignments.index') }}"
              class="flex items-end gap-4">

            <div class="w-full max-w-xl">
                <label for="search" class="mb-2 block text-sm font-semibold text-gray-700">
                    Search participant
                </label>
                <input
                    id="search"
                    type="search"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search by name or email address..."
                    class="w-full rounded-lg border-gray-300 px-4 py-3 text-sm shadow-sm focus:border-[#00477A] focus:ring-[#00477A]"
                >
            </div>

            <button type="submit"
                    class="rounded-lg bg-[#00477A] px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-[#00365d]">
                Search
            </button>

            <a href="{{ route('carnival.assignments.index') }}"
               class="rounded-lg border border-gray-300 bg-white px-6 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                Reset
            </a>

            <div class="ml-auto pb-3 text-sm text-gray-500">
                Showing {{ $participants->firstItem() ?? 0 }}–{{ $participants->lastItem() ?? 0 }}
                of {{ $participants->total() }}
            </div>
        </form>
    </div>

    {{-- Participant table --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="border-b border-gray-200 px-6 py-5">
            <h2 class="text-lg font-semibold text-gray-900">
                Participant Directory
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Assign two activities to each participant.
            </p>
        </div>

        <table class="w-full table-fixed divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="w-[30%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Participant
                    </th>
                    <th class="w-[18%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Project
                    </th>
                    <th class="w-[34%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Assigned Activities
                    </th>
                    <th class="w-[10%] px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Status
                    </th>
                    <th class="w-[8%] px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse ($participants as $participant)
                    @php
                        $assignedCount = $participant->carnivalActivities->count();
                    @endphp

                    <tr class="transition hover:bg-gray-50">
                        <td class="px-6 py-5">
                            <div class="font-semibold text-gray-900">
                                {{ $participant->first_name }} {{ $participant->last_name }}
                            </div>
                            <div class="mt-1 truncate text-sm text-gray-500">
                                {{ $participant->email }}
                            </div>
                        </td>

                        <td class="px-6 py-5 text-sm text-gray-700">
                            {{ $participant->project_name ?: '—' }}
                        </td>

                        <td class="px-6 py-5">
                            @forelse ($participant->carnivalActivities as $activity)
                                <span class="mb-1 mr-1 inline-flex rounded-md border border-blue-100 bg-blue-50 px-2.5 py-1 text-xs font-medium text-[#00477A]">
                                    {{ $activity->name }}
                                </span>
                            @empty
                                <span class="text-sm italic text-gray-400">
                                    No activities assigned
                                </span>
                            @endforelse
                        </td>

                        <td class="px-6 py-5 text-center">
                            @if ($assignedCount === 2)
                                <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                    Complete
                                </span>
                            @elseif ($assignedCount === 0)
                                <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                    Pending
                                </span>
                            @else
                                <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">
                                    Incomplete
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-5 text-right">
                            <a href="{{ route('carnival.assignments.edit', $participant) }}"
                               class="inline-flex items-center justify-center rounded-lg bg-[#00477A] px-4 py-2 text-xs font-semibold text-white hover:bg-[#00365d]">
                                {{ $assignedCount === 2 ? 'Edit' : 'Assign' }}
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <p class="text-base font-medium text-gray-700">
                                No participants found
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                Try another name or email address.
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="flex items-center justify-between border-t border-gray-200 px-6 py-4">
            <p class="text-sm text-gray-500">
                Page {{ $participants->currentPage() }} of {{ $participants->lastPage() }}
            </p>
            {{ $participants->links() }}
        </div>
    </div>

</div>
@endsection