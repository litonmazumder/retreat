<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class KioskController extends Controller
{
    public function index()
    {
        return view('kiosk.index');
    }

    public function search(Request $request)
    {
        $q = trim($request->q);

        if(strlen($q) < 2){

            return [];

        }

        $participants = Participant::query()

            ->where('event_id', Event::current()->id)

            ->where(function($query) use ($q){

                $query

                    ->where('participant_id','LIKE',"%{$q}%")

                    ->orWhereRaw(

                        "CONCAT(first_name,' ',last_name) LIKE ?",

                        ["%{$q}%"]

                    );

            })

            ->whereNull('checked_in_at')

            ->limit(10)

            ->get([

                'id',

                'participant_id',

                'first_name',

                'last_name',

                'designation',

                'company',

                'country'

            ]);

        return response()->json($participants);
    }

    public function checkIn(Request $request)
    {
        $request->validate([

            'participant_id'=>'required|exists:participants,id'

        ]);

        $participant = Participant::findOrFail(

            $request->participant_id

        );

        if($participant->checked_in_at){

            return response()->json([

                'success'=>false,

                'message'=>'Attendance already recorded.',

                'time'=>$participant->checked_in_at

                    ->format('d M Y h:i A')

            ]);

        }

        $participant->update([

            'checked_in_at'=>now(),

            'check_in_method'=>request()->userAgent(),

            'check_in_ip'=>request()->ip()

        ]);

        return response()->json([

            'success'=>true,

            'message'=>'Welcome to Asia Seminar 2026!'

        ]);
    }

    public function manual()
    {
        return view('kiosk.manual');
    }
}
