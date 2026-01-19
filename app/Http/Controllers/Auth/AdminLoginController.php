<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function show()
    {
        return view('app.auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->boolean('remember');

        if (! Auth::attempt($credentials, $remember)) {
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // 🔒 Active check
        if (! $user->is_active) {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Your account is disabled.',
            ]);
        }

        // 🔒 Role check (Spatie)
        if (! $user->hasAnyRole(['admin', 'super-admin'])) {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Unauthorized access.',
            ]);
        }

        return redirect()->route('admin.dashboard');
    }
}
