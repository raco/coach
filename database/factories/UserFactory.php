
<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'gender' => $faker->randomElement(array('m','f')),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->e164PhoneNumber,
        'password' => bcrypt('123456')
    ];
});
