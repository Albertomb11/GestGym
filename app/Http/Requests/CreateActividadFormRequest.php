<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActividadFormRequest extends FormRequest
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
        $rules['objetivos'] = $this->validarObjetivos();
        $rules['intensidad'] = $this->validarIntensidad();
        $rules['duracion'] = $this->validarDuracion();
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
        $mensajesObjetivos = $this->mensajesObjetivos();
        $mensajesIntensidad = $this->mensajesIntensidad();
        $mensajesDuracion = $this->mensajesDuracion();
        $mensajesDescripcion = $this->mensajesDescripcion();
        $mensajes = array_merge(
            $mensajesNombre,
            $mensajesObjetivos,
            $mensajesIntensidad,
            $mensajesDuracion,
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
        $mensajes["nombre.required"] = 'Introduzca el gimnasio';
        $mensajes["nombre.string"] = 'Introduzca el gimnasio';
        $mensajes["nombre.max"] = 'Has superado el límite de 15 caracteres.';
        return $mensajes;
    }

    /**
     * Validacion para la objetivos
     *
     * @return string
     */
    protected function validarObjetivos(){
        return 'required|string';
    }

    /**
     * Mensajes para la validacion de la objetivos
     *
     * @return array
     */
    protected function mensajesObjetivos(){
        $mensajes = array();
        $mensajes['objetivos.required'] = 'Es obligatorio introducir la direccion';
        $mensajes['objetivos.string'] = 'Es obligatorio introducir la direccion';
        return $mensajes;
    }

    /**
     * Validacion para la hora de intensidad
     *
     * @return string
     */
    protected function validarIntensidad(){
        return 'required';
    }

    /**
     * Mensajes para la validacion de horario de intensidad
     *
     * @return array
     */
    protected function mensajesIntensidad(){
        $mensajes = array();
        $mensajes['intensidad.required'] = 'Es obligatorio introducir el horario de apertura';
        return $mensajes;
    }

    /**
     * Validacion para el duracion
     *
     * @return string
     */
    protected function validarDuracion(){
        return 'required';
    }

    /**
     * Mensajes para la validacion del duracion.
     *
     * @return array
     */
    protected function mensajesDuracion(){
        $mensajes = array();
        $mensajes['duracion.required'] = 'Es obligatorio introducir el horario de cierre';
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
