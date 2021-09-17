<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Admin
        $adminRole = Role::where('role_slug', 'admin')->first();
        User::updateOrCreate([
            'role_id' => $adminRole->id,
            'name' =>'Admin',
            'email' =>'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'status' => true,
        ]);

        //Create User
        $userRole = Role::where('role_slug','user')->first();
        User::updateOrCreate([
            'role_id' => $userRole->id,
            'name' =>'User',
            'email' =>'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'status' => true,
        ]);
    }
}
