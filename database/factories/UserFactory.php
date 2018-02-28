<?php

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

    $name = $faker->name;
    $surname = $faker->lastName;
    $username = $name.'.'.$surname;
    $email = $name.'.'.$surname.'@'.$faker->safeEmailDomain;
//    $movil = $faker->e164PhoneNumber;
    $website = $faker->url;
    $about = $faker->realText(255);
    $password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; //secret

    return [
        'name' => $name,
        'surname' => $surname,
        'username' => $username,
        'email' => $email,
//        'movil' => $movil,
        'website' => $website,
        'about' => $about,
        'password' => $password, // secret
        'remember_token' => str_random(10),
    ];
});
