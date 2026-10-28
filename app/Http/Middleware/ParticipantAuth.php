<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Participant;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParticipantAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $uuid = $request->session()->get('participant_uuid');

        if (! $uuid) {
            return redirect()->route('auth.login');
        }

        $participant = Participant::where('uuid', $uuid)->first();

        if (! $participant) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('auth.login');
        }

         View::share('participant', $participant);

        // Make participant available from controller
        $request->attributes->set('participant', $participant);

        return $next($request);
    }
}