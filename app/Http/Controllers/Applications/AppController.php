<?php

namespace App\Http\Controllers\Applications;

use Illuminate\Http\Request;

class AppController
{
    public function index()
    {
        return view('app.applications.index');
    }

    public function app()
    {
        return view('app.applications.app');
    }
}
