<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreatePuntuacionesRequest;
use App\Monitore;
use App\Puntuacione;
use Illuminate\Http\Request;

class PuntuacionesController extends Controller
{
    /**
     * Mostramos la pagina inicial de las puntuaciones, le pasamos los parametros necesarios.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $monitores = Monitore::where('nombre', $id)->first();

        $puntuaciones = $monitores->puntuaciones()->get();

        return view('puntuaciones.show', [
            'puntuaciones' => $puntuaciones,
            'monitores' => $monitores
        ]);
    }

    /**
     * Mostramos la pagina de creacion de una puntuacion
     *
     * @param Monitore $monitores
     * @param Gimnasio $gimnasio
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Monitore $monitores, Gimnasio $gimnasio){

        return view('puntuaciones.create', [
            'monitores' => $monitores,
            'gimnasio' => $gimnasio
        ]);
    }

    /**
     * Recogemos los datos enviados por post y lo procesamos para guardarlos en la base de datos.
     *
     * @param CreatePuntuacionesRequest $request
     * @param $nombre
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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
