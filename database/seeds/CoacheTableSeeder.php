<?php

use Illuminate\Database\Seeder;

class CoacheTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('coaches')->insert([
            'state' => '1',
            'user_id' => '1', 
        ]);
    }
}
