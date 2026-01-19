<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\PermissionRegistrar;

class RoleController
{
    public function index()
    {
        $roles = Role::with(['permissions', 'users'])->paginate(15);

        return view('app.admin.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|unique:permissions,name',
            'label' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:50',
        ]);

        Role::create([
            'name'       => $validated['name'],
            'color'      => $validated['color'] ?? 'secondary',
            'guard_name' => 'web',
        ]);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return back()->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        // 🔐 Permission check
        if (!auth()->user()->can('role.edit')) {
            abort(403, 'Unauthorized action.');
        }

        return view('app.admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        // Permission check
        if (!auth()->user()->can('role.edit')) {
            abort(403, 'Unauthorized action.');
        }

        // Prevent editing Super Admin
        if ($role->name === 'Super Admin') {
            return redirect()
                ->route('roles')
                ->with('error', 'Super Admin role cannot be modified.');
        }

        // Validate
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
            'color' => 'required|string|in:blue,azure,indigo,purple,pink,red,orange,yellow,lime,green',
        ]);

        // Update role
        $role->update([
            'name' => $request->name,
            'color' => $request->color, // <-- Save the selected color
        ]);

        // Sync permissions
        $role->syncPermissions($request->permissions ?? []);

        return redirect()
            ->route('admin.roles')
            ->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        // 🔐 Permission check (extra safety)
        if (!auth()->user()->can('role.delete')) {
            abort(403, 'Unauthorized action.');
        }

        // 🚫 Optional: prevent deleting super admin role
        if ($role->name === 'Super Admin') {
            return redirect()
                ->route('roles')
                ->with('error', 'Super Admin role cannot be deleted.');
        }

        // 🧹 Remove permissions (optional but clean)
        $role->syncPermissions([]);

        // ❌ Delete role
        $role->delete();

        return redirect()
            ->route('admin.roles')
            ->with('success', 'Role deleted successfully.');
    }
}
