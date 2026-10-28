@extends('layouts.dashboard')

@section('content')

<div
    x-data="feedbackParticipant()"
    x-init="startPolling()"
    class="min-h-screen bg-slate-100 px-5 py-6">

    {{-- =========================
        WAITING
    ========================== --}}

    <template x-if="status === 'Waiting'">

        <div class="flex min-h-[70vh] items-center justify-center">

            <div class="w-full max-w-md text-center">

                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-blue-100">

                    <i class="fa-solid fa-comments text-3xl text-[#00477A]"></i>

                </div>

                <h1 class="mt-6 text-2xl font-bold text-slate-800">
                    Get Ready
                </h1>

                <p class="mt-3 text-sm leading-6 text-slate-500">

                    The facilitator will start the
                    feedback session shortly.

                </p>

                <div class="mt-8 flex items-center justify-center gap-2 text-sm text-slate-400">

                    <span class="h-2 w-2 animate-pulse rounded-full bg-[#00477A]"></span>

                    Waiting...

                </div>

            </div>

        </div>

    </template>


    {{-- =========================
        QUESTION
    ========================== --}}

    <template x-if="status === 'Live'">

        <div class="mx-auto max-w-md">

            {{-- Question counter --}}
            <div class="mb-5 flex items-center justify-between">

                <span class="text-sm font-semibold text-[#00477A]">

                    Question
                    <span x-text="questionNumber"></span>
                    /
                    <span x-text="totalQuestions"></span>

                </span>

                <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-500 shadow-sm">

                    <span x-text="responseCount"></span>
                    responses

                </span>

            </div>


            {{-- Question Card --}}
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

                <p
                    class="text-xs font-semibold uppercase tracking-widest text-slate-400"
                    x-text="questionType">
                </p>

                <h1
                    class="mt-4 text-xl font-bold leading-8 text-slate-800"
                    x-text="questionTitle">
                </h1>

                <p
                    x-show="instruction"
                    class="mt-3 text-sm leading-6 text-slate-500"
                    x-text="instruction">
                </p>


                {{-- =========================
                    RATING
                ========================== --}}

                <template x-if="questionType === 'rating'">

                    <div class="mt-8">

                        <div class="flex justify-center gap-2">

                            <template x-for="star in 5" :key="star">

                                <button
                                    type="button"
                                    @click="selectedRating = star"
                                    class="flex h-12 w-12 items-center justify-center rounded-xl transition"
                                    :class="selectedRating >= star
                                        ? 'bg-yellow-100 text-yellow-500'
                                        : 'bg-slate-100 text-slate-300'">

                                    <i class="fa-solid fa-star text-xl"></i>

                                </button>

                            </template>

                        </div>

                    </div>

                </template>


                {{-- =========================
                    SINGLE CHOICE
                ========================== --}}

                <template x-if="questionType === 'single choice'">

                    <div class="mt-8 space-y-3">

                        <template x-for="option in options" :key="option.id">

                            <button
                                type="button"
                                @click="selectedOption = option.id"
                                class="w-full rounded-2xl border p-4 text-left font-medium transition"
                                :class="selectedOption == option.id
                                    ? 'border-[#00477A] bg-blue-50 text-[#00477A]'
                                    : 'border-slate-200 bg-white text-slate-700 hover:bg-slate-50'">

                                <span
                                    class="mr-3 inline-flex h-7 w-7 items-center justify-center rounded-full bg-slate-100 text-xs"
                                    x-text="option.position">
                                </span>

                                <span x-text="option.title"></span>

                            </button>

                        </template>

                    </div>

                </template>


                {{-- =========================
                    TEXT
                ========================== --}}

                <template x-if="questionType === 'short text' || questionType === 'long text'">

                    <div class="mt-8">

                        <textarea
                            x-model="textAnswer"
                            rows="5"
                            maxlength="1000"
                            placeholder="Type your answer..."
                            class="w-full rounded-2xl border border-slate-300 px-4 py-4 text-sm outline-none transition focus:border-[#00477A] focus:ring-2 focus:ring-blue-100"></textarea>

                        <div class="mt-2 text-right text-xs text-slate-400">

                            <span x-text="textAnswer.length"></span>
                            / 1000

                        </div>

                    </div>

                </template>


                {{-- Submit --}}
                <button
                    type="button"
                    @click="submitAnswer()"
                    :disabled="submitting || submitted"
                    class="mt-8 w-full rounded-2xl bg-[#00477A] py-4 font-semibold text-white transition hover:bg-[#00375f] disabled:cursor-not-allowed disabled:opacity-50">

                    <template x-if="!submitting && !submitted">

                        <span>

                            <i class="fa-solid fa-paper-plane mr-2"></i>

                            Submit Answer

                        </span>

                    </template>

                    <template x-if="submitting">

                        <span>

                            <i class="fa-solid fa-spinner mr-2 animate-spin"></i>

                            Submitting...

                        </span>

                    </template>

                    <template x-if="submitted">

                        <span>

                            <i class="fa-solid fa-circle-check mr-2"></i>

                            Answer Submitted

                        </span>

                    </template>

                </button>

            </div>


            {{-- Waiting after submission --}}
            <template x-if="submitted">

                <div class="mt-4 rounded-2xl border border-green-200 bg-green-50 p-4 text-center">

                    <i class="fa-solid fa-circle-check text-green-600"></i>

                    <p class="mt-1 text-sm font-semibold text-green-700">

                        Your response has been recorded.

                    </p>

                    <p class="mt-1 text-xs text-green-600">

                        Please wait for the next question.

                    </p>

                </div>

            </template>

        </div>

    </template>


    {{-- =========================
        FINISHED
    ========================== --}}

    <template x-if="status === 'Finished'">

        <div class="flex min-h-[70vh] items-center justify-center">

            <div class="text-center">

                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-green-100">

                    <i class="fa-solid fa-circle-check text-3xl text-green-600"></i>

                </div>

                <h1 class="mt-6 text-2xl font-bold text-slate-800">

                    Feedback Complete

                </h1>

                <p class="mt-3 text-sm leading-6 text-slate-500">

                    Thank you for participating.

                </p>

            </div>

        </div>

    </template>

</div>


<script>

function feedbackParticipant() {

    return {

        status: @js($feedback->presentation?->status ?? 'Waiting'),

        questionId: @js($feedback->presentation?->current_question_id),

        questionTitle: '',

        questionType: '',

        instruction: '',

        options: [],

        questionNumber: 0,

        totalQuestions: @js($feedback->questions->count()),

        responseCount: 0,

        selectedRating: null,

        selectedOption: null,

        textAnswer: '',

        submitting: false,

        submitted: false,


        async startPolling() {

            await this.fetchState();

            setInterval(() => {

                this.fetchState();

            }, 2000);

        },


        async fetchState() {

            try {

                const response = await fetch(
                    '{{ route('feedback.live.state', $feedback) }}',
                    {
                        headers: {
                            'Accept': 'application/json'
                        }
                    }
                );

                if (!response.ok) {
                    return;
                }

                const data = await response.json();

                /*
                |--------------------------------------------------------------------------
                | Detect new question
                |--------------------------------------------------------------------------
                */

                if (this.questionId !== data.question_id) {

                    this.questionId = data.question_id;

                    this.selectedRating = null;

                    this.selectedOption = null;

                    this.textAnswer = '';

                    this.submitted = false;

                }


                this.status = data.status;

                this.questionTitle = data.question?.title ?? '';

                this.questionType = data.question?.type
                    ? data.question.type.replaceAll('_', ' ')
                    : '';

                this.instruction = data.question?.instruction ?? '';

                this.options = data.question?.options ?? [];

                this.questionNumber = data.question_number ?? 0;

                this.responseCount = data.response_count ?? 0;

            } catch (error) {

                console.error('Live state error:', error);

            }

        },


        async submitAnswer() {

            if (this.submitting || this.submitted) {
                return;
            }

            this.submitting = true;

            let payload = {
                feedback_question_id: this.questionId,
            };


            /*
            |--------------------------------------------------------------------------
            | Rating
            |--------------------------------------------------------------------------
            */

            if (this.questionType === 'rating') {

                if (!this.selectedRating) {

                    alert('Please select a rating.');

                    this.submitting = false;

                    return;
                }

                payload.rating = this.selectedRating;

            }


            /*
            |--------------------------------------------------------------------------
            | Single Choice
            |--------------------------------------------------------------------------
            */

            else if (this.questionType === 'single choice') {

                if (!this.selectedOption) {

                    alert('Please select an option.');

                    this.submitting = false;

                    return;
                }

                payload.feedback_option_id = this.selectedOption;

            }


            /*
            |--------------------------------------------------------------------------
            | Text
            |--------------------------------------------------------------------------
            */

            else {

                if (!this.textAnswer.trim()) {

                    alert('Please enter your answer.');

                    this.submitting = false;

                    return;
                }

                payload.text = this.textAnswer.trim();

            }


            try {

                const response = await fetch(
                    '{{ route('feedback.answer', $feedback) }}',
                    {
                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },

                        body: JSON.stringify(payload)
                    }
                );


                if (!response.ok) {

                    const data = await response.json();

                    alert(data.message ?? 'Unable to submit your answer.');

                    this.submitting = false;

                    return;
                }


                this.submitted = true;

            } catch (error) {

                console.error(error);

                alert('Something went wrong. Please try again.');

            } finally {

                this.submitting = false;

            }

        }

    }

}

</script>

@endsection