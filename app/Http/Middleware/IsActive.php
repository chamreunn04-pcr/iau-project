<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsActive
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            // user is NOT logged in
            return redirect()->route('admin.login.form');
        }

        if (! Auth::user()->is_active) {
            Auth::logout();
            return redirect()->route('admin.login.form')
                ->withErrors(['email' => 'Your account is disabled.']);
        }

        return $next($request);
    }
}

