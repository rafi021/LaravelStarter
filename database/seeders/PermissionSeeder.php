<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{

    public $adminPermissionsArray = [
        'Access Dashboard',
        'Access Role',
        'Create Role',
        'Edit Role',
        'Delete Role',
        'Access User',
        'Create User',
        'Edit User',
        'Delete User',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$modules = Module::all();
        $moduleAdminDashboard = Module::updateOrCreate([
            'module_name' => 'Admin Dashboard',
        ]);


        Permission::updateOrCreate([
            'module_id' => $moduleAdminDashboard->id,
            'permission_name' => $this->adminPermissionsArray[0],
            'permission_slug' => 'app'.'.'.Str::slug($this->adminPermissionsArray[0]),
            ]);

        $moduleAppRole = Module::updateOrCreate([
            'module_name' => 'Role Management',
        ]);

        for ($i=1; $i<count($this->adminPermissionsArray) ; $i++) {
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'permission_name' => $this->adminPermissionsArray[$i],
            'permission_slug' => 'app'.'.'.Str::slug($this->adminPermissionsArray[$i]),
            ]);
        };

    }
}
