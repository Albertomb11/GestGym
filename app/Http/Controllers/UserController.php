<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdatePerfilAjaxFormRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function perfil($username){
        $user = User::where('username',$username)->first();

        return view('user.perfil',[
            'user' => $user,
            'username' => $username
        ]);
    }

    /**
     * Funcion que muestra el formulario para actualizar los datos del usuario
     * @param $name
     * @return $this
     */
    public function edit($username){
        $username = User::where('username', $username)->first();

        return view('user.edit')->with('username', $username);
    }


    public function update(CreateUserRequest $request, $id){
        $user = User::find($id);
        $user->name = $_POST['name'] ? $_POST['name']:null;
        $user->surname = $_POST['surname'] ? $_POST['surname']:null;
        $user->email = $request->input('email');
        $user->movil = $_POST['movil'] ? $_POST['movil']:null;
        $user->website = $_POST['website'] ? $_POST['website']:null;
        $user->about = $_POST['about'] ? $_POST['about']:null;

        $user->save();

        return redirect()->back();
    }

    // Validacion Ajax
    protected function validacionUpdatePerfilAjax(UpdatePerfilAjaxFormRequest $request){
        return array();
    }

}
