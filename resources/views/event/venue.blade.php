@extends('layouts.app')

@section('title','Venue')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="text-center mb-12">

        <!-- <h1 class="text-5xl font-bold text-[#00477A]">

            Venue

        </h1> -->

        <!-- <p class="mt-4 text-lg text-slate-600">

            Asia Seminar 2026

        </p> -->

    </div>

    <div class="grid lg:grid-cols-2 gap-10">

        <div class="bg-white rounded-3xl shadow p-8">

            <h2 class="text-2xl font-bold text-[#00477A]">

                Event Location

            </h2>

            <div class="mt-8 space-y-5">

                <div>

                    <strong>Venue</strong>

                    <p>Lakeshore</p>

                </div>

                <div>

                    <strong>Address</strong>

                    <p>
                        House No: 46, Road No: 41

                        Gulshan-2

                        Dhaka

                        Bangladesh

                    </p>

                </div>

                        <!-- Open in Google Maps -->
                <div class="mt-6">
                    <a
                href="https://maps.app.goo.gl/FNpibJtf4mVoy2ab6"
                target="_blank"
                class="mt-10 inline-block rounded-xl bg-[#00477A] px-4 py-3 text-white font-semibold">
                        📍 Open in Google Maps
                    </a>
                </div>

                <!-- <div>

                    <strong>Date</strong>

                    <p>

                       TBA

                    </p>

                </div> -->

                <!-- <div>

                    <strong>Registration</strong>

                    <p>

                        Opens at 8:30 AM

                    </p>

                </div> -->

            </div>

            <!-- <a
                href="https://maps.app.goo.gl/FNpibJtf4mVoy2ab6"
                target="_blank"
                class="mt-10 inline-block rounded-xl bg-[#00477A] px-8 py-4 text-white font-semibold">

                Open in Google Maps

            </a> -->

        </div>

        <div class="rounded-3xl overflow-hidden shadow">

        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d14602.462554601103!2d90.4036352!3d23.79669765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3755c70a77eb7db5%3A0x2a9f827155d6cbb6!2sLakeshore%20Grand%2C%20House%20No%3A%2046%2C%20Road%20No%3A%2041%2C%20Dhaka%201212!3m2!1d23.790577199999998!2d90.4123673!5e0!3m2!1sen!2sbd!4v1783848455374!5m2!1sen!2sbd" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>

        </div>

    </div>

</div>

@endsection