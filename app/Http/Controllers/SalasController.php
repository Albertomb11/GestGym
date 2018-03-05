<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreateSalasRequest;
use App\Salas;
use App\User;
use Illuminate\Http\Request;

class SalasController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Salas  $salas
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

        Salas::create([
            'nombre' => $request->input('nombre'),
            'gimnasio_id' => $gimnasio->id,
            'equipamiento' => $request->input('equipamiento')
        ]);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/salas");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salas  $salas
     * @return \Illuminate\Http\Response
     */
    public function edit(Salas $salas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salas  $salas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salas $salas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salas  $salas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salas $salas)
    {
        //
    }
}
