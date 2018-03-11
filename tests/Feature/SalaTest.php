<?php

namespace Tests\Feature;

use App\Gimnasio;
use App\Sala;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalaTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Vemos que nos muestra la pagina de las salas correctamente y que se crean correctamente.
     */
    public function testSala()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $response = $this->get($user->username.'/gimnasios'.$gimnasio->nombre.'/salas');
        factory(Sala::class)->create();
        $response->assertSeeText('nombre');
    }

    /**
     * Vemos que la vista de editar sala funciona correctamente.
     */
    public function testMostrarEditarSala()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $sala = factory(Sala::class)->create([
            'gimnasio_id' => $gimnasio->id
        ]);
        $this->actingAs($user);
        $response = $this->get($user->username.'/gimnasios'.$gimnasio->nombre.'/salas'.$sala->nombre.'/edit');
        $response->assertStatus(200);
    }

    /**
     * Vemos que funcion el Update de una sala.
     */
    public function testUpdateSala()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $sala = factory(Sala::class)->create([
            'gimnasio_id' => $gimnasio->id
        ]);
        $this->actingAs($user);
        $this->patch($user->username.'/gimnasios'.$gimnasio->nombre.'/salas'.$sala->nombre.'/edit', [
            'nombre' => 'Manolo'
        ]);
        $this->assertDatabaseHas('salas', [
            'nombre' => 'Manolo',
        ]);
    }

    /**
     * Vemos que podemos borrar una sala.
     */
    public function testBorrarSala()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $sala = factory(Sala::class)->create([
            'gimnasio_id' => $gimnasio->id
        ]);
        $this->actingAs($user);
        $response = $this->post('/sala/delete'.$sala->id);
        $response->assertStatus(405);
    }
}
