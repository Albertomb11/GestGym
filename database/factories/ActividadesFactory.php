<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Actividades::class, function (Faker $faker) {

    $nombre = $faker->name;
    $objetivos = $faker->sentence($nbWords = 6, $variableNbWords = true);
    $intensidad = $faker->word;
    $duracion = $faker->randomDigit;
    $horario = $faker->time($format = 'H:i:s', $max = 'now');
    $descripcion = $faker->realText(255);
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $created_at = ($time1 < $time2) ? $time1 : $time2;
    $updated_at = ($time1 > $time2) ? $time1 : $time2;

    return [
        'nombre' => $nombre,
        'objetivos' => $objetivos,
        'intensidad' => $intensidad,
        'duracion' => $duracion,
        'horario' => $horario,
        'descripcion' => $descripcion,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
