<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array();
        $rules['username'] = $this->validarUsername();
        $rules['email'] = $this->validarEmail();
        return $rules;
    }

    public function messages()
    {
        $mensajesUsername = $this->mensajesUsername();
        $mensajesEmail = $this->mensajesEmail();
        $mensajes = array_merge(
            $mensajesUsername,
            $mensajesEmail
        );
        return $mensajes;
    }
    protected function validarUsername(){
        return 'required|string|regex:/^[A-Za-z0-9]*$/|max:100|unique:users';
    }
    protected function mensajesUsername(){
        $mensajes = array();
        $mensajes["username.required"] = 'Introduzca el nick';
        $mensajes["username.string"] = 'Introduzca el nick';
        $mensajes["username.regex"] = 'El nombre sólo acepta letras y numeros';
        $mensajes["username.max"] = 'Has superado el límite de 15 caracteres.';
        $mensajes["username.unique"] = 'El nombre de usuario no está disponible';
        return $mensajes;
    }
    protected function validarEmail(){
        return 'required|email|regex:/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/|min:8|unique:users';
    }
    protected function mensajesEmail(){
        $mensajes = array();
        $mensajes['email.required'] = 'Es obligatorio introducir el email asd';
        $mensajes['email.email'] = 'Es obligatorio introducir el email';
        $mensajes['email.regex'] = 'Debe introducir una dirección de correo valida';
        $mensajes["email.min"] = 'Como minimo tiene que tener 8 caracteres';
        $mensajes["email.unique"] = 'El email no está disponible';
        return $mensajes;
    }
}
