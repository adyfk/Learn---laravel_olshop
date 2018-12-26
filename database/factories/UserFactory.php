<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    $gender = $faker->randomElement(['L', 'P']);
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'no_hp' => $faker->unique()->phoneNumber,
        'j_k' => $gender,
    ];
});
