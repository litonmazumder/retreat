@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-50 px-8 py-8 xl:px-12">
    {{-- Page header --}}
    <div class="mb-7 flex items-center justify-between gap-6">
        <div>
            <a href="{{ route('carnival.assignments.index') }}"
               class="mb-3 inline-flex items-center gap-2 text-sm font-medium text-[#00477A] hover:underline">
                &larr; Back to assignments
            </a>

            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Assign Carnival Activities
            </h1>
            <p class="mt-2 text-sm text-gray-500">
                Select one activity for each wave.
            </p>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white px-5 py-3 shadow-sm">
            <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                Waves assigned
            </p>
            <p class="mt-1 text-2xl font-bold text-[#00477A]">
                <span id="selected-count">0</span>
                <span class="text-base font-medium text-gray-400">/ 2</span>
            </p>
        </div>
    </div>

    {{-- Participant details --}}
    <div class="mb-7 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
        <div class="flex items-start justify-between gap-6">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                    Participant Information
                </p>
                <h2 class="text-xl font-bold text-gray-900">
                    {{ $participant->first_name }} {{ $participant->last_name }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">{{ $participant->email }}</p>
            </div>

            <div class="text-right">
                <p class="text-xs text-gray-500">Project</p>
                <p class="mt-1 font-semibold text-gray-900">
                    {{ $participant->project_name ?: 'Not specified' }}
                </p>
                <p class="mt-1 text-sm text-gray-500">
                    {{ $participant->designation ?: '' }}
                </p>
            </div>
        </div>
    </div>

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5">
            <p class="font-semibold text-red-800">Please correct the following:</p>
            <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Activity assignment form --}}
    <form method="POST"
          action="{{ route('carnival.assignments.update', $participant) }}"
          id="assignment-form">
        @csrf
        @method('PUT')

        <div class="mb-4 flex items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Choose Activities by Wave</h2>
                <p class="mt-1 text-sm text-gray-500">
                    Choose two different activities: one for each wave.
                </p>
            </div>

            <span class="rounded-lg bg-blue-50 px-4 py-2 text-sm font-medium text-[#00477A]">
                Two activities per participant
            </span>
        </div>

        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
            {{-- Wave 1 --}}
            <section class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="mb-5 flex items-start gap-4">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#00477A]">
                        <i class="fa-solid fa-clock text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Wave 1</h3>
                        <p class="mt-1 text-sm font-medium text-[#00477A]">
                            10:00 AM – 10:40 AM
                        </p>
                        <p class="mt-1 text-sm text-gray-500">
                            Select the participant's first activity.
                        </p>
                    </div>
                </div>

                <label for="wave_1" class="mb-2 block text-sm font-semibold text-gray-700">
                    Activity
                </label>
                <select
                    id="wave_1"
                    name="wave_1"
                    required
                    class="w-full rounded-lg border-gray-300 py-3 text-gray-800 focus:border-[#00477A] focus:ring-[#00477A]"
                >
                    <option value="">Select a Wave 1 activity</option>
                    @foreach ($activities as $activity)
                        <option
                            value="{{ $activity->id }}"
                            @selected((string) old('wave_1', $assignedByWave['wave_1'] ?? '') === (string) $activity->id)
                        >
                            {{ $activity->name }}
                        </option>
                    @endforeach
                </select>
                @error('wave_1')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </section>

            {{-- Wave 2 --}}
            <section class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="mb-5 flex items-start gap-4">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#00477A]">
                        <i class="fa-solid fa-clock text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Wave 2</h3>
                        <p class="mt-1 text-sm font-medium text-[#00477A]">
                            11:00 AM – 11:40 AM
                        </p>
                        <p class="mt-1 text-sm text-gray-500">
                            Select the participant's second activity.
                        </p>
                    </div>
                </div>

                <label for="wave_2" class="mb-2 block text-sm font-semibold text-gray-700">
                    Activity
                </label>
                <select
                    id="wave_2"
                    name="wave_2"
                    required
                    class="w-full rounded-lg border-gray-300 py-3 text-gray-800 focus:border-[#00477A] focus:ring-[#00477A]"
                >
                    <option value="">Select a Wave 2 activity</option>
                    @foreach ($activities as $activity)
                        <option
                            value="{{ $activity->id }}"
                            @selected((string) old('wave_2', $assignedByWave['wave_2'] ?? '') === (string) $activity->id)
                        >
                            {{ $activity->name }}
                        </option>
                    @endforeach
                </select>
                @error('wave_2')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </section>
        </div>

        {{-- Bottom action bar --}}
        <div class="mt-8 flex flex-col gap-4 rounded-xl border border-gray-200 bg-white px-6 py-5 shadow-sm sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="font-semibold text-gray-900">Assignment summary</p>
                <p id="selection-message" class="mt-1 text-sm text-gray-500" aria-live="polite">
                    Select one activity for each wave.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('carnival.assignments.index') }}"
                   class="rounded-lg border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                    Cancel
                </a>

                <button
                    type="submit"
                    id="save-button"
                    disabled
                    class="rounded-lg bg-[#00477A] px-7 py-3 text-sm font-semibold text-white shadow-sm hover:bg-[#00365d] disabled:cursor-not-allowed disabled:opacity-40">
                    Save Assignments
                </button>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const wave1 = document.getElementById('wave_1');
    const wave2 = document.getElementById('wave_2');
    const countElement = document.getElementById('selected-count');
    const saveButton = document.getElementById('save-button');
    const message = document.getElementById('selection-message');
    const form = document.getElementById('assignment-form');

    function updateSelection() {
        const wave1Selected = wave1.value !== '';
        const wave2Selected = wave2.value !== '';
        const bothSelected = wave1Selected && wave2Selected;
        const duplicateSelected = bothSelected && wave1.value === wave2.value;

        countElement.textContent = Number(wave1Selected) + Number(wave2Selected);
        saveButton.disabled = !bothSelected || duplicateSelected;

        if (duplicateSelected) {
            message.textContent = 'Choose two different activities for the two waves.';
            message.className = 'mt-1 text-sm text-red-600';
        } else if (bothSelected) {
            message.textContent = 'Both waves have activities assigned. Ready to save.';
            message.className = 'mt-1 text-sm text-green-700';
        } else {
            message.textContent = 'Select one activity for each wave.';
            message.className = 'mt-1 text-sm text-gray-500';
        }

        // Prevent choosing the same activity in both waves.
        Array.from(wave1.options).forEach(option => {
            if (option.value !== '') {
                option.disabled = wave2Selected && option.value === wave2.value;
            }
        });

        Array.from(wave2.options).forEach(option => {
            if (option.value !== '') {
                option.disabled = wave1Selected && option.value === wave1.value;
            }
        });

        // Keep the current selection enabled in its own dropdown.
        if (wave1.value) {
            const currentWave1Option = Array.from(wave1.options).find(option => option.value === wave1.value);
            if (currentWave1Option) currentWave1Option.disabled = false;
        }
        if (wave2.value) {
            const currentWave2Option = Array.from(wave2.options).find(option => option.value === wave2.value);
            if (currentWave2Option) currentWave2Option.disabled = false;
        }
    }

    wave1.addEventListener('change', updateSelection);
    wave2.addEventListener('change', updateSelection);

    form.addEventListener('submit', function (event) {
        if (!wave1.value || !wave2.value || wave1.value === wave2.value) {
            event.preventDefault();
            alert('Please select two different activities, one for each wave.');
        }
    });

    updateSelection();
});
</script>
@endsection
