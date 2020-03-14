<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Institution;
use Faker\Generator as Faker;

$factory->define(Institution::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(4, true),
        'color' => $faker->randomElement(config('common.institutionColors')),
    ];
});
