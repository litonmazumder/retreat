@extends('layouts.admin')

@section('title','Participants')

@section('content')

<div class="space-y-6">

<div class="flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Participants
            </h1>

            <p class="mt-1 text-slate-500">
                Total: {{ $participants->total() }}
            </p>
        </div>

        <a
            href="{{ route('admin.participants.create') }}"
            class="rounded-xl bg-[#00477A] px-5 py-3 font-medium text-white transition hover:bg-[#00345C]">

            <i class="fa-solid fa-plus mr-2"></i>

            Add Participant

        </a>

    </div>

    </div>

    <div class="overflow-hidden rounded-2xl bg-white shadow">

        <table class="min-w-full">

            <thead class="bg-slate-50">

                <tr class="text-left text-sm font-semibold text-slate-600">

                    <th class="px-6 py-4">#</th>
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Designation</th>
                    <th class="px-6 py-4">Region</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Action</th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-100">

                @forelse($participants as $participant)

                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4">
                            {{ $loop->iteration + ($participants->currentPage()-1) * $participants->perPage() }}
                        </td>

                        <td class="px-6 py-4">

                            <div class="font-semibold text-slate-800">
                                {{ $participant->first_name }}
                                {{ $participant->last_name }}
                            </div>

                        </td>

                        <td class="px-6 py-4">
                            {{ $participant->designation }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $participant->region }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $participant->email }}
                        </td>

                        <td class="px-6 py-4">

                            @if($participant->profile_confirmed)

                                <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                    Verified
                                </span>

                            @else

                                <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                    Pending
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-4 text-right">

                            <a
                                href="#"
                                class="rounded-lg bg-[#00477A] px-4 py-2 text-sm text-white hover:bg-[#00345C]">

                                View

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="px-6 py-10 text-center text-slate-500">

                            No participants found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{ $participants->links() }}

</div>

@endsection