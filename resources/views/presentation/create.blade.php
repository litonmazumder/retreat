@extends('layouts.app')

@section('title','Upload Presentation')

@section('content')

<div class="mx-auto max-w-3xl">

    <div class="rounded-3xl bg-white shadow-xl">

        <!-- Header -->

        <div class="rounded-t-3xl bg-[#00477A] px-8 py-8">

            <h1 class="text-3xl font-bold text-white">

                Upload Presentation

            </h1>

            <p class="mt-2 text-blue-100">

                Upload a presentation for a scheduled seminar session.

            </p>

        </div>

        <!-- Form -->

        <form
            action="{{ route('presentations.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-8 p-8">

            @csrf

            <!-- Session -->

            <div>

                <label class="block font-semibold text-slate-700">

                    Session

                </label>

                <select
                    name="event_session_id"
                    class="mt-3 w-full rounded-xl border border-slate-300 px-4 py-3">

                    <option value="">

                        Select Session

                    </option>

                    @foreach($sessions as $session)

                        <option value="{{ $session->id }}">

                            {{ $session->presentation_date }}

                            |

                            {{ $session->start_time }}

                            |

                            {{ $session->title }}

                            -

                            {{ $session->speaker->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Upload -->

            <div>

                <label class="block font-semibold text-slate-700">

                    Presentation File

                </label>

                <input
                    type="file"
                    name="presentation"
                    accept=".ppt,.pptx,.pdf"
                    class="mt-3 block w-full rounded-xl border border-slate-300 p-4">

                <p class="mt-3 text-sm text-slate-500">

                    Supported formats:

                    PPT, PPTX and PDF

                    (Maximum 50 MB)

                </p>

            </div>

            <!-- Buttons -->

            <div class="flex justify-end gap-4">

                <a
                    href="{{ route('presentations.index') }}"
                    class="rounded-xl border px-6 py-3">

                    Cancel

                </a>

                <button
                    class="rounded-xl bg-[#00477A] px-8 py-3 font-semibold text-white">

                    Upload Presentation

                </button>

            </div>

        </form>

    </div>

</div>

@endsection