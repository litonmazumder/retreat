
@props([
    'wave' => null,
    'startTime' => null,
    'endTime' => null,
    'showDate' => false,
    'showWave' => true,
])

@if ($startTime && $endTime)
    @php
        $start = \Illuminate\Support\Carbon::parse($startTime);
        $end = \Illuminate\Support\Carbon::parse($endTime);
    @endphp

    @if ($showDate)
        <p class="text-xs text-slate-500">Date</p>
        <p class="mt-1 font-medium text-slate-800">
            {{ $start->format('d F Y') }}
        </p>
    @endif

    @if ($showWave && $wave)
        <p class="text-xs text-slate-500 {{ $showDate ? 'mt-2' : '' }}">
            {{ str_replace('_', ' ', ucfirst($wave)) }}
        </p>
    @endif

    <p class="mt-1 font-medium text-slate-800">
        {{ $start->format('h:i A') }} – {{ $end->format('h:i A') }}
    </p>
@else
    <p class="text-sm text-slate-500">Schedule not available.</p>
@endif
