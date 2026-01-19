<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@gov.local'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('Admin@168'),
                'type' => 'admin',
                'is_active' => 1,
            ]
        );

        $admin->assignRole('admin');
    }
}
