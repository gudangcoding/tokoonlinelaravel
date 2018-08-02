<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'=>'Admin',
            'email'=>'admin@hanifa.dev',
            'password'=>bcrypt('love'),
            'role'=>'admin'
        ]);

        App\User::create([
            'name'=>'customer',
            'email'=>'customer@gmail.com',
            'password'=>bcrypt('12345'),
            'role'=>'customer'
        ]);
    }
}
