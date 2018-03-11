<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

/**
 * Utilizamos faker para generar datos aleatorios.
 */
$factory->define(App\Sala::class, function (Faker $faker) {

    $imagen = 'https://picsum.photos/150/150/?random';
    $nombre = str_replace(" ", "-", $faker->name);
    $equipamiento = $faker->sentence($nbWords = 6, $variableNbWords = true);
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'imagen' => $imagen,
        'nombre' => $nombre,
        'equipamiento' => $equipamiento,
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2
    ];
});
