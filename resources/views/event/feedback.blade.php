@extends('layouts.app')

@section('title', 'Seminar Feedback')

@section('content')

<div class="min-h-screen bg-slate-100 py-12">

    <div class="mx-auto max-w-4xl px-6">

        <div class="overflow-hidden rounded-3xl bg-white shadow-xl">

            <!-- Header -->

            <div class="bg-gradient-to-r from-[#00477A] to-[#0063A6] px-10 py-10 text-center">

                <h1 class="text-4xl font-bold text-white">

                    Asia Seminar 2026

                </h1>

                <p class="mt-3 text-blue-100 text-lg">

                    Participant Feedback

                </p>

            </div>

            <form
                action="#"
                method="POST"
                class="space-y-10 p-10">

                @csrf

                <input
                    type="hidden"
                    name="participant_id"
                    value="">

                <!-- Overall -->

                <div>

                    <h2 class="text-xl font-semibold text-slate-800">

                        1. Overall Experience

                    </h2>

                    <p class="mt-2 text-slate-500">

                        How satisfied were you with the seminar?

                    </p>

                    <select
                        name="overall_rating"
                        required
                        class="mt-4 w-full rounded-xl border p-4">

                        <option value="">Select Rating</option>
                        <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                        <option value="4">⭐⭐⭐⭐ Very Good</option>
                        <option value="3">⭐⭐⭐ Good</option>
                        <option value="2">⭐⭐ Fair</option>
                        <option value="1">⭐ Poor</option>

                    </select>

                </div>

                <!-- Organization -->

                <div>

                    <h2 class="text-xl font-semibold">

                        2. Event Organization

                    </h2>

                    <select
                        name="organization_rating"
                        class="mt-4 w-full rounded-xl border p-4">

                        <option value="">Select Rating</option>

                        <option value="5">Excellent</option>
                        <option value="4">Very Good</option>
                        <option value="3">Good</option>
                        <option value="2">Fair</option>
                        <option value="1">Poor</option>

                    </select>

                </div>

                <!-- Speakers -->

                <div>

                    <h2 class="text-xl font-semibold">

                        3. Speaker Sessions

                    </h2>

                    <select
                        name="speaker_rating"
                        class="mt-4 w-full rounded-xl border p-4">

                        <option value="">Select Rating</option>

                        <option value="5">Excellent</option>
                        <option value="4">Very Good</option>
                        <option value="3">Good</option>
                        <option value="2">Fair</option>
                        <option value="1">Poor</option>

                    </select>

                </div>

                <!-- Venue -->

                <div>

                    <h2 class="text-xl font-semibold">

                        4. Venue & Logistics

                    </h2>

                    <select
                        name="venue_rating"
                        class="mt-4 w-full rounded-xl border p-4">

                        <option value="">Select Rating</option>

                        <option value="5">Excellent</option>
                        <option value="4">Very Good</option>
                        <option value="3">Good</option>
                        <option value="2">Fair</option>
                        <option value="1">Poor</option>

                    </select>

                </div>

                <!-- Recommend -->

                <div>

                    <h2 class="text-xl font-semibold">

                        5. Would you recommend this seminar?

                    </h2>

                    <div class="mt-4 space-y-3">

                        <label class="flex items-center gap-3">

                            <input
                                type="radio"
                                name="recommend"
                                value="Yes">

                            Yes

                        </label>

                        <label class="flex items-center gap-3">

                            <input
                                type="radio"
                                name="recommend"
                                value="No">

                            No

                        </label>

                    </div>

                </div>

                <!-- Comments -->

                <div>

                    <h2 class="text-xl font-semibold">

                        What did you like most?

                    </h2>

                    <textarea
                        name="liked"
                        rows="4"
                        class="mt-4 w-full rounded-xl border p-4"
                        placeholder="Share your experience..."></textarea>

                </div>

                <div>

                    <h2 class="text-xl font-semibold">

                        Suggestions for Improvement

                    </h2>

                    <textarea
                        name="suggestion"
                        rows="4"
                        class="mt-4 w-full rounded-xl border p-4"
                        placeholder="How can we improve future seminars?"></textarea>

                </div>

                <div>

                    <h2 class="text-xl font-semibold">

                        Future Topics

                    </h2>

                    <textarea
                        name="future_topics"
                        rows="3"
                        class="mt-4 w-full rounded-xl border p-4"
                        placeholder="Topics you would like us to organize in future..."></textarea>

                </div>

                <button
                    class="w-full rounded-xl bg-[#00477A] py-5 text-lg font-semibold text-white transition hover:bg-[#003760]">

                    Submit Feedback

                </button>

            </form>

        </div>

    </div>

</div>

@endsection