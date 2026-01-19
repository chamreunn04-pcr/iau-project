<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function index()
    {

        return view('app.admin.dashboard');
    }
}
