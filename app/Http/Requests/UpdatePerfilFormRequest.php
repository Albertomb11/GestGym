<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerfilFormRequest extends FormRequest
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
        $rules['name'] = $this->validarName();
        $rules['surname'] = $this->validarSurname();
        $rules['email'] = $this->validarEmail();
        $rules['movil'] = $this->validarMovil();
        $rules['website'] = $this->validarWebsite();
        $rules['about'] = $this->validarAbout();
        return $rules;
    }

    public function messages()
    {
        $mensajesName = $this->mensajesName();
        $mensajesSurname = $this->mensajesSurname();
        $mensajesEmail = $this->mensajesEmail();
        $mensajesMovil = $this->mensajesMovil();
        $mensajesWebsite = $this->mensajesWebsite();
        $mensajesAbout = $this->mensajesAbout();
        $mensajes = array_merge(
            $mensajesName,
            $mensajesSurname,
            $mensajesEmail,
            $mensajesMovil,
            $mensajesWebsite,
            $mensajesAbout
        );
        return $mensajes;
    }
    protected function validarName(){
        return 'string|regex:/^[A-Za-z]*$/|max:100  ';
    }
    protected function mensajesName(){
        $mensajes = array();
        $mensajes["name.string"] = 'Introduzca el nombre.';
        $mensajes["name.regex"] = 'El nombre sólo acepta letras.';
        $mensajes["name.max"] = 'Has superado el límite de 100   caracteres.';
        return $mensajes;
    }

    protected function validarSurname(){
        return 'string|regex:/^[A-Za-z]*$/|max:100';
    }
    protected function mensajesSurname(){
        $mensajes = array();
        $mensajes["surname.string"] = 'Introduzca el apellido.';
        $mensajes["surname.regex"] = 'El apellido sólo acepta letras.';
        $mensajes["surname.max"] = 'Has superado el límite de 100 caracteres.';
        return $mensajes;
    }

    protected function validarEmail(){
        return 'required|string|regex:/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/|min:8|unique:users';
    }
    protected function mensajesEmail(){
        $mensajes = array();
        $mensajes['email.required'] = 'Es obligatorio introducir el email';
        $mensajes['email.string'] = 'Es obligatorio introducir el email';
        $mensajes['email.regex'] = 'Debe introducir una dirección de correo valida';
        $mensajes["email.min"] = 'Como minimo tiene que tener 8 caracteres';
        $mensajes["email.unique"] = 'El email no está disponible';
        return $mensajes;
    }

    protected function validarMovil(){
        return 'int|regex:/^[0-9]*$/|max:20|min:9';
    }
    protected function mensajesMovil(){
        $mensajes = array();
        $mensajes["movil.int"] = 'Introduzca el movil.';
        $mensajes["movil.regex"] = 'El movil sólo acepta numeros.';
        $mensajes["movil.max"] = 'Has superado el límite de 20 caracteres.';
        $mensajes["movil.min"] = 'El minimo son 9 caracteres.';
        return $mensajes;
    }

    protected function validarWebsite(){
        return 'string|max:255';
    }
    protected function mensajesWebsite(){
        $mensajes = array();
        $mensajes["website.string"] = 'Introduzca la página web.';
        $mensajes["website.max"] = 'Has superado el límite de 255 caracteres.';
        return $mensajes;
    }

    protected function validarAbout(){
        return 'string|max:255';
    }
    protected function mensajesAbout(){
        $mensajes = array();
        $mensajes["about.string"] = 'Introduzca la descripcion.';
        $mensajes["about.max"] = 'Has superado el límite de 255 caracteres.';
        return $mensajes;
    }

}
