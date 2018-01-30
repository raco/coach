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
       DB::table('users')->insert([
            'name' => 'Jorge',
            'lastname' => 'Sarmiento',
            'gender' => 'm',
            'phone' => '1234567',
            'email' => 'jorgeantonio16@gmail.com',
            'password' => bcrypt('123456'),         
        ]);

        DB::table('users')->insert([
            'name' => 'Micaela',
            'lastname' => 'Dominguez',
            'gender' => 'f',
            'phone' => '222222',
            'email' => 'mdominguez@gmail.com',
            'password' => bcrypt('123456'),      
        ]);

    }
}
