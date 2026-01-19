<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserIsActive
{
    public function handle($request, Closure $next)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if (! Auth::user()->is_active) {
            Auth::logout();

            return redirect()->route('login')
                ->withErrors(['email' => 'Your account is disabled.']);
        }

        return $next($request);
    }
}
