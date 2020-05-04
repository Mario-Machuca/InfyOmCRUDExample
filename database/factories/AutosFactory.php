<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Autos;
use Faker\Generator as Faker;

$factory->define(Autos::class, function (Faker $faker) {

    return [
        'Marca' => $faker->word,
        'Modelo' => $faker->word,
        'Descripcion' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
