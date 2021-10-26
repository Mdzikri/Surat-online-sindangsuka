<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rt;
use Faker\Generator as Faker;

$factory->define(Rt::class, function (Faker $faker) {
    return [
        'rw_id' => $faker->num,
        'no' => $faker->num,
    ];
});
