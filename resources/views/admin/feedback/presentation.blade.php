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
            background: #ffffff;
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


<body class="min-h-screen bg-white text-black">


<div class="min-h-screen flex flex-col">


    {{-- =====================================================
        TOP BAR
    ====================================================== --}}

    <header class="flex items-center justify-between px-8 py-6 lg:px-12">

        {{-- Event / Feedback title --}}

        <div>

            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-700">
                Feedback Presentation
            </p>

            <h2 class="mt-1 text-lg font-semibold text-black">
                {{ $feedback->title }}
            </h2>

        </div>


        {{-- Response count --}}

        <div
            class="flex items-center gap-3 rounded-full border border-slate-200 bg-slate-50 px-5 py-2.5"
        >

            <i class="fa-solid fa-users text-sm text-slate-700"></i>

            <span class="text-sm font-semibold text-black">

                {{ $totalResponses }}

                {{ $totalResponses === 1 ? 'response' : 'responses' }}

            </span>

        </div>

    </header>



    {{-- =====================================================
        MAIN PRESENTATION AREA
    ====================================================== --}}

    <main id="presentation-content" class="flex flex-1 flex-col px-5 pb-6 lg:px-10 xl:px-14">


        {{-- =================================================
            QUESTION HEADER
        ================================================== --}}

        <div
            class="presentation-card mx-auto mt-3 w-full max-w-6xl text-center lg:mt-4"
        >

            {{-- Question number --}}

            <div
                class="mx-auto flex h-12 w-12 items-center justify-center rounded-full border border-slate-300 bg-white text-lg font-bold text-black shadow-sm"
            >

                {{ $question->sort_order }}

            </div>


            {{-- Question --}}

            <h1
                class="mx-auto mt-5 max-w-6xl text-3xl font-bold leading-tight tracking-tight text-black sm:text-4xl lg:text-5xl xl:text-6xl"
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
                                    class="h-14 overflow-hidden rounded-2xl bg-slate-100"
                                >

                                    @if($result['total'] > 0)

                                        <div
                                            class="result-bar flex h-full items-center rounded-2xl bg-blue-500 px-6"
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
                                    class="text-3xl font-bold text-black"
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
                                        class="text-xl font-semibold leading-7 text-black"
                                    >
                                        {{ $result['label'] }}
                                    </span>

                                </div>


                                {{-- Participant count --}}

                                <div
                                    class="shrink-0 text-right"
                                >

                                    <!-- <span
                                        class="text-2xl font-bold text-black"
                                    >
                                        {{ $result['total'] }}
                                    </span> -->

                                    <!-- <span
                                        class="ml-1 text-base text-slate-700"
                                    >
                                        {{ $result['total'] === 1 ? 'participant' : 'participants' }}
                                    </span> -->

                                </div>


                                {{-- Percentage --}}

                                <div
                                    class="w-24 shrink-0 text-right"
                                >

                                    <span
                                        class="text-3xl font-bold text-black"
                                    >
                                        {{ $percentage }}%
                                    </span>

                                </div>

                            </div>


                            {{-- Result bar --}}

                            <div
                                class="h-14 overflow-hidden rounded-2xl bg-slate-100"
                            >

                                @if($result['total'] > 0)

                                    <div
                                        class="result-bar flex h-full items-center rounded-2xl bg-blue-500 px-6"
                                        style="width: {{ max($width, 8) }}%;"
                                    >

                                        <span
                                            class="text-xl font-bold text-black"
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

{{-- =================================================
            TEXT RESPONSES
        ================================================== --}}

        <!-- @if(
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
                                class="rounded-2xl bg-blue-500 px-5 py-4 text-white shadow-lg"
                            >

                                <div class="flex items-start gap-3">

                                    {{-- Quote icon --}}

                                    <div
                                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-100 text-black"
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

                        <span class="text-sm text-slate-700">

                            {{ $results->count() }}

                            {{ $results->count() === 1 ? 'response' : 'responses' }}

                        </span>

                    </div>


                @else

                    {{-- =============================================
                        NO RESPONSES
                    ============================================== --}}

                    <div
                        class="rounded-3xl border border-slate-200 bg-slate-50 py-20 text-center"
                    >

                        <i
                            class="fa-regular fa-comment-dots text-5xl text-slate-700"
                        ></i>

                        <p
                            class="mt-5 text-xl font-semibold text-slate-700"
                        >

                            No responses yet

                        </p>

                    </div>

                @endif

            </div>

        @endif -->

@php
    $isHostCountryQuestion =
        $question->sort_order == 14
        && str_contains(
            strtolower($question->title),
            'host of the next asia seminar'
        );
@endphp


{{-- ============================================================
     QUESTION 14 → HOST COUNTRY WORD CLOUD
============================================================ --}}

@if($isHostCountryQuestion)

    @php
        $countryResponses = $results
            ->filter(function ($response) {
                return filled(
                    trim($response->answer_text ?? '')
                );
            })
            ->groupBy(function ($response) {

                $answer = trim(
                    $response->answer_text ?? ''
                );

                $answer = preg_replace(
                    '/\s+/u',
                    ' ',
                    $answer
                );

                return mb_strtolower($answer);
            })
            ->map(function ($responses) {

                return [
                    'name' => trim(
                        $responses->first()->answer_text
                    ),
                    'count' => $responses->count(),
                ];

            })
            ->sortByDesc('count')
            ->values();

        $maxCount =
            $countryResponses->max('count') ?: 1;

        $minCount =
            $countryResponses->min('count') ?: 1;
    @endphp


    {{-- WORD CLOUD --}}

    <div
        class="
            presentation-card
            mx-auto
            mt-6
            flex
            min-h-[55vh]
            w-full
            max-w-7xl
            items-center
            justify-center
            overflow-hidden
            rounded-3xl
            bg-white
            px-4
            py-8
            sm:px-8
            lg:px-12
        "
    >

        @if($countryResponses->count() > 0)

            <div
                class="
                    flex
                    w-full
                    max-w-6xl
                    flex-wrap
                    items-center
                    justify-center
                    gap-x-6
                    gap-y-5
                    sm:gap-x-8
                    sm:gap-y-7
                    lg:gap-x-12
                    lg:gap-y-9
                "
            >

                @foreach($countryResponses as $country)

                    @php
                        $count = $country['count'];

                        if ($maxCount === $minCount) {
                            $frequency = 0.5;
                        } else {
                            $frequency =
                                ($count - $minCount)
                                /
                                ($maxCount - $minCount);
                        }

                        $frequency = max(
                            0,
                            min(1, $frequency)
                        );

                        $fontSize =
                            2 + ($frequency * 3);

                        $fontWeight =
                            $frequency >= 0.7
                                ? 900
                                : 700;
                    @endphp

                    <span
                        class="
                            inline-block
                            select-none
                            whitespace-nowrap
                            leading-none
                            text-[#00477A]
                            transition-all
                            duration-300
                            hover:scale-110
                        "
                        style="
                            font-size:
                                clamp(
                                    1.75rem,
                                    {{ number_format($fontSize, 2) }}rem,
                                    5rem
                                );

                            font-weight:
                                {{ $fontWeight }};
                        "
                    >
                        {{ $country['name'] }}
                    </span>

                @endforeach

            </div>

        @else

            <div class="py-20 text-center">

                <i
                    class="
                        fa-regular
                        fa-comment-dots
                        text-5xl
                        text-slate-400
                    "
                ></i>

                <p
                    class="
                        mt-5
                        text-xl
                        font-semibold
                        text-slate-600
                    "
                >
                    No responses yet
                </p>

            </div>

        @endif

    </div>


    {{-- Response count --}}

    <div class="mt-4 text-center">

        <span class="text-sm font-medium text-slate-500">

            {{ $results->count() }}

            {{ $results->count() === 1
                ? 'response'
                : 'responses'
            }}

        </span>

    </div>


{{-- ============================================================
     ALL OTHER SHORT/LONG TEXT QUESTIONS → RESPONSE WALL
============================================================ --}}

@elseif(
    $question->type === 'short_text' ||
    $question->type === 'long_text'
)

    @if($results->count() > 0)

        <div
            class="
                mx-auto
                mt-8
                grid
                w-full
                max-w-7xl
                grid-cols-1
                gap-4
                sm:grid-cols-2
                xl:grid-cols-3
            "
        >

            @foreach($results as $response)

                @php
                    $answer = trim(
                        $response->answer_text ?? ''
                    );

                    $characterCount = mb_strlen($answer);


                    /*
                    |--------------------------------------------------------------------------
                    | Card height
                    |--------------------------------------------------------------------------
                    */

                    $cardHeight = match (true) {

                        $characterCount <= 20 =>
                            'min-h-[64px]',

                        $characterCount <= 50 =>
                            'min-h-[72px]',

                        $characterCount <= 90 =>
                            'min-h-[84px]',

                        default =>
                            'min-h-[100px]',
                    };


                    /*
                    |--------------------------------------------------------------------------
                    | Font size
                    |--------------------------------------------------------------------------
                    */

                    $textSize = match (true) {

                        $characterCount <= 20 =>
                            'text-base sm:text-lg',

                        $characterCount <= 50 =>
                            'text-base sm:text-lg',

                        $characterCount <= 90 =>
                            'text-sm sm:text-base',

                        default =>
                            'text-sm',
                    };
                @endphp


                <article
                    class="
                        {{ $cardHeight }}
                        flex
                        w-full
                        items-center
                        gap-3
                        rounded-2xl
                        bg-blue-500
                        px-4
                        py-3
                        text-white
                        shadow-md
                        transition-all
                        duration-200
                        hover:scale-[1.01]
                    "
                >

                    {{-- Quote icon --}}

                    <div
                        class="
                            flex
                            h-8
                            w-8
                            shrink-0
                            items-center
                            justify-center
                            rounded-full
                            bg-white/90
                            text-slate-800
                        "
                    >
                        <i
                            class="fa-solid fa-quote-left text-[10px]"
                        ></i>
                    </div>


                    {{-- Answer --}}

                    <p
                        class="
                            {{ $textSize }}
                            min-w-0
                            flex-1
                            break-words
                            whitespace-normal
                            font-semibold
                            leading-snug
                        "
                    >
                        {{ $answer }}
                    </p>

                </article>

            @endforeach

        </div>


        {{-- Response count --}}

        <div class="mt-5 text-center">

            <span class="text-sm text-slate-500">

                {{ $results->count() }}

                {{ $results->count() === 1
                    ? 'response'
                    : 'responses'
                }}

            </span>

        </div>

    @else

        <div
            class="
                mx-auto
                mt-8
                max-w-7xl
                rounded-3xl
                border
                border-slate-200
                bg-slate-50
                py-20
                text-center
            "
        >

            <i
                class="
                    fa-regular
                    fa-comment-dots
                    text-5xl
                    text-slate-400
                "
            ></i>

            <p
                class="
                    mt-5
                    text-xl
                    font-semibold
                    text-slate-600
                "
            >
                No responses yet
            </p>

        </div>

    @endif

@endif



        {{-- =================================================
            NO RESPONSE
        ================================================== --}}

        @if($totalResponses === 0)

            <div
                class="mx-auto mt-12 text-center"
            >

                <div
                    class="inline-flex items-center gap-3 rounded-full bg-slate-50 px-6 py-3 text-sm text-slate-700"
                >

                    <i class="fa-solid fa-hourglass-half"></i>

                    Waiting for participant responses

                </div>

            </div>

        @endif



        {{-- =================================================
            KEYBOARD PRESENTATION CONTROLS
        ================================================== --}}

        <div class="mt-auto flex items-center justify-center pt-5">

            <div class="flex items-center gap-3 rounded-full border border-slate-200 bg-slate-50 px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm">

                @if($previousQuestion)
                    <span class="flex items-center gap-2">
                        <kbd class="rounded-lg border border-slate-300 bg-white px-2 py-1 text-xs font-bold text-black shadow-sm">
                            ←
                        </kbd>
                        Previous
                    </span>
                @endif

                <span class="mx-1 h-5 w-px bg-slate-300"></span>

                <span class="rounded-full bg-white px-3 py-1 text-xs font-bold text-black">
                    {{ $currentPosition }} / {{ $totalQuestions }}
                </span>

                <span class="mx-1 h-5 w-px bg-slate-300"></span>

                @if($nextQuestion)
                    <span class="flex items-center gap-2">
                        Next
                        <kbd class="rounded-lg border border-slate-300 bg-white px-2 py-1 text-xs font-bold text-black shadow-sm">
                            →
                        </kbd>
                    </span>
                @endif

            </div>

        </div>


    </main>


</div>


<script>
(() => {
    const previousUrl = @json(
        $previousQuestion
            ? route('admin.feedback.presentation', [
                'feedback' => $feedback,
                'question' => $previousQuestion
            ])
            : null
    );

    const nextUrl = @json(
        $nextQuestion
            ? route('admin.feedback.presentation', [
                'feedback' => $feedback,
                'question' => $nextQuestion
            ])
            : null
    );

    async function toggleFullscreen() {
        try {
            if (!document.fullscreenElement) {
                await document.documentElement.requestFullscreen();
            } else {
                await document.exitFullscreen();
            }
        } catch (error) {
            console.warn('Fullscreen request was blocked:', error);
        }
    }

    /*
     * IMPORTANT:
     * Do not navigate with window.location for presentation questions.
     * A normal page navigation destroys the current document and Chrome
     * exits Fullscreen. Instead, fetch the next page and replace only
     * #presentation-content. The same document stays alive, so fullscreen
     * remains active.
     */
    let loadingQuestion = false;

    async function loadQuestion(url, direction) {
        if (loadingQuestion) return;

        const currentContent = document.querySelector('#presentation-content');

        if (!currentContent || !url) return;

        loadingQuestion = true;
        document.documentElement.classList.add('presentation-loading');

        try {
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            const html = await response.text();

            const parser = new DOMParser();
            const newDocument = parser.parseFromString(html, 'text/html');
            const newContent = newDocument.querySelector('#presentation-content');

            if (!newContent) {
                throw new Error('Presentation content was not found.');
            }

            currentContent.replaceWith(newContent);

            // Keep the browser URL in sync without navigating away.
            window.history.pushState(
                { presentation: true },
                '',
                url
            );

            // Update the available question URLs for the next key press.
            const previousLink = newDocument.querySelector(
                'a[href*="/presentation/"]'
            );

            // Read navigation URLs from data attributes when present.
            const navigationData = newDocument.querySelector(
                '#presentation-navigation-data'
            );

            if (navigationData) {
                window.presentationPreviousUrl =
                    navigationData.dataset.previous || null;

                window.presentationNextUrl =
                    navigationData.dataset.next || null;
            }

            // The server-rendered script contains the new URLs. Extract them
            // from the page without executing the script.
            const scripts = Array.from(newDocument.scripts);

            for (const script of scripts) {
                const content = script.textContent || '';

                const previousMatch = content.match(
                    /const previousUrl =\s*([^;]+);/
                );

                const nextMatch = content.match(
                    /const nextUrl =\s*([^;]+);/
                );

                if (previousMatch) {
                    try {
                        window.presentationPreviousUrl =
                            JSON.parse(previousMatch[1].trim());
                    } catch (_) {}
                }

                if (nextMatch) {
                    try {
                        window.presentationNextUrl =
                            JSON.parse(nextMatch[1].trim());
                    } catch (_) {}
                }
            }

        } catch (error) {
            console.error('Could not load presentation question:', error);

            // Only fall back to normal navigation if AJAX replacement fails.
            // This is intentionally a fallback, not the normal path.
            window.location.assign(url);

        } finally {
            loadingQuestion = false;
            document.documentElement.classList.remove('presentation-loading');
        }
    }

    window.presentationPreviousUrl = previousUrl;
    window.presentationNextUrl = nextUrl;

    // Capture at window level so arrow keys are handled reliably.
    window.addEventListener('keydown', (event) => {
        const active = document.activeElement;

        // Don't intercept keys while typing.
        if (
            active &&
            (
                active.tagName === 'INPUT' ||
                active.tagName === 'TEXTAREA' ||
                active.tagName === 'SELECT' ||
                active.isContentEditable
            )
        ) {
            return;
        }

        if (event.key === 'ArrowLeft' && window.presentationPreviousUrl) {
            event.preventDefault();
            event.stopImmediatePropagation();
            loadQuestion(window.presentationPreviousUrl, 'previous');
            return;
        }

        if (event.key === 'ArrowRight' && window.presentationNextUrl) {
            event.preventDefault();
            event.stopImmediatePropagation();
            loadQuestion(window.presentationNextUrl, 'next');
            return;
        }

        if (event.key === 'f' || event.key === 'F') {
            event.preventDefault();
            event.stopImmediatePropagation();
            toggleFullscreen();
        }
    }, true);
})();
</script>

</body>

</html>