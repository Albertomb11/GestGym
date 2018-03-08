<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {

    $dia_semana = $faker->dayOfWeek;
    $time = $faker->time($format = 'H:i', $max = 'now');
    $hora_inicio = $time;
    $hora_fin = $time;
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'dia_semana' => $dia_semana,
        'hora_inicio' =>$hora_inicio,
        'hora_fin' => $hora_fin,
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2
    ];
});
