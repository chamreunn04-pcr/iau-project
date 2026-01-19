<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionController
{
    public function index()
    {
        $permissions = Permission::with(['roles', 'users'])->paginate(15);

        return view('app.admin.permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|unique:permissions,name',
            'label' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:50',
        ]);

        Permission::create([
            'name'       => $validated['name'],
            'label'      => $validated['label'] ?? null,
            'color'      => $validated['color'] ?? 'secondary',
            'guard_name' => 'web',
        ]);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return back()->with('success', 'Permission created successfully.');
    }

    public function edit(User $user)
    {
        return view('app.admin.permissions.edit', [
            'user' => $user,
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'userRoles' => $user->roles->pluck('name')->toArray(),
            'userPermissions' => $user->permissions->pluck('name')->toArray(),
            'rolePermissions' => $user->getPermissionsViaRoles()->pluck('name')->toArray(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'array',
            'permissions' => 'array',
        ]);

        // sync roles
        $user->syncRoles($request->roles ?? []);

        // sync direct user permissions (OVERRIDES)
        $user->syncPermissions($request->permissions ?? []);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        return back()->with('success', 'Permissions updated successfully.');
    }
}
