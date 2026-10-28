@extends('layouts.app')

@section('title', 'Presenter Dashboard')

@section('content')

<div class="mx-auto max-w-7xl px-6 py-10">

    <!-- Header -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between">

        <div>

            <h1 class="text-4xl font-bold text-[#00477A]">

                Presenter Dashboard

            </h1>

            <p class="mt-2 text-slate-500">

                Asia Seminar 2026

            </p>

        </div>

        <div class="mt-6 md:mt-0">

            <span class="rounded-full bg-green-100 px-5 py-2 text-green-700 font-semibold">

                LIVE EVENT

            </span>

        </div>

    </div>

    <!-- Current Session -->

    <div class="mt-10 rounded-3xl bg-gradient-to-r from-[#00477A] to-[#0063A6] p-8 text-white shadow-xl">

        <p class="uppercase tracking-widest text-blue-100">

            NOW PRESENTING

        </p>

        <h2 class="mt-3 text-5xl font-bold">

            AI for Development

        </h2>

        <div class="mt-6 grid md:grid-cols-3 gap-6">

            <div>

                <p class="text-blue-100">

                    Speaker

                </p>

                <h3 class="text-2xl font-semibold">

                    John Smith

                </h3>

            </div>

            <div>

                <p class="text-blue-100">

                    Time

                </p>

                <h3 class="text-2xl font-semibold">

                    10:30 AM

                </h3>

            </div>

            <div>

                <p class="text-blue-100">

                    Room

                </p>

                <h3 class="text-2xl font-semibold">

                    Main Hall

                </h3>

            </div>

        </div>

        <div class="mt-8 flex gap-4">

            <button class="rounded-xl bg-white px-8 py-4 text-[#00477A] font-bold shadow">

                ▶ Start Presentation

            </button>

            <button class="rounded-xl border border-white px-8 py-4">

                Download PPT

            </button>

        </div>

    </div>

    <!-- Today's Schedule -->

    <div class="mt-12">

        <h2 class="text-2xl font-bold text-slate-800">

            Today's Sessions

        </h2>

        <div class="mt-6 overflow-hidden rounded-3xl bg-white shadow">

            <table class="min-w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="px-6 py-4 text-left">

                            Time

                        </th>

                        <th class="px-6 py-4 text-left">

                            Topic

                        </th>

                        <th class="px-6 py-4 text-left">

                            Speaker

                        </th>

                        <th class="px-6 py-4 text-left">

                            Status

                        </th>

                        <th class="px-6 py-4 text-center">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                    <tr class="border-t bg-green-50">

                        <td class="px-6 py-5">

                            10:30

                        </td>

                        <td class="px-6 py-5 font-semibold">

                            AI for Development

                        </td>

                        <td class="px-6 py-5">

                            John Smith

                        </td>

                        <td class="px-6 py-5">

                            <span class="rounded-full bg-green-100 px-3 py-1 text-green-700">

                                LIVE

                            </span>

                        </td>

                        <td class="px-6 py-5 text-center">

                            <button class="rounded-lg bg-[#00477A] px-5 py-2 text-white">

                                Present

                            </button>

                        </td>

                    </tr>

                    <tr class="border-t">

                        <td class="px-6 py-5">

                            11:15

                        </td>

                        <td class="px-6 py-5">

                            Coffee Break

                        </td>

                        <td class="px-6 py-5">

                            —

                        </td>

                        <td class="px-6 py-5">

                            Upcoming

                        </td>

                        <td></td>

                    </tr>

                    <tr class="border-t">

                        <td class="px-6 py-5">

                            11:30

                        </td>

                        <td class="px-6 py-5 font-semibold">

                            Digital Transformation

                        </td>

                        <td class="px-6 py-5">

                            Jane Doe

                        </td>

                        <td class="px-6 py-5">

                            Ready

                        </td>

                        <td class="px-6 py-5 text-center">

                            <button class="rounded-lg border px-5 py-2">

                                Present

                            </button>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection