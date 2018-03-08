<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Actividade::class, function (Faker $faker) {

    $imagen = 'https://picsum.photos/150/150/?random';
    $nombre = $faker->name;
    $objetivos = $faker->sentence($nbWords = 6, $variableNbWords = true);
    $intensidad = $faker->word;
    $duracion = $faker->randomDigit;
    $descripcion = $faker->realText(255);
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $created_at = ($time1 < $time2) ? $time1 : $time2;
    $updated_at = ($time1 > $time2) ? $time1 : $time2;

    return [
        'imagen' => $imagen,
        'nombre' => $nombre,
        'objetivos' => $objetivos,
        'intensidad' => $intensidad,
        'duracion' => $duracion,
        'descripcion' => $descripcion,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
