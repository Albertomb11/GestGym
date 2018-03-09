<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreatePuntuacionesRequest;
use App\Monitore;
use App\Puntuacione;
use Illuminate\Http\Request;

class PuntuacionesController extends Controller
{
    public function show($id){
        $monitores = Monitore::where('nombre', $id)->first();

        $puntuaciones = $monitores->puntuaciones()->get();

        return view('puntuaciones.show', [
            'puntuaciones' => $puntuaciones,
            'monitores' => $monitores
        ]);
    }

    public function create(Monitore $monitores, Gimnasio $gimnasio){

        return view('puntuaciones.create', [
            'monitores' => $monitores,
            'gimnasio' => $gimnasio
        ]);
    }

    public function store(CreatePuntuacionesRequest $request, $nombre){
        $monitore = Monitore::where('nombre', $nombre)->first();
        
        Puntuacione::create([
            'monitore_id' => $monitore->id,
            'estrellas' => $request->input('estrellas'),
            'comentario' => $request->input('comentario')
        ]);

        return redirect("monitor/$monitore->nombre/puntuaciones");
    }
}
