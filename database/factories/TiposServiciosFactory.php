<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TiposServicios;
use Faker\Generator as Faker;

$factory->define(TiposServicios::class, function (Faker $faker) {
    return [
         'descripcion' => $faker->word
    ];
});
