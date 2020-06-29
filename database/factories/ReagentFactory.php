<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reagent;
use Faker\Generator as Faker;

$factory->define(Reagent::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
