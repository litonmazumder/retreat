<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $feedback->title }} - Presentation
    </title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >

    <style>

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }

        body {
            background: #020617;
        }

        .result-bar {
            transition:
                width 0.8s ease,
                opacity 0.8s ease;
        }

        .presentation-card {
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {

            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

    </style>

</head>


<body class="min-h-screen bg-slate-950 text-white">


<div class="min-h-screen flex flex-col">


    {{-- =====================================================
        TOP BAR
    ====================================================== --}}

    <header class="flex items-center justify-between px-8 py-6 lg:px-12">

        {{-- Event / Feedback title --}}

        <div>

            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">
                Feedback Presentation
            </p>

            <h2 class="mt-1 text-lg font-semibold text-slate-300">
                {{ $feedback->title }}
            </h2>

        </div>


        {{-- Response count --}}

        <div
            class="flex items-center gap-3 rounded-full border border-white/10 bg-white/5 px-5 py-2.5"
        >

            <i class="fa-solid fa-users text-sm text-slate-400"></i>

            <span class="text-sm font-semibold text-slate-300">

                {{ $totalResponses }}

                {{ $totalResponses === 1 ? 'response' : 'responses' }}

            </span>

        </div>

    </header>



    {{-- =====================================================
        MAIN PRESENTATION AREA
    ====================================================== --}}

    <main class="flex flex-1 flex-col px-8 pb-8 lg:px-16">


        {{-- =================================================
            QUESTION HEADER
        ================================================== --}}

        <div
            class="presentation-card mx-auto mt-8 w-full max-w-6xl text-center"
        >

            {{-- Question number --}}

            <div
                class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#00477A] text-lg font-bold shadow-lg shadow-blue-950/30"
            >

                {{ $question->sort_order }}

            </div>


            {{-- Question --}}

            <h1
                class="mx-auto mt-7 max-w-5xl text-4xl font-bold leading-tight tracking-tight text-white lg:text-6xl"
            >

                {{ $question->title }}

            </h1>

        </div>



        {{-- =================================================
            RATING RESULTS
        ================================================== --}}

        @if($question->type === 'rating')

            @php
                $maxRating = collect($results)->max('total') ?: 1;
            @endphp

            <div class="presentation-card mx-auto mt-14 w-full max-w-5xl">

                <div class="space-y-5">

                    @foreach($results as $result)

    @php
        $percentage = $totalResponses > 0
            ? round(($result['total'] / $totalResponses) * 100)
            : 0;

        $width = ($result['total'] / $maxRating) * 100;

        $stars = str_repeat('⭐', (int) $result['value']);
    @endphp


                        <div class="flex items-center gap-6">


                            {{-- Stars --}}

                            <div class="w-60 shrink-0 text-right text-3xl tracking-tight">

                                {{ $stars }}

                            </div>


                            {{-- Result bar --}}

                            <div class="flex-1">

                                <div
                                    class="h-14 overflow-hidden rounded-2xl bg-white/10"
                                >

                                    @if($result['total'] > 0)

                                        <div
                                            class="result-bar flex h-full items-center rounded-2xl bg-[#00477A] px-6"
                                            style="width: {{ max($width, 8) }}%;"
                                        >

                                            <span class="text-xl font-bold">
                                                {{ $result['total'] }}
                                            </span>

                                        </div>

                                    @endif

                                </div>

                            </div>


                            {{-- Percentage --}}

                            <div
                                class="w-28 shrink-0 text-right"
                            >

                                <span
                                    class="text-3xl font-bold text-white"
                                >
                                    {{ $percentage }}%
                                </span>

                            </div>


                        </div>

                    @endforeach

                </div>

            </div>

        @endif



        {{-- =================================================
            SINGLE CHOICE RESULTS
        ================================================== --}}

        @if($question->type === 'single_choice')

            @php
                $maxChoice = collect($results)->max('total') ?: 1;
            @endphp

            <div class="presentation-card mx-auto mt-14 w-full max-w-5xl">

                <div class="space-y-7">

                    @foreach($results as $result)

                        @php
                            $percentage = $totalResponses > 0
                                ? round(($result['total'] / $totalResponses) * 100)
                                : 0;

                            $width = ($result['total'] / $maxChoice) * 100;
                        @endphp


                        <div>

                            {{-- Answer + statistics --}}

                            <div class="mb-3 flex items-center gap-6">


                                {{-- Answer --}}

                                <div class="min-w-0 flex-1">

                                    <span
                                        class="text-xl font-semibold leading-7 text-slate-200"
                                    >
                                        {{ $result['label'] }}
                                    </span>

                                </div>


                                {{-- Participant count --}}

                                <div
                                    class="shrink-0 text-right"
                                >

                                    <!-- <span
                                        class="text-2xl font-bold text-white"
                                    >
                                        {{ $result['total'] }}
                                    </span> -->

                                    <!-- <span
                                        class="ml-1 text-base text-slate-400"
                                    >
                                        {{ $result['total'] === 1 ? 'participant' : 'participants' }}
                                    </span> -->

                                </div>


                                {{-- Percentage --}}

                                <div
                                    class="w-24 shrink-0 text-right"
                                >

                                    <span
                                        class="text-3xl font-bold text-white"
                                    >
                                        {{ $percentage }}%
                                    </span>

                                </div>

                            </div>


                            {{-- Result bar --}}

                            <div
                                class="h-14 overflow-hidden rounded-2xl bg-white/10"
                            >

                                @if($result['total'] > 0)

                                    <div
                                        class="result-bar flex h-full items-center rounded-2xl bg-[#00477A] px-6"
                                        style="width: {{ max($width, 8) }}%;"
                                    >

                                        <span
                                            class="text-xl font-bold text-white"
                                        >
                                            {{ $result['total'] }}
                                        </span>

                                    </div>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        @endif



        {{-- =================================================
            TEXT RESPONSES
        ================================================== --}}

        @if(
            $question->type === 'short_text' ||
            $question->type === 'long_text'
        )

            <div
                class="presentation-card mx-auto mt-10 w-full max-w-7xl"
            >

                @if($results->count() > 0)

                    {{-- =============================================
                        RESPONSE WALL
                    ============================================== --}}

                    <div
                        class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3"
                    >

                        @foreach($results as $response)

                            <div
                                class="rounded-2xl bg-white px-5 py-4 text-slate-800 shadow-lg"
                            >

                                <div class="flex items-start gap-3">

                                    {{-- Quote icon --}}

                                    <div
                                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-50 text-[#00477A]"
                                    >

                                        <i
                                            class="fa-solid fa-quote-left text-xs"
                                        ></i>

                                    </div>


                                    {{-- Response --}}

                                    <p
                                        class="text-base font-medium leading-6"
                                    >

                                        {{ $response->answer_text }}

                                    </p>

                                </div>

                            </div>

                        @endforeach

                    </div>


                    {{-- =============================================
                        RESPONSE COUNT
                    ============================================== --}}

                    <div class="mt-7 text-center">

                        <span class="text-sm text-slate-500">

                            {{ $results->count() }}

                            {{ $results->count() === 1 ? 'response' : 'responses' }}

                        </span>

                    </div>


                @else

                    {{-- =============================================
                        NO RESPONSES
                    ============================================== --}}

                    <div
                        class="rounded-3xl border border-white/10 bg-white/5 py-20 text-center"
                    >

                        <i
                            class="fa-regular fa-comment-dots text-5xl text-slate-600"
                        ></i>

                        <p
                            class="mt-5 text-xl font-semibold text-slate-400"
                        >

                            No responses yet

                        </p>

                    </div>

                @endif

            </div>

        @endif



        {{-- =================================================
            NO RESPONSE
        ================================================== --}}

        @if($totalResponses === 0)

            <div
                class="mx-auto mt-12 text-center"
            >

                <div
                    class="inline-flex items-center gap-3 rounded-full bg-white/5 px-6 py-3 text-sm text-slate-400"
                >

                    <i class="fa-solid fa-hourglass-half"></i>

                    Waiting for participant responses

                </div>

            </div>

        @endif



        {{-- =================================================
            BOTTOM NAVIGATION
        ================================================== --}}

        <div
            class="mt-auto flex items-center justify-between pt-10"
        >


            {{-- Previous --}}

            <div>

                @if($previousQuestion)

                    <a
                        href="{{ route(
                            'admin.feedback.presentation',
                            [
                                'feedback' => $feedback,
                                'question' => $previousQuestion
                            ]
                        ) }}"
                        class="inline-flex items-center gap-3 rounded-full border border-white/10 bg-white/5 px-6 py-3 text-sm font-semibold text-slate-300 transition hover:bg-white/10 hover:text-white"
                    >

                        <i class="fa-solid fa-arrow-left"></i>

                        Previous

                    </a>

                @endif

            </div>



            {{-- Question counter --}}

            <div
                class="rounded-full bg-white/5 px-5 py-2 text-sm font-medium text-slate-500"
            >

                 {{ $currentPosition }}

                <span class="mx-1">
                    /
                </span>

                 {{ $totalQuestions }}

            </div>



            {{-- Next --}}

            <div>

                @if($nextQuestion)

                    <a
                        href="{{ route(
                            'admin.feedback.presentation',
                            [
                                'feedback' => $feedback,
                                'question' => $nextQuestion
                            ]
                        ) }}"
                        class="inline-flex items-center gap-3 rounded-full bg-[#00477A] px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-950/30 transition hover:bg-[#00375f]"
                    >

                        Next

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                @endif

            </div>


        </div>


    </main>


</div>


</body>

</html>