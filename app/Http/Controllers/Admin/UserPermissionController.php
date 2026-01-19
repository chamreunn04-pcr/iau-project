<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserPermissionController
{
    public function index()
    {
        $users = User::with([
            'permissions',
            'roles.permissions',
        ])->paginate(10);

        return view('app.admin.user_permissions.index', compact('users'));
    }

    public function edit(User $user)
    {
        $permissionsGrouped = Permission::orderBy('label')
            ->orderBy('name')
            ->get()
            ->groupBy('label');

        return view('app.admin.user_permissions.edit', [
            'user' => $user,
            'roles' => Role::all(),

            // 🔹 Grouped permissions by label
            'permissionsGrouped' => $permissionsGrouped,

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
