<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Institution;
use App\User;
use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'slug' => $faker->slug,
        'title' => $faker->sentence,
        'content' => collect($faker->paragraphs(6))
            ->map(fn ($paragraph) => "<p>{$paragraph}</p>")
            ->implode(''),
        'institution_id' => $faker->randomElement(Institution::all()->pluck('id')->toArray()),
        'user_id' => User::first()->id,
    ];
});
