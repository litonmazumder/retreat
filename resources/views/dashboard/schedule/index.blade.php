<div class="space-y-6">

    {{-- Day Tabs --}}
    @include('components.day-tabs')

    <div x-show="day === 1" x-cloak>
        @include('participant.schedule.day1')
    </div>

    <div x-show="day === 2" x-cloak>
        @include('participant.schedule.day2')
    </div>

    <div x-show="day === 3" x-cloak>
        @include('participant.schedule.day3')
    </div>

</div>