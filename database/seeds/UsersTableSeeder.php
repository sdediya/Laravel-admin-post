<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678'), // Password => password
            'role' => 1
        ]);

    }
}
