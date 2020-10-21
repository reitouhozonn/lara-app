<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'mail' => $faker->unique()->Email,
        'age'  => $faker->numberBetween($min = 10, $max = 100),

    ];
});
