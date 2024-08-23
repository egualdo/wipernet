<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name' => 'User',
                'description' => 'Usuario del sistema'
            ],
            [
                'name' => 'Admin',
                'description' => 'Administrador del sistema'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
