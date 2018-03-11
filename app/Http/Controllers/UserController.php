<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdatePerfilAjaxFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if( $image = $request->file('image') ){
            if( !strpos($user->image, "http") ) {
                $routeParts = explode('/', $user->image);
                Storage::disk('public')->delete('user/'.end($routeParts));
            }

            $url = $image->store('user','public');
        }else{
            $url = $user->image;
        }

        $user->fill([
            'image' => $url,
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'movil' => $request->input('movil'),
            'website' => $request->input('website'),
            'about' => $request->input('about')
        ]);

        $user->update();

        return redirect()->back();
    }

    // Validacion Ajax
    protected function validacionUpdatePerfilAjax(UpdatePerfilAjaxFormRequest $request){
        return array();
    }

    public function destroy($id){
        User::where('id', $id)->delete();

        return redirect('/');
    }
}
