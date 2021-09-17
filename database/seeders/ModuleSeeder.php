<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public $module_name_Array = [
        'Admin Dashboard',
        'Role Management',
        'User Management',
        'Permission Management'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->module_name_Array as $key => $module) {
        Module::updateOrCreate([
            'module_name' => $module,
            ]);
        }
    }
}
