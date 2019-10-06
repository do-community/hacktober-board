<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Issue;
use Faker\Generator as Faker;

$factory->define(Issue::class, function (Faker $faker) {
    $project = App\Project::inRandomOrder()->first();
    return [
        'id' => $faker->unique()->randomNumber(6),
        'number' => $faker->randomNumber(3),
        'title' => $faker->sentence(6, true),
        'body' => $faker->paragraphs(3, true),
        'html_url' => $faker->url,
        'project_id' => $project->id,
        'project_language' => $project->language,
        'user_id'    => App\User::inRandomOrder()->first()->id,
        'original_created_at' => $faker->dateTimeThisMonth(),
        'original_updated_at' => $faker->dateTimeThisMonth()
    ];
});
