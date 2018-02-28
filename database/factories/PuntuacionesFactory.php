<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Puntuaciones::class, function (Faker $faker) {

    $estrellas = $faker->numberBetween(0, 6);
    $comentario = $faker->realText(255);
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $created_at = ($time1 < $time2) ? $time1 : $time2;
    $updated_at = ($time1 > $time2) ? $time1 : $time2;

    return [
        'estrellas' => $estrellas,
        'comentario' => $comentario,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
