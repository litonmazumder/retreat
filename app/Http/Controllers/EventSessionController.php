<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventSession;
use App\Models\Participant;
use Illuminate\Http\Request;

class EventSessionController extends Controller
{
    /**
     * Display all sessions.
     */
    public function index()
    {
        $sessions = EventSession::with(['event', 'speaker'])
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('event_sessions.create', compact('sessions'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $events = Event::orderBy('name')->get();

        $participants = Participant::orderBy('first_name')
            ->orderBy('last_name')
            ->get();

        return view('event_sessions.create', compact(
            'events',
            'participants'
        ));
    }

    /**
     * Store new session.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'event_id'      => 'required|exists:events,id',

            'participant_id'=> 'nullable|exists:participants,id',

            'title'         => 'required|string|max:255',

            'description'   => 'nullable|string',

            'venue'         => 'nullable|string|max:255',

            'day'           => 'required|integer|min:1',

            'session_date'  => 'required|date',

            'start_time'    => 'required',

            'end_time'      => 'required|after:start_time',

            'type'          => 'required|in:opening,keynote,presentation,panel,break,closing',

            'sort_order'    => 'required|integer|min:1',

        ]);

        EventSession::create($validated);

        return redirect()
            ->route('event-sessions.index')
            ->with('success', 'Session created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(EventSession $eventSession)
    {
        $events = Event::orderBy('name')->get();

        $participants = Participant::orderBy('first_name')
            ->orderBy('last_name')
            ->get();

        return view(
            'event_sessions.edit',
            compact(
                'eventSession',
                'events',
                'participants'
            )
        );
    }

    /**
     * Update session.
     */
    public function update(Request $request, EventSession $eventSession)
    {
        $validated = $request->validate([

            'event_id'      => 'required|exists:events,id',

            'participant_id'=> 'nullable|exists:participants,id',

            'title'         => 'required|string|max:255',

            'description'   => 'nullable|string',

            'venue'         => 'nullable|string|max:255',

            'day'           => 'required|integer|min:1',

            'session_date'  => 'required|date',

            'start_time'    => 'required',

            'end_time'      => 'required|after:start_time',

            'type'          => 'required|in:opening,keynote,presentation,panel,break,closing',

            'sort_order'    => 'required|integer|min:1',

        ]);

        $eventSession->update($validated);

        return redirect()
            ->route('event-sessions.index')
            ->with('success', 'Session updated successfully.');
    }

    /**
     * Delete session.
     */
    public function destroy(EventSession $eventSession)
    {
        $eventSession->delete();

        return redirect()
            ->route('event-sessions.index')
            ->with('success', 'Session deleted successfully.');
    }
}