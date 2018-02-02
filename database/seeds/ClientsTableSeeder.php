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
			'user_id'=>'4',
			'coach_id'=>'1',
            'state'=>'1',
    	]);

        DB::table('clients')->insert([
            'user_id'=>'3',
            'coach_id'=>'2',
            'state'=>'1',
        ]);
    }
}
