<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Notas;
use Faker\Generator as Faker;

$factory->define(Notas::class, function (Faker $faker) {

    return [
        'titulo' => $faker->word,
        'contenido' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
