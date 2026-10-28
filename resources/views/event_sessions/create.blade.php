@extends('layouts.app')

@section('title', 'Create Event Session')

@section('content')

<div class="mx-auto max-w-5xl">

    <div class="rounded-3xl bg-white shadow-xl border border-slate-200 overflow-hidden">

        <!-- Header -->

        <div class="bg-[#00477A] px-8 py-8">

            <h1 class="text-3xl font-bold text-white">

                Create Event Session

            </h1>

            <p class="mt-2 text-blue-100">

                Create a seminar session and assign a speaker.

            </p>

        </div>

        <form
            action="{{ route('event-sessions.store') }}"
            method="POST"
            class="p-8 space-y-8">

            @csrf

            <!-- Event -->

            <div>

                <label class="block font-semibold text-slate-700">

                    Event

                </label>

                <select
                    name="event_id"
                    class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3">

                    @foreach($events as $event)

                        <option value="{{ $event->id }}">

                            {{ $event->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Title -->

            <div>

                <label class="block font-semibold text-slate-700">

                    Session Title

                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3"
                    placeholder="AI for Inclusive Development">

            </div>

            <!-- Speaker -->

            <div>

                <label class="block font-semibold text-slate-700">

                    Speaker

                </label>

                <select
                    name="participant_id"
                    class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3">

                    <option value="">

                        -- Select Speaker --

                    </option>

                    @foreach($participants as $participant)

                        <option value="{{ $participant->id }}">

                            {{ $participant->first_name }}
                            {{ $participant->last_name }}

                            ({{ $participant->country }})

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Venue -->

            <div>

                <label class="block font-semibold text-slate-700">

                    Venue

                </label>

                <input
                    type="text"
                    name="venue"
                    value="{{ old('venue') }}"
                    class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3"
                    placeholder="Main Hall">

            </div>

            <!-- Day -->

            <div>

                <label class="block font-semibold text-slate-700">

                    Seminar Day

                </label>

                <select
                    name="day"
                    class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3">

                    <option value="1">

                        Day 1

                    </option>

                    <option value="2">

                        Day 2

                    </option>

                </select>

            </div>

            <!-- Date & Time -->

            <div class="grid gap-6 md:grid-cols-3">

                <div>

                    <label class="block font-semibold text-slate-700">

                        Session Date

                    </label>

                    <input
                        type="date"
                        name="session_date"
                        class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3">

                </div>

                <div>

                    <label class="block font-semibold text-slate-700">

                        Start Time

                    </label>

                    <input
                        type="time"
                        name="start_time"
                        class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3">

                </div>

                <div>

                    <label class="block font-semibold text-slate-700">

                        End Time

                    </label>

                    <input
                        type="time"
                        name="end_time"
                        class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3">

                </div>

            </div>

            <!-- Type -->

            <div>

                <label class="block font-semibold text-slate-700">

                    Session Type

                </label>

                <select
                    name="type"
                    class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3">

                    <option value="opening">Opening Ceremony</option>

                    <option value="keynote">Keynote</option>

                    <option value="presentation">Presentation</option>

                    <option value="panel">Panel Discussion</option>

                    <option value="break">Coffee / Lunch Break</option>

                    <option value="closing">Closing Ceremony</option>

                </select>

            </div>

            <!-- Description -->

            <div>

                <label class="block font-semibold text-slate-700">

                    Description

                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3"
                    placeholder="Optional session description...">{{ old('description') }}</textarea>

            </div>

            <!-- Sort Order -->

            <div>

                <label class="block font-semibold text-slate-700">

                    Display Order

                </label>

                <input
                    type="number"
                    name="sort_order"
                    value="1"
                    min="1"
                    class="mt-2 w-40 rounded-xl border border-slate-300 px-4 py-3">

            </div>

            <!-- Buttons -->

            <div class="flex justify-end gap-4 pt-6 border-t">

                <a
                    href="{{ route('event-sessions.index') }}"
                    class="rounded-xl border border-slate-300 px-8 py-3">

                    Cancel

                </a>

                <button
                    class="rounded-xl bg-[#00477A] px-10 py-3 font-semibold text-white hover:bg-[#00365f]">

                    Save Session

                </button>

            </div>

        </form>

    </div>

</div>

@endsection