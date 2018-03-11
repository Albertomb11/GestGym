<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreateSalasRequest;
use App\Sala;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if( $imagen = $request->file('imagen') ){
            $url = $imagen->store('imagen','public');
        }else{
            $url = "https://picsum.photos/150/150/?random";
        }

        Sala::create([
            'nombre' => $request->input('nombre'),
            'gimnasio_id' => $gimnasio->id,
            'imagen' => $url,
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

        if( $imagen = $request->file('imagen') ){
            if( !strpos($sala->imagen, "http") ) {
                $routeParts = explode('/', $sala->imagen);
                Storage::disk('public')->delete('sala/'.end($routeParts));
            }

            $url = $imagen->store('sala','public');
        }else{
            $url = $sala->imagen;
        }

        $sala->fill([
            'imagen' => $url,
            'nombre' => $request->input('nombre'),
            'equipamiento' => $request->input('equipamiento'),
        ]);

        $sala->update();

        return redirect("$user->username/gimnasios/$gimnasio->nombre/salas");
    }

    public function destroy($id){
        Sala::where('id', $id)->delete();

        return redirect('/');
    }
}
