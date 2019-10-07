<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Project;
use Faker\Generator as Faker;

$languages = ['JavaScript', 'Python', 'PHP', 'Ruby', 'Go', 'TypeScript'];

$factory->define(Project::class, function (Faker $faker) use ($languages) {
    return [
        'id' => $faker->unique()->randomNumber(6),
        'name' => $faker->slug(3, true),
        'full_name' => $faker->sentence(4, true),
        'description' => $faker->sentence(8, true),
        'html_url' => $faker->url,
        'language' => $languages[array_rand($languages)],
        'stars' => $faker->randomNumber(3)
    ];
});
