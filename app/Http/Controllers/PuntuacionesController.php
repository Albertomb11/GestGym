<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreatePuntuacionesRequest;
use App\Monitores;
use App\Puntuaciones;
use Illuminate\Http\Request;

class PuntuacionesController extends Controller
{
    public function show($id){

        $monitores = Monitores::where('id', $id)->first();

        $puntuaciones = $monitores->puntuacion()->get();
        //dd($puntuaciones);
        return view('puntuaciones.show', [
            'puntuaciones' => $puntuaciones,
            'monitores' => $monitores
        ]);
    }

    public function create(Monitores $monitores, Gimnasio $gimnasio){

        return view('puntuaciones.create', [
            'monitores' => $monitores,
            'gimnasio' => $gimnasio
        ]);
    }

    public function store(CreatePuntuacionesRequest $request, Monitores $monitores){

        Puntuaciones::create([
            'monitores_id' => $monitores->id,
            'estrellas' => $request->input('estrellas'),
            'comentario' => $request->input('comentario')
        ]);

        return redirect("monitor/$monitores->nombre/puntuaciones");
    }
}
