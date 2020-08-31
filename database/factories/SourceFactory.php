<?php

/** @var Factory $factory */

use App\Source;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Source::class, function (Faker $faker) {
    return [
        'a' => $a = $faker->numberBetween(1, 1000000),
        'b' => $a % 3,
        'c' => $a % 5
    ];
});
