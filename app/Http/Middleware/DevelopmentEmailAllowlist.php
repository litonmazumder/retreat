<?php

namespace App\Http\Middleware;

use App\Models\Participant;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DevelopmentEmailAllowlist
{
    private const ALLOWED_EMAILS = [
        'liton.mazumder@swisscontact.org',
        'another.email@swisscontact.org',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $uuid = $request->session()->get('participant_uuid');

        if (!$uuid) {
            abort(403, 'Access restricted during development.');
        }

        $participant = Participant::where('uuid', $uuid)->first();

        if (
            !$participant ||
            !in_array(
                strtolower($participant->email),
                array_map('strtolower', self::ALLOWED_EMAILS),
                true
            )
        ) {
            abort(403, "You're too clever, aren't you? Stay tuned 😉");
        }

        return $next($request);
    }
}
