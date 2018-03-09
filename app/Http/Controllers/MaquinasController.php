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

        $gimnasio->maquinas()->attach($maquina);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/maquinas");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maquina  $maquinas
     * @return \Illuminate\Http\Response
     */
    public function edit($username, $nombre, $id)
    {
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $maquina = Maquina::where('id', $id)->first();

        return view('maquinas.edit',[
            'user' => $user,
            'gimnasio' => $gimnasio,
            'maquina' => $maquina
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maquina  $maquinas
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMaquinasRequest $request, $username, $nombre, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $maquina = Maquina::find($id);

        $maquina->update([
            'nombre' => $request->input('nombre'),
            'unidades' => $request->input('unidades'),
            'zona_trabajada' => $request->input('zona_trabajada'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/maquinas");
    }

    public function destroy($id){
        Maquina::where('id', $id)->delete();

        return redirect('/');
    }
}
