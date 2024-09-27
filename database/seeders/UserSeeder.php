<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //create data user
        $userCreate = \App\Models\User::create([
            'name'      => 'Daffa Fauzan',
            'email'     => 'daffa@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        //assign permission to role
        $role = Role::find(1);
        $permissions = Permission::all();

        $role->syncPermissions($permissions);

        //assign role with permission to user
        $user = \App\Models\User::find(1);
        $user->assignRole($role->name);
    }
}
