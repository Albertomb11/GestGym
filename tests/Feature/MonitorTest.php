<?php

namespace Tests\Feature;

use App\Gimnasio;
use App\Monitore;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MonitorTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Vemos que nos muestra la pagina de los monitores correctamente y que se crean correctamente.
     */
    public function testMonitor()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $response = $this->get($user->username.'/gimnasios'.$gimnasio->nombre.'/monitores');
        factory(Monitore::class)->create();
        $response->assertSeeText('edad');
    }

    /**
     * Vemos que la vista de gestion de un monitor funciona.
     */
    public function testVistaGestionMonitor()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $monitor = factory(Monitore::class)->create();
        $gimnasio->monitores()->attach($monitor);
        $response = $this->get($user->username.'/gimnasios/'.$gimnasio->nombre.'/monitores'.$monitor->nombre);
        $response->assertStatus(200);
    }

    /**
     * Vemos que la vista de editar monitor funciona correctamente.
     */
    public function testMostrarEditarMonitor()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $monitor = factory(Monitore::class)->create();
        $gimnasio->monitores()->attach($monitor);
        $this->actingAs($user);
        $response = $this->get($user->username.'/gimnasios'.$gimnasio->nombre.'/monitores'.$monitor->nombre.'/edit');
        $response->assertStatus(200);
    }

    /**
     * Vemos que funcion el Update de un monitor.
     */
    public function testUpdateMonitor()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $monitor = factory(Monitore::class)->create();
        $gimnasio->monitores()->attach($monitor);
        $this->actingAs($user);
        $this->patch($user->username.'/gimnasios'.$gimnasio->nombre.'/monitores'.$monitor->nombre.'/edit', [
            'nombre' => 'Manolo'
        ]);
        $this->assertDatabaseHas('monitores', [
            'nombre' => 'Manolo',
        ]);
    }

    /**
     * Vemos que podemos borrar un monitor.
     */
    public function testBorrarMonitor()
    {
        $user = factory(User::class)->create();
        $gimnasio = factory(Gimnasio::class)->create([
            'user_id' => $user->id
        ]);
        $monitor = factory(Monitore::class)->create();
        $gimnasio->monitores()->attach($monitor);
        $this->actingAs($user);
        $response = $this->post('/monitor/delete'.$monitor->id);
        $response->assertStatus(405);
    }
}
