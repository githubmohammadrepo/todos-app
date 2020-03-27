<?php

use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->text(),
        'is_complete' => $faker->boolean(),
        'created_at' =>now(),
        'created_at' => now(),
    ];
});
