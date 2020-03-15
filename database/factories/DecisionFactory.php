<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Decision;
use App\Institution;
use App\User;
use Faker\Generator as Faker;

$factory->define(Decision::class, function (Faker $faker) {
    return [
        'slug' => $faker->slug,
        'title' => $faker->sentence,
        'short_content' => $faker->paragraph,
        'content' => collect($faker->paragraphs(6))
            ->map(fn ($paragraph) => "<p>{$paragraph}</p>")
            ->implode(''),
        'institution_id' => $faker->randomElement(Institution::all()->pluck('id')->toArray()),
    ];
});
