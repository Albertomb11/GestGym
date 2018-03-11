<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Vemos si el usuario puede hacer login
     * @test
     */
    public function userCanLogin()
    {
        $user = factory(User::class)->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $this->assertAuthenticatedAs($user);
    }

    /**
     * Vemos si se puede ver el perfil del usuario
     */
    public function testShowPeriflPage()
    {
        $user = factory(User::class)->create();

        $response = $this->get('/'.$user->username);

        $response->assertStatus(200);
    }

    /**
     * Vemos si se puede ver la pagina de edicion del usuario
     */
    public function testEditUserPage()
    {
        $user = factory(User::class)->create();

        $response = $this->get('/'.$user->username.'/edit');

        $response->assertStatus(200);
    }

    /**
     * Vemos que podemos editar el nombre del usuario.
     */
    public function testUpdateUserNombre()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->patch('/'.$user->username.'/edit', [
            'name' => 'Manolo',
        ]);
        $this->assertDatabaseHas('users', [
            'id'        => $user->id,
            'name' => 'Manolo',
        ]);
    }

    /**
     * Vemos que podemos eliminar al usuario logeado.
     */
    public function testBorrarUsuario()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response =  $this->post('/user/delete'.$user->id);
        $response->assertStatus(405);
    }
}
