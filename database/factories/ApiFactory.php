<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ApiResource;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(ApiResource::class, function (Faker $faker) {
    return [
        return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'api_token' => Str::random(60),
    ];
    ];
});
