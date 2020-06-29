<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LotNumber;
use Faker\Generator as Faker;

$factory->define(LotNumber::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
