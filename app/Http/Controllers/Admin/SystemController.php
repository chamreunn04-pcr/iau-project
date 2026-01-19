<?php

namespace App\Http\Controllers\Admin;

use App\Models\System;
use Illuminate\Http\Request;

class SystemController
{
    public function index()
    {
        $systems = System::all();
        return view('app.admin.system.index', compact('systems'));
    }


    public function create()
    {
        return view('app.admin.system.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required',
            'slug'  => 'required|unique:systems,slug',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('systems', 'public');
        }

        System::create($data);

        return back()->with('success', 'System created successfully.');
    }
}
