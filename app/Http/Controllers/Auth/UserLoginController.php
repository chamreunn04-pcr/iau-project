<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function show()
    {
        return view('app.auth.user-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (! Auth::guard('web')->attempt(
            $credentials,
            $request->boolean('remember')
        )) {
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('user.app');
    }
}
