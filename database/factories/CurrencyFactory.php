<?php

use Faker\Generator as Faker;

$factory->define(App\Currency::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->name,
        'short_name' => $faker->unique()->word,
        'logo_url' => $faker->url,
        'price' => $faker->randomFloat(2, 0, 100000),
    ];
});
