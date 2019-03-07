<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Book::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(20),
        'author' => $faker->firstName . ' ' . $faker->lastName,
        'year' => $faker->numberBetween(1500, 2019)
    ];
});
