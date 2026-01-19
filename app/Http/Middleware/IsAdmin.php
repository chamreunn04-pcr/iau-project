<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            return redirect()->route('admin.login.form');
        }

        if (! in_array(Auth::user()->type, ['admin', 'super_admin'])) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
