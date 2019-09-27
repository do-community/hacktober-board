<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Issue;
use Faker\Generator as Faker;

$factory->define(Issue::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->randomNumber(6),
        'number' => $faker->randomNumber(3),
        'title' => $faker->sentence(6, true),
        'body' => $faker->paragraphs(3, true),
        'original_created_at' => $faker->dateTimeThisMonth(),
        'original_updated_at' => $faker->dateTimeThisMonth()
    ];
});
