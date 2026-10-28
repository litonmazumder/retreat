<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentation;
use App\Models\EventSession;

class PresentationController extends Controller
{

        public function index()
        {
            $presentations = Presentation::with([
                'eventSession.speaker'
            ])->latest()->get();

            return view('presentation.index', compact('presentations'));
        }

        public function show(Presentation $presentation)
        {
            return view('presentation.show', compact('presentation'));
        }

        public function create()
        {
            $sessions = EventSession::with('speaker')
                ->orderBy('session_date')
                ->orderBy('start_time')
                ->get();

            return view('presentation.create', compact('sessions'));
        }

        public function store(Request $request)
        {
            $validated = $request->validate([

                'event_session_id' => 'required|exists:event_sessions,id',

                'presentation' => 'required|mimes:ppt,pptx,pdf|max:204800', // 200 MB

            ]);

            $file = $request->file('presentation');

            $path = $file->store('presentations', 'public');

            Presentation::create([

                'event_session_id' => $validated['event_session_id'],

                'file_name' => basename($path),

            ]);

            return redirect()
                ->route('presentations.index')
                ->with('success', 'Presentation uploaded successfully.');
        }

}
