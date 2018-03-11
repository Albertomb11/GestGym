<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HorariosController extends Controller
{
    /**
     * En este metodo mostramos una lista de las actividades que hay con sus respectivos horarios.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(){

        return view('horarios.show');
    }

    /**
     * En este metodo creamos un horario para una actividad.(Falta por implementar)
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        return view('horarios.create');
    }
}
