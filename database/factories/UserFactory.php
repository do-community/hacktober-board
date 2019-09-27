<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->randomNumber(6),
        'username' => $faker->userName,
        'avatar' => $faker->imageUrl(80, 80, 'cats')
    ];
});
