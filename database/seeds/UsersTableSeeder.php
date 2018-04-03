<?php

use App\User;
use App\Admin;
use App\Coach;
use App\Image;
use App\Client;
use App\Weight;
use App\Message;
use App\Product;
use App\Buyingrequest;
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
                    $products = factory(Product::class, 5)->create(['coach_id' => $coach->id]);
                    factory(User::class, 1)->create(['email' => 'cliente@cliente.com'])
                        ->each(function ($user) use ($coach, $products) {

                            Image::create([
                                'url' => 'http://weknowyourdreams.com/images/fitness/fitness-06.jpg',
                                'comment' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit exercitationem fugiat facilis',
                                'client_id' => $user->id
                            ]);

                            // BUYING REQUEST
                            foreach ($products as $product) {
                                factory(Buyingrequest::class, 1)->create([
                                    'product_id' => $product->id,
                                    'user_id' => $user->id,
                                    'coach_id' => $coach->id,
                                ]);
                            }

                            // COACH SYNC + MESSAGES
                            factory(Client::class, 1)->create([
                                'user_id' => $user->id,
                                'coach_id' => $coach->id,
                                'weight_image' => 'https://juanserranocursos.files.wordpress.com/2015/11/51a7a3fe84d41.jpg',
                            ])->each(function ($client) use ($coach) {
                                factory(Message::class, 1)->create([
                                    'from_id' => $client->user->id,
                                    'from_name' => $client->user->full_name,
                                    'from_rol' => 'Cliente',
                                    'to_id' => $coach->user->id,
                                    'to_name' => $coach->user->full_name,
                                    'to_rol' => 'Coach',
                                ]);
                                factory(Message::class, 1)->create([
                                    'from_id' => $coach->user->id,
                                    'from_name' => $coach->user->full_name,
                                    'from_rol' => 'Coach',
                                    'to_id' => $client->user->id,
                                    'to_name' => $client->user->full_name,
                                    'to_rol' => 'Cliente',
                                ]);
                                factory(Message::class, 1)->create([
                                    'from_id' => $client->user->id,
                                    'from_name' => $client->user->full_name,
                                    'from_rol' => 'Cliente',
                                    'to_id' => $coach->user->id,
                                    'to_name' => $coach->user->full_name,
                                    'to_rol' => 'Coach',
                                ]);
                                factory(Message::class, 1)->create([
                                    'from_id' => $coach->user->id,
                                    'from_name' => $coach->user->full_name,
                                    'from_rol' => 'Coach',
                                    'to_id' => $client->user->id,
                                    'to_name' => $client->user->full_name,
                                    'to_rol' => 'Cliente',
                                ]);
                            });

                            // WEIGHTS
                            factory(Weight::class, 10)->create([
                                'client_id' => $user->id,
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
                        'weight_image' => 'https://juanserranocursos.files.wordpress.com/2015/11/51a7a3fe84d41.jpg',
                    ])->each(function ($client) use ($coach) {
                        Image::create([
                            'url' => 'http://weknowyourdreams.com/images/fitness/fitness-06.jpg',
                            'comment' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit exercitationem fugiat facilis',
                            'client_id' => $client->user->id
                        ]);

                        factory(Message::class, 1)->create([
                            'from_id' => $client->user->id,
                            'from_name' => $client->user->full_name,
                            'from_rol' => 'Cliente',
                            'to_id' => $coach->user->id,
                            'to_name' => $coach->user->full_name,
                            'to_rol' => 'Coach',
                        ]);
                        factory(Message::class, 1)->create([
                            'from_id' => $coach->user->id,
                            'from_name' => $coach->user->full_name,
                            'from_rol' => 'Coach',
                            'to_id' => $client->user->id,
                            'to_name' => $client->user->full_name,
                            'to_rol' => 'Cliente',
                        ]);
                        factory(Message::class, 1)->create([
                            'from_id' => $client->user->id,
                            'from_name' => $client->user->full_name,
                            'from_rol' => 'Cliente',
                            'to_id' => $coach->user->id,
                            'to_name' => $coach->user->full_name,
                            'to_rol' => 'Coach',
                        ]);
                        factory(Message::class, 1)->create([
                            'from_id' => $coach->user->id,
                            'from_name' => $coach->user->full_name,
                            'from_rol' => 'Coach',
                            'to_id' => $client->user->id,
                            'to_name' => $client->user->full_name,
                            'to_rol' => 'Cliente',
                        ]);

                        // WEIGHTS
                        factory(Weight::class, 10)->create([
                            'client_id' => $client->user->id,
                        ]);
                    });
                });
            });
        });


        

    }
}
