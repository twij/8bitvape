<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Mix;
use Faker\Generator as Faker;
use Illuminate\Support\Str;;

$factory->define(Mix::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => Str::slug($faker->name)
    ];
});
