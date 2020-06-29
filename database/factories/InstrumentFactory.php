<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Instrument;
use Faker\Generator as Faker;

$factory->define(Instrument::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
