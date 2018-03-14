<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMonitorFormRequest extends FormRequest
{
    /**
     * Autorizamos la validación.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Especificamos las reglas de validacion.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array();
        $rules['nombre'] = $this->validarNombre();
        $rules['apellidos'] = $this->validarApellidos();
        $rules['fecha_nacimiento'] = $this->validarFecha_nacimiento();
        $rules['email'] = $this->validarEmail();
        $rules['estudios'] = $this->validarEstudios();
        $rules['direccion'] = $this->validarDireccion();
        return $rules;
    }

    /**
     * Especificamos los mensajes para las validaciones.
     *
     * @return array
     */
    public function messages()
    {
        $mensajesNombre = $this->mensajesNombre();
        $mensajesApellidos = $this->mensajesApellidos();
        $mensajesFecha_nacimiento = $this->mensajesFecha_nacimiento();
        $mensajesEmail = $this->mensajesEmail();
        $mensajesEstudios = $this->mensajesEstudios();
        $mensajesDireccion = $this->mensajesDireccion();
        $mensajes = array_merge(
            $mensajesNombre,
            $mensajesApellidos,
            $mensajesFecha_nacimiento,
            $mensajesEmail,
            $mensajesEstudios,
            $mensajesDireccion
        );
        return $mensajes;
    }

    /**
     * Regla de valicacion para el nombre.
     *
     * @return string
     */
    protected function validarNombre(){
        return 'required|string|regex:/^[A-Za-z0-9]*$/|max:15';
    }

    /**
     * Mensajes para la validacion del nombre.
     *
     * @return array
     */
    protected function mensajesNombre(){
        $mensajes = array();
        $mensajes["nombre.required"] = 'Introduzca el nombre';
        $mensajes["nombre.string"] = 'Introduzca el nombre';
        $mensajes["nombre.regex"] = 'El nombre sólo acepta letras y numeros';
        $mensajes["nombre.max"] = 'Has superado el límite de 15 caracteres.';
        return $mensajes;
    }

    /**
     * Regla de valicacion para el apellidos.
     *
     * @return string
     */
    protected function validarApellidos(){
        return 'required|string|regex:/^[A-Za-z0-9]*$/|max:15';
    }

    /**
     * Mensajes para la validacion del apellidos.
     *
     * @return array
     */
    protected function mensajesApellidos(){
        $mensajes = array();
        $mensajes["apellidos.required"] = 'Introduzca el apellidos';
        $mensajes["apellidos.string"] = 'Introduzca el apellidos';
        $mensajes["apellidos.regex"] = 'El apellidos sólo acepta letras y numeros';
        $mensajes["apellidos.max"] = 'Has superado el límite de 15 caracteres.';
        return $mensajes;
    }

    /**
     * Regla de valicacion para el fecha_nacimiento.
     *
     * @return string
     */
    protected function validarFecha_nacimiento(){
        return 'required|date||max:15';
    }

    /**
     * Mensajes para la validacion del fecha_nacimiento.
     *
     * @return array
     */
    protected function mensajesFecha_nacimiento(){
        $mensajes = array();
        $mensajes["fecha_nacimiento.required"] = 'Introduzca el fecha_nacimiento';
        $mensajes["fecha_nacimiento.date"] = 'Introduzca el fecha_nacimiento';
        $mensajes["fecha_nacimiento.max"] = 'Has superado el límite de 15 caracteres.';
        return $mensajes;
    }

    protected function validarEmail(){
        return 'required|email||min:8';
    }
    protected function mensajesEmail(){
        $mensajes = array();
        $mensajes['email.required'] = 'Es obligatorio introducir el email';
        $mensajes['email.email'] = 'Es obligatorio introducir el email';
        $mensajes["email.min"] = 'Como minimo tiene que tener 8 caracteres';
        return $mensajes;
    }

    protected function validarEstudios(){
        return 'string|max:255';
    }
    protected function mensajesEstudios(){
        $mensajes = array();
        $mensajes["estudios.string"] = 'Introduzca los estudios.';
        $mensajes["estudios.max"] = 'Has superado el límite de 255 caracteres.';
        return $mensajes;
    }

    protected function validarDireccion(){
        return 'string|max:255';
    }
    protected function mensajesDireccion(){
        $mensajes = array();
        $mensajes["direccion.string"] = 'Introduzca la direccion.';
        $mensajes["direccion.max"] = 'Has superado el límite de 255 caracteres.';
        return $mensajes;
    }
}
