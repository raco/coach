<?php

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'message' => $faker->sentence(6),
        'seen' => false,
    ];
});
