<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Email::class, function (Faker $faker) {
    return [
        'address' => $faker->email,
        'user_id' => factory(User::class)->create()->id,
    ];
});
