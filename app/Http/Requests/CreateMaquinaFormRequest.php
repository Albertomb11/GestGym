<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMaquinaFormRequest extends FormRequest
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
        $rules['zona_trabajada'] = $this->validarZona_trabajada();
        $rules['unidades'] = $this->validarUnidades();
        $rules['descripcion'] = $this->validarDescripcion();
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
        $mensajesZona_trabajada = $this->mensajesZona_trabajada();
        $mensajesUnidades = $this->mensajesUnidades();
        $mensajesDescripcion = $this->mensajesDescripcion();
        $mensajes = array_merge(
            $mensajesNombre,
            $mensajesZona_trabajada,
            $mensajesUnidades,
            $mensajesDescripcion
        );
        return $mensajes;
    }

    /**
     * Regla de valicacion para el nombre.
     *
     * @return string
     */
    protected function validarNombre(){
        return 'required|string|max:15';
    }

    /**
     * Mensajes para la validacion del nombre.
     *
     * @return array
     */
    protected function mensajesNombre(){
        $mensajes = array();
        $mensajes["nombre.required"] = 'Introduzca el nombre';
        $mensajes["nombre.string"] = 'Introduzca el gimnasio';
        $mensajes["nombre.max"] = 'Has superado el límite de 15 caracteres.';
        return $mensajes;
    }

    /**
     * Validacion para la direccion
     *
     * @return string
     */
    protected function validarZona_trabajada(){
        return 'required|string';
    }

    /**
     * Mensajes para la validacion de la direccion
     *
     * @return array
     */
    protected function mensajesZona_trabajada(){
        $mensajes = array();
        $mensajes['zona_trabajada.required'] = 'Es obligatorio introducir la zona trabajada';
        $mensajes['zona_trabajada.string'] = 'Es obligatorio introducir la zona trabajada';
        return $mensajes;
    }

    /**
     * Validacion para la hora de apertura
     *
     * @return string
     */
    protected function validarUnidades(){
        return 'required';
    }

    /**
     * Mensajes para la validacion de horario de apertura
     *
     * @return array
     */
    protected function mensajesUnidades(){
        $mensajes = array();
        $mensajes['unidades.required'] = 'Es obligatorio introducir el unidades';
        return $mensajes;
    }

    /**
     * Validacion para la descripcion
     *
     * @return string
     */
    protected function validarDescripcion(){
        return 'string';
    }

    /**
     * Mensaje para la validacion de la descripcion
     *
     * @return array
     */
    protected function mensajesDescripcion(){
        $mensajes = array();
        $mensajes['descripcion.string'] = 'Es obligatorio introducir la descripcion';
        return $mensajes;
    }
}
