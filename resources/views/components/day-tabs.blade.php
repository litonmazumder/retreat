<div class="grid grid-cols-3 gap-2 rounded-2xl bg-slate-100 p-1">

    <button
        @click="day = 1"
        class="rounded-xl py-2 text-sm font-medium"
        :class="day === 1 ? 'bg-[#00477A] text-white' : 'text-slate-600'">
        Day 1
    </button>

    <button
        @click="day = 2"
        class="rounded-xl py-2 text-sm font-medium"
        :class="day === 2 ? 'bg-[#00477A] text-white' : 'text-slate-600'">
        Day 2
    </button>

    <button
        @click="day = 3"
        class="rounded-xl py-2 text-sm font-medium"
        :class="day === 3 ? 'bg-[#00477A] text-white' : 'text-slate-600'">
        Day 3
    </button>

</div>