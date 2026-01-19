<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Clear permission cache
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'audit.view','audit.create','audit.edit','audit.delete',
            'hr.view','hr.create','hr.edit','hr.delete',
            'accounting.view','accounting.create','accounting.edit','accounting.delete',
            'planning.view','planning.create','planning.edit','planning.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name'       => $permission,
                'guard_name' => 'web',
            ]);
        }

        $superAdmin = Role::firstOrCreate([
            'name'       => 'super-admin',
            'guard_name' => 'web',
        ]);

        $admin = Role::firstOrCreate([
            'name'       => 'admin',
            'guard_name' => 'web',
        ]);

        $user = Role::firstOrCreate([
            'name'       => 'user',
            'guard_name' => 'web',
        ]);

        $auditor = Role::firstOrCreate([
            'name'       => 'auditor',
            'guard_name' => 'web',
        ]);

        $superAdmin->syncPermissions(Permission::all());

        $admin->syncPermissions([
            'audit.view','audit.create','audit.edit',
            'hr.view','hr.create','hr.edit',
            'accounting.view','accounting.create','accounting.edit',
            'planning.view','planning.create','planning.edit',
        ]);

        $auditor->syncPermissions([
            'audit.view',
        ]);

        $user->syncPermissions([
            'hr.view',
            'planning.view',
        ]);
    }
}
