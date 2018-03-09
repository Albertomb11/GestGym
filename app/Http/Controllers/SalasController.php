<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreateSalasRequest;
use App\Sala;
use App\User;
use Illuminate\Http\Request;

class SalasController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Sala  $salas
     * @return \Illuminate\Http\Response
     */
    public function show($username, $nombre)
    {
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $salas = $gimnasio->salas()->get();

        return view('salas.show',[
           'salas' => $salas,
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
        return view('salas.create',[
            'username' => $username
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSalasRequest $request, $username, $nombre)
    {
        $user = User::where('username', $username)->first();
        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        Sala::create([
            'nombre' => $request->input('nombre'),
            'gimnasio_id' => $gimnasio->id,
            'equipamiento' => $request->input('equipamiento')
        ]);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/salas");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sala  $salas
     * @return \Illuminate\Http\Response
     */
    public function edit($username, $nombre, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $sala = Sala::where('id', $id)->first();

        return view('salas.edit',[
            'user' => $user,
            'gimnasio' => $gimnasio,
            'sala' => $sala
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sala  $salas
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSalasRequest $request, $username, $nombre, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $sala = Sala::find($id);

        $sala->update([
            'nombre' => $request->input('nombre'),
            'equipamiento' => $request->input('equipamiento'),
        ]);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/salas");
    }

    public function destroy($id){
        Sala::where('id', $id)->delete();

        return redirect('/');
    }
}
