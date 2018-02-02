<?php

use App\Admin;
use App\Client;
use App\Coach;
use App\User;
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
        factory(User::class, 1)->create(['email' => 'admin@admin.com'])->each(function ($user) {
            factory(Admin::class, 1)->create([
                'user_id' => $user->id,
            ]);
        });

        factory(User::class, 1)->create([
                'email' => 'coach@coach.com',
            ])->each(function ($user) {
                factory(Coach::class, 1)->create([
                    'user_id' => $user->id,
                ])->each(function($coach) {
                    factory(User::class, 1)->create(['email' => 'cliente@cliente.com'])
                        ->each(function ($user) use ($coach) {
                            factory(Client::class, 1)->create([
                                'user_id' => $user->id,
                                'coach_id' => $coach->id,
                            ]);
                    });
                });
            });

        factory(User::class, 4)->create()->each(function ($user) {
            factory(Coach::class, 1)->create([
                'user_id' => $user->id,
            ])->each(function($coach) {
                factory(User::class, 10)->create()->each(function ($user) use ($coach) {
                    factory(Client::class, 1)->create([
                        'user_id' => $user->id,
                        'coach_id' => $coach->id,
                    ]);
                });
            });
        });

    }
}
