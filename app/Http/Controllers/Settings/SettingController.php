<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;

class SettingController
{
    public function index()
    {
        return view('app.settings.index');
    }
}
