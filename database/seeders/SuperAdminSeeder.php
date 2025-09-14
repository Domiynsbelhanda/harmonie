<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);

        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@harmoniedusavoir.org'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('12345678'), // ⚠️ changez en prod
            ]
        );

        if (! $superAdmin->hasRole($superAdminRole->name)) {
            $superAdmin->assignRole($superAdminRole);
        }

        $admin = User::firstOrCreate(
            ['email' => 'administration@harmoniedusavoir.org'],
            [
                'name' => 'Administration',
                'password' => Hash::make('12345678'), // ⚠️ changez en prod
            ]
        );

        if (! $admin->hasRole($adminRole->name)) {
            $admin->assignRole($adminRole);
        }
    }
}
