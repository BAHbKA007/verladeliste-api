<?php

use Faker\Generator as Faker;

$factory->define(App\Artikel::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20)
    ];
});
