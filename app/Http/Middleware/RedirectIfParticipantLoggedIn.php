<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfParticipantLoggedIn
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('participant_uuid')) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}