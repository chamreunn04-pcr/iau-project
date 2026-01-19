<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {

            // ✅ ADMIN AREA
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login.form');
            }

            // ✅ USER AREA
            return route('login'); // user login route
        }

        return null;
    }
}
