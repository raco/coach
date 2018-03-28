<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category' => 'Integrales',
        'name' => $faker->sentence(3),
        'description' => $faker->sentence(20),
        'state' => true,
        'image' => $faker->imageUrl(640, 480),
    ];
});
