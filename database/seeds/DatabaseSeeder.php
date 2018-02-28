<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create()->each(function (App\User $user){

            factory(\App\Gimnasio::class, 10)->create(['user_id' => $user->id]);
        });

        factory(App\Gimnasio::class, 10)->create()->each(function (App\Gimnasio $gimnasio){

            factory(\App\Productos::class, 10)->create(['gimnasio_is' => $gimnasio->id]);
            factory(\App\Monitores::class, 10)->create(['gimnasio_id' => $gimnasio->id]);
            factory(\App\Actividades::class, 10)->create(['gimnasio_id' => $gimnasio->id]);
        });

    }
}

