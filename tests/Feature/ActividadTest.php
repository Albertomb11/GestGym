<?php

namespace Tests\Feature;

use App\Actividade;
use App\Gimnasio;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActividadTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Vemos que nos muestra la pagina de los actividades correctamente y que se crean correctamente.
     */
    public function testActividad()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $response = $this->get($user->username.'/gimnasios'.$gimnasio->nombre.'/actividades');
        factory(Actividade::class)->create();
        $response->assertSeeText('duracion');
    }

    /**
     * Vemos que la vista de editar actividad funciona correctamente.
     */
    public function testMostrarEditarActividad()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $actividad = factory(Actividade::class)->create();
        $gimnasio->monitores()->attach($actividad);
        $this->actingAs($user);
        $response = $this->get($user->username.'/gimnasios'.$gimnasio->nombre.'/actividades'.$actividad->nombre.'/edit');
        $response->assertStatus(200);
    }

    /**
     * Vemos que funcion el Update de una actividad.
     */
    public function testUpdateActividad()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $actividad = factory(Actividade::class)->create();
        $gimnasio->monitores()->attach($actividad);
        $this->actingAs($user);
        $this->patch($user->username.'/gimnasios'.$gimnasio->nombre.'/actividades'.$actividad->nombre.'/edit', [
            'nombre' => 'Manolo'
        ]);
        $this->assertDatabaseHas('actividades', [
            'nombre' => 'Manolo',
        ]);
    }

    /**
     * Vemos que podemos borrar una actividad.
     */
    public function testBorrarActividad()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $actividad = factory(Actividade::class)->create();
        $gimnasio->monitores()->attach($actividad);
        $this->actingAs($user);
        $response = $this->post('/actividad/delete'.$actividad->id);
        $response->assertStatus(405);
    }
}
