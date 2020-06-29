<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Measurement;
use Faker\Generator as Faker;

$factory->define(Measurement::class, function (Faker $faker) {
    return [
        'instrument_id' => factory(\App\Instrument::class),
        'lot_number_id' => factory(\App\LotNumber::class),
        'reagent_id' => factory(\App\Reagent::class),
        'user_id' => factory(\App\User::class),
        'date' => $faker->date(),
        'time' => $faker->time(),
        'level' => $faker->randomNumber(),
        'value' => $faker->randomFloat(0, 0, 9999999999.),
    ];
});
