<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = [
            [
                'name' => 'test wipernet',
                'password' => Hash::make('12345678'), // password
                'email' => 'test@wipernet.com'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
