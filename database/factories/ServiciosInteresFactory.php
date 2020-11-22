<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ServiciosIntereses;
use Faker\Generator as Faker;

$factory->define(ServiciosIntereses::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->word
    ];
});
