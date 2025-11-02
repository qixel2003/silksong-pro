<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoginCount
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->loginLogs()->count() < 3) {
            if ($user->role === 1) {
                return $next($request);
            }
            return redirect()->route('builds.index')
                ->with('error', 'You must log in at least 3 times before creating a build.');
        }

        return $next($request);
    }
}
