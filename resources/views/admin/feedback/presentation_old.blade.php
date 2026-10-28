<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <meta
        name="theme-color"
        content="#00477A">

    <title>{{ $feedback->title }}</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

</head>

<body class="min-h-screen bg-slate-950 text-white">

<div
    x-data="feedbackPresentation()"
    x-init="startPolling()"
    class="min-h-screen">

    {{-- =========================
        WAITING
    ========================== --}}

    <template x-if="status === 'Waiting'">

        <div class="flex min-h-screen items-center justify-center p-10">

            <div class="text-center">

                <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-white/10">

                    <i class="fa-solid fa-comments text-4xl text-white"></i>

                </div>

                <h1 class="mt-8 text-5xl font-bold">
                    {{ $feedback->title }}
                </h1>

                <p class="mt-5 text-2xl text-slate-400">
                    Waiting for the facilitator to start...
                </p>

            </div>

        </div>

    </template>


    {{-- =========================
        LIVE
    ========================== --}}

    <template x-if="status === 'Live'">

        <div class="flex min-h-screen flex-col">

            {{-- Header --}}
            <header class="flex items-center justify-between border-b border-white/10 px-10 py-6">

                <div>

                    <p class="text-sm font-semibold uppercase tracking-widest text-blue-300">
                        Live Feedback
                    </p>

                    <h1 class="mt-1 text-xl font-bold">
                        {{ $feedback->title }}
                    </h1>

                </div>

                <div class="rounded-full bg-white/10 px-5 py-2 text-sm">

                    <span x-text="'Question ' + questionNumber + ' / ' + totalQuestions"></span>

                </div>

            </header>


            {{-- Question --}}
            <main class="flex flex-1 items-center justify-center px-10 py-12">

                <div class="w-full max-w-6xl text-center">

                    <p
                        class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-300"
                        x-text="questionType">
                    </p>

                    <h2
                        class="mt-8 text-5xl font-bold leading-tight xl:text-6xl"
                        x-text="questionTitle">
                    </h2>

                    <p
                        x-show="instruction"
                        class="mx-auto mt-6 max-w-3xl text-xl text-slate-400"
                        x-text="instruction">
                    </p>


                    {{-- =========================
                        RESULTS
                    ========================== --}}

                    <template x-if="showResults">

                        <div class="mt-12">

                            <div class="mx-auto mb-8 flex h-24 w-24 items-center justify-center rounded-full bg-blue-500/20">

                                <i class="fa-solid fa-chart-column text-4xl text-blue-300"></i>

                            </div>

                            <p class="text-3xl font-bold">

                                <span x-text="responseCount"></span>

                                <span class="font-normal text-slate-400">
                                    responses
                                </span>

                            </p>

                            <p class="mt-3 text-lg text-slate-400">
                                Results are being displayed
                            </p>

                        </div>

                    </template>


                    {{-- =========================
                        WAITING FOR ANSWERS
                    ========================== --}}

                    <template x-if="!showResults">

                        <div class="mt-12">

                            <div class="inline-flex items-center gap-3 rounded-full bg-white/10 px-7 py-4">

                                <span class="h-3 w-3 animate-pulse rounded-full bg-green-400"></span>

                                <span class="text-xl font-medium">

                                    <span x-text="responseCount"></span>

                                    responses

                                </span>

                            </div>

                        </div>

                    </template>

                </div>

            </main>


            {{-- Footer --}}
            <footer class="border-t border-white/10 px-10 py-5 text-center text-sm text-slate-500">

                Please submit your response from your mobile device.

            </footer>

        </div>

    </template>


    {{-- =========================
        FINISHED
    ========================== --}}

    <template x-if="status === 'Finished'">

        <div class="flex min-h-screen items-center justify-center p-10">

            <div class="text-center">

                <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-green-500/20">

                    <i class="fa-solid fa-circle-check text-5xl text-green-400"></i>

                </div>

                <h1 class="mt-8 text-5xl font-bold">
                    Feedback Complete
                </h1>

                <p class="mt-5 text-2xl text-slate-400">
                    Thank you for participating.
                </p>

            </div>

        </div>

    </template>

</div>


<script>

function feedbackPresentation() {

    return {

        status: @js($feedback->presentation?->status ?? 'Waiting'),

        showResults: @js($feedback->presentation?->show_results ?? false),

        questionId: @js($feedback->presentation?->current_question_id),

        questionTitle: '',

        questionType: '',

        instruction: '',

        questionNumber: 0,

        totalQuestions: @js($feedback->questions->count()),

        responseCount: 0,


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

                this.status = data.status;

                this.showResults = data.show_results;

                this.questionId = data.question_id;

                this.questionTitle = data.question?.title ?? '';

                this.questionType = data.question?.type
                    ? data.question.type.replaceAll('_', ' ')
                    : '';

                this.instruction = data.question?.instruction ?? '';

                this.questionNumber = data.question_number ?? 0;

                this.responseCount = data.response_count ?? 0;

            } catch (error) {

                console.error('Live state error:', error);

            }

        }

    }

}

</script>

</body>
</html>