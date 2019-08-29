<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Mix;
use Faker\Generator as Faker;

$factory->define(Mix::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => str_slug($faker->name)
    ];
});
