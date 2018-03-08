<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {

    $image = 'https://picsum.photos/150/150/?random';
    $name = $faker->name;
    $surname = $faker->lastName;
    $username = str_replace(" ",".", $name . ".". $surname);
    $usernamefinal = str_replace("..",".", $username);
    $email = $faker->email;
    $movil = $faker->e164PhoneNumber;
    $website = $faker->url;
    $about = $faker->realText(255);
    $password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; //secret
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());

    return [
        'image' => $image,
        'name' => $name,
        'surname' => $surname,
        'username' => $usernamefinal,
        'email' => $email,
        'movil' => $movil,
        'website' => $website,
        'about' => $about,
        'password' => $password, // secret
        'remember_token' => str_random(10),
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2
    ];
});
