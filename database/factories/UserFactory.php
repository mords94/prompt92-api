<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'date_of_birth' => $faker->date(),
    ];
});
