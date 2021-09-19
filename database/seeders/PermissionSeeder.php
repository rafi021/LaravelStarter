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
    ];

    public $rolePermissionArray = [
        'Access Role',
        'Create Role',
        'Edit Role',
        'Delete Role',
    ];

    public $userPermissionArray =[
        'Access User',
        'Create User',
        'Edit User',
        'Delete User',
    ];

    public $backPermissionArry = [
        'Backend Index',
        'Backend Create',
        'Backend Download',
        'Backend Delete',
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

        // Create Role Permissions
        $moduleAppRole = Module::updateOrCreate([
            'module_name' => 'Role Management',
        ]);

        for ($i=0; $i<count($this->rolePermissionArray) ; $i++) {
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'permission_name' => $this->rolePermissionArray[$i],
            'permission_slug' => 'app'.'.'.Str::slug($this->rolePermissionArray[$i]),
            ]);
        };

        // Create User Permissions
        $moduleAppUser = Module::updateOrCreate([
            'module_name' => 'User Management',
        ]);

        for ($i=0; $i<count($this->userPermissionArray) ; $i++) {
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'permission_name' => $this->userPermissionArray[$i],
            'permission_slug' => 'app'.'.'.Str::slug($this->userPermissionArray[$i]),
            ]);
        };

        // Create Backup Permissions
        $moduleAppBackup = Module::updateOrCreate([
            'module_name' => 'Backup Management',
        ]);

        for ($i=0; $i<count($this->backPermissionArry) ; $i++) {
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackup->id,
            'permission_name' => $this->backPermissionArry[$i],
            'permission_slug' => 'app'.'.'.Str::slug($this->backPermissionArry[$i]),
            ]);
        };

    }
}
