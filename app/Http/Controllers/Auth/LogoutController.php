<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController
{
    public function logout(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 🔁 Redirect based on role
        if ($user && $user->hasAnyRole(['admin', 'super_admin'])) {
            return redirect()->route('admin.login.form');
        }

        return redirect()->route('login'); // user login
    }
}
