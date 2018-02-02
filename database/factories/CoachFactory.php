<?php

use Faker\Generator as Faker;

$factory->define(App\Coach::class, function (Faker $faker) {
    return ['state' => true];
});
