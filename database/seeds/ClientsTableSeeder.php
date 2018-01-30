<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('clients')->insert([
			'user_id'=>'2',
			'coach_id'=>'1',
            'state'=>'1',
    	]);
            }
}
