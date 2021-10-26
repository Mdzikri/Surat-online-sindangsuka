<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rw;
use Faker\Generator as Faker;

$factory->define(Rw::class, function (Faker $faker) {
    return [
        'no' => $faker->num,
    ];
});
