<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public $RoleArray = [
        'Admin',
        'User',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermissions = Permission::all();

        // Cretae admin role and assign all permission on it
        Role::updateOrCreate([
            'role_name' => 'Admin',
            'role_slug' => 'admin',
            'role_note' => 'admin has all the permissions',
            'deleteable' => false,
        ])->permissions()->sync($adminPermissions->pluck('id'));

        // Create user role
        Role::updateOrCreate([
            'role_name' => 'User',
            'role_slug' => 'user',
            'role_note' => 'user has limited permissions',
            'deleteable' => true,
        ]);
    }
}
