<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    /**
     * Vemos que se ve la pagina home.
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Vemos que se ve la pagina de contacto.
     *
     * @return void
     */
    public function testContacto()
    {
        $response = $this->get('/contacto');

        $response->assertStatus(200);
    }

    /**
     * Vemos que se ve la pagina de gimnasios para usuarios no logueados.
     *
     * @return void
     */
    public function testGimnasiosPublico()
    {
        $response = $this->get('/gimnasios');

        $response->assertStatus(200);
    }
}
