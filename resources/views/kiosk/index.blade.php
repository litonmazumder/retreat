@extends('layouts.kiosk')

@section('title', 'Self Check-in Kiosk')

@section('content')

<div class="h-screen bg-slate-950 text-white overflow-hidden">

    <!-- Header -->

    <header class="h-20 bg-[#00477A] border-b border-blue-700 flex items-center justify-between px-10">

        <div>

            <h1 class="text-3xl font-bold">

                Asia Seminar 2026

            </h1>

            <p class="text-blue-200">

                Self Check-in Kiosk

            </p>

        </div>

        <div class="text-right">

            <div
                id="clock"
                class="text-2xl font-semibold">

            </div>

            <div class="text-sm text-blue-200">

                Press <kbd class="bg-white/20 px-2 py-1 rounded">F</kbd> Fullscreen

            </div>

        </div>

    </header>

    <div class="grid grid-cols-12 gap-8 h-[calc(100vh-80px)] p-8">

        <!-- Camera -->

        <div class="col-span-8">

            <div class="relative h-full rounded-3xl overflow-hidden bg-black shadow-2xl">

                <div
                    id="reader"
                    class="w-full h-full">
                </div>

                <!-- Scanner Frame -->

                <div
                    class="pointer-events-none absolute inset-0 flex items-center justify-center">

                    <div
                        class="relative w-80 h-80 rounded-3xl border-4 border-green-400">

                        <!-- Animated Scan Line -->

                        <div
                            class="absolute left-0 right-0 h-1 bg-green-400 animate-pulse top-1/2">

                        </div>

                    </div>

                </div>

                <!-- Instruction -->

                <div
                    class="absolute bottom-10 left-0 right-0 text-center">

                    <p
                        class="text-2xl font-semibold">

                        Present the QR Code inside the frame

                    </p>

                </div>

            </div>

        </div>

        <!-- Right Panel -->

        <div class="col-span-4">

            <div
                class="rounded-3xl bg-slate-900 border border-slate-700 shadow-xl p-8 h-full">

                <h2
                    class="text-2xl font-bold">

                    Last Check-in

                </h2>

                <div
                    class="mt-8 space-y-6">

                    <div>

                        <p class="text-slate-400">

                            Participant

                        </p>

                        <h3
                            id="name"
                            class="text-2xl font-bold mt-2">

                            Waiting...

                        </h3>

                    </div>

                    <div>

                        <p class="text-slate-400">

                            Participant ID

                        </p>

                        <div
                            id="participant_id"
                            class="text-xl mt-2">

                            —

                        </div>

                    </div>

                    <div>

                        <p class="text-slate-400">

                            Organization

                        </p>

                        <div
                            id="company"
                            class="text-xl mt-2">

                            —

                        </div>

                    </div>

                    <div>

                        <p class="text-slate-400">

                            Check-in Time

                        </p>

                        <div
                            id="time"
                            class="text-xl mt-2">

                            —

                        </div>

                    </div>

                </div>

                <div
                    id="status"
                    class="mt-10 rounded-xl bg-green-600 py-5 text-center text-xl font-bold">

                    Ready to Scan

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Overlay -->

<div
    id="overlay"
    class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center">

    <div
        id="overlay-card"
        class="rounded-3xl px-20 py-16 text-center">

        <div
            id="overlay-icon"
            class="text-8xl">

            ✓

        </div>

        <h2
            id="overlay-title"
            class="mt-6 text-5xl font-bold">

        </h2>

        <p
            id="overlay-subtitle"
            class="mt-6 text-2xl">

        </p>

    </div>

</div>

@endsection

@push('scripts')

<script>

const csrf = "{{ csrf_token() }}";

const html5QrCode = new Html5Qrcode("reader");

let scanning = true;

function updateClock(){

    document.getElementById("clock").innerHTML =
        new Date().toLocaleTimeString();

}

setInterval(updateClock,1000);

updateClock();

/*
|--------------------------------------------------------------------------
| Fullscreen
|--------------------------------------------------------------------------
*/

document.addEventListener("keydown",e=>{

    if(e.key.toLowerCase()==="f"){

        if(!document.fullscreenElement){

            document.documentElement.requestFullscreen();

        }else{

            document.exitFullscreen();

        }

    }

});

/*
|--------------------------------------------------------------------------
| Overlay
|--------------------------------------------------------------------------
*/

function showOverlay(color,icon,title,subtitle){

    const overlay=document.getElementById("overlay");

    const card=document.getElementById("overlay-card");

    overlay.classList.remove("hidden");

    card.className="rounded-3xl px-20 py-16 text-center "+color;

    document.getElementById("overlay-icon").innerHTML=icon;

    document.getElementById("overlay-title").innerHTML=title;

    document.getElementById("overlay-subtitle").innerHTML=subtitle;

    setTimeout(()=>{

        overlay.classList.add("hidden");

        scanning=true;

    },2500);

}

/*
|--------------------------------------------------------------------------
| Scan
|--------------------------------------------------------------------------
*/

function onScanSuccess(decodedText){

    if(!scanning) return;

    scanning=false;

    const token=decodedText.split("/").pop();

    fetch("{{ route('kiosk.checkin') }}",{

        method:"POST",

        headers:{

            "Content-Type":"application/json",

            "X-CSRF-TOKEN":csrf

        },

        body:JSON.stringify({

            qr_token:token

        })

    })

    .then(res=>res.json())

    .then(data=>{

        if(data.participant){

            document.getElementById("name").innerHTML=data.participant.name;

            document.getElementById("participant_id").innerHTML=data.participant.participant_id;

            document.getElementById("company").innerHTML=data.participant.company ?? "-";

            document.getElementById("time").innerHTML=data.participant.time;

        }

        if(data.status==="success"){

            document.getElementById("status").className="mt-10 rounded-xl bg-green-600 py-5 text-center text-xl font-bold";

            document.getElementById("status").innerHTML="Attendance Recorded";

            showOverlay(

                "bg-green-600",

                "✓",

                "Attendance Recorded",

                data.participant.name

            );

        }

        else if(data.status==="already"){

            document.getElementById("status").className="mt-10 rounded-xl bg-orange-500 py-5 text-center text-xl font-bold";

            document.getElementById("status").innerHTML="Already Checked In";

            showOverlay(

                "bg-orange-500",

                "⚠",

                "Already Checked In",

                data.participant.name

            );

        }

        else{

            document.getElementById("status").className="mt-10 rounded-xl bg-red-600 py-5 text-center text-xl font-bold";

            document.getElementById("status").innerHTML="Invalid QR";

            showOverlay(

                "bg-red-600",

                "✕",

                "Invalid QR Code",

                ""

            );

        }

    })

    .catch(()=>{

        showOverlay(

            "bg-red-600",

            "✕",

            "System Error",

            ""

        );

    });

}

Html5Qrcode.getCameras().then(cameras=>{

    html5QrCode.start(

        cameras[0].id,

        {

            fps:10,

            qrbox:{

                width:300,

                height:300

            }

        },

        onScanSuccess

    );

});

</script>

@endpush