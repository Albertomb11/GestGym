<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreateMaquinasRequest;
use App\Maquina;
use App\User;
use Illuminate\Http\Request;

class MaquinasController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Maquina  $maquinas
     * @return \Illuminate\Http\Response
     */
    public function show($username, $nombre)
    {
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $maquinas = $gimnasio->maquinas()->get();

        return view('maquinas.show',[
            'maquinas' => $maquinas,
            'gimnasio' => $gimnasio,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $username)
    {
        return view('maquinas.create',[
           'username' => $username
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMaquinasRequest $request, $username, $nombre)
    {
        $user = User::where('username', $username)->first();
        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $maquina = Maquina::create([
            'nombre' => $request->input('nombre'),
            'zona_trabajada' => $request->input('zona_trabajada'),
            'unidades' => $request->input('unidades'),
            'descripcion' => $request->input('descripcion')
        ]);

        $gimnasio->maquinas()->sync($maquina);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/maquinas");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maquina  $maquinas
     * @return \Illuminate\Http\Response
     */
    public function edit(Maquina $maquinas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maquina  $maquinas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maquina $maquinas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maquina  $maquinas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maquina $maquinas)
    {
        //
    }
}
