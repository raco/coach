<?php

use App\Weight;
use Faker\Generator as Faker;

$factory->define(Weight::class, function (Faker $faker) {
    return [
        'kg' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
    ];
});
