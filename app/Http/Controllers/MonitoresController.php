<?php

namespace App\Http\Controllers;

use App\Gimnasio;
use App\Http\Requests\CreateMonitorAjaxFormRequest;
use App\Http\Requests\CreateMonitoresRequest;
use App\Monitore;
use App\Puntuacione;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MonitoresController extends Controller
{
    /**
     * Mostramos la pagina de inicio de los monitores, le pasamos los parametros necesarios.
     *
     * @param $username
     * @param $nombre
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($username, $nombre){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $monitores = $gimnasio->monitores()->get();

        return view('monitores.show', [
            'monitores' => $monitores,
            'gimnasio' => $gimnasio,
            'user' => $user
        ]);
    }

    /**
     * Mostramos la pagina de creacion de un monitor.
     *
     * @param User $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(User $username){

        return view('monitores.create', [
           'username' => $username
        ]);
    }

    /**
     * Recogemos los datos enviados por post para procesarlo y guardarlos en la base de datos.
     *
     * @param CreateMonitoresRequest $request
     * @param $username
     * @param $nombre
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateMonitoresRequest $request, $username, $nombre){
        $user = User::where('username', $username)->first();
        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        if( $imagen = $request->file('imagen') ){
            $url = $imagen->store('imagen','public');
        }else{
            $url = "https://picsum.photos/150/150/?random";
        }

        $monitor = Monitore::create([
            'nombre' => $request->input('nombre'),
            'imagen' => $url,
            'apellidos' => $request->input('apellidos'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'estudios' => $request->input('estudios'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email')
        ]);

        // Con el metodo attach hacemos la relacion n a n que tenemos asiganada en sus modelos y se guardara en la tabla pivot.
        $gimnasio->monitores()->attach($monitor);

        return redirect("$user->username/gimnasios/$gimnasio->nombre/monitores");
    }

    /**
     * Mostramos la pagina de edicion de un monitor.
     *
     * @param $username
     * @param $nombre
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($username, $nombre, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $monitor = Monitore::where('id', $id)->first();

        return view('monitores.edit',[
            'user' => $user,
            'gimnasio' => $gimnasio,
            'monitor' => $monitor
        ]);
    }

    /**
     * Recogemos los datos enviados por post para procesarlo y actualizarlo en la base de datos.
     *
     * @param CreateMonitoresRequest $request
     * @param $username
     * @param $nombre
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CreateMonitoresRequest $request, $username, $nombre, $id){
        $user = User::where('username', $username)->first();

        $gimnasio = Gimnasio::where('nombre', $nombre)->first();

        $monitor = Monitore::find($id);

        if( $imagen = $request->file('imagen') ){
            if( !strpos($monitor->imagen, "http") ) {
                $routeParts = explode('/', $monitor->imagen);
                Storage::disk('public')->delete('monitor/'.end($routeParts));
            }

            $url = $imagen->store('monitor','public');
        }else{
            $url = $monitor->imagen;
        }

        $monitor->fill([
            'imagen' => $url,
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'estudios' => $request->input('estudios'),
            'direccion' => $request->input('direccion')
        ]);

        $monitor->update();

        return redirect("$user->username/gimnasios/$gimnasio->nombre/monitores");
    }

    /**
     * Recogemos el id de la entidad y lo borramos con el metodo softDelete.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){
        Monitore::where('id', $id)->delete();

        return redirect('/');
    }

    /**
     * En este metodo le pasamos los parametros para validar el formulario de crear un monitor asincronamente.
     *
     * @param CreateMonitorAjaxFormRequest $request
     * @return array
     */
    public function validacionCreateMonitoresAjax(CreateMonitorAjaxFormRequest $request){
        return array();
    }
}
