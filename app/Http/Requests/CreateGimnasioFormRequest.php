<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGimnasioFormRequest extends FormRequest
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
        $rules['direccion'] = $this->validarDireccion();
        $rules['horario_apertura'] = $this->validarHorarioApertura();
        $rules['horario_cierre'] = $this->validarHorarioCierre();
        $rules['cuotas'] = $this->validarCuotas();
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
        $mensajesDireccion = $this->mensajesDireccion();
        $mensajesHorarioApertura = $this->mensajesHorarioApertura();
        $mensajesHorarioCierre = $this->mensajesHorarioCierre();
        $mensajesCuotas = $this->mensajesCuotas();
        $mensajesDescripcion = $this->mensajesDescripcion();
        $mensajes = array_merge(
            $mensajesNombre,
            $mensajesDireccion,
            $mensajesHorarioApertura,
            $mensajesHorarioCierre,
            $mensajesCuotas,
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
        return 'required|string|regex:/^[A-Za-z0-9]*$/|max:15';
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
        $mensajes["nombre.regex"] = 'El gimnasio sólo acepta letras y numeros';
        $mensajes["nombre.max"] = 'Has superado el límite de 15 caracteres.';
        return $mensajes;
    }

    /**
     * Validacion para la direccion
     *
     * @return string
     */
    protected function validarDireccion(){
        return 'required|string';
    }

    /**
     * Mensajes para la validacion de la direccion
     *
     * @return array
     */
    protected function mensajesDireccion(){
        $mensajes = array();
        $mensajes['direccion.required'] = 'Es obligatorio introducir la direccion';
        $mensajes['direccion.string'] = 'Es obligatorio introducir la direccion';
        return $mensajes;
    }

    /**
     * Validacion para la hora de apertura
     *
     * @return string
     */
    protected function validarHorarioApertura(){
        return 'required';
    }

    /**
     * Mensajes para la validacion de horario de apertura
     *
     * @return array
     */
    protected function mensajesHorarioApertura(){
        $mensajes = array();
        $mensajes['horario_apertura.required'] = 'Es obligatorio introducir el horario de apertura';
        return $mensajes;
    }

    /**
     * Validacion para el horario de cierre
     *
     * @return string
     */
    protected function validarHorarioCierre(){
        return 'required';
    }

    /**
     * Mensajes para la validacion del horario de cierre.
     *
     * @return array
     */
    protected function mensajesHorarioCierre(){
        $mensajes = array();
        $mensajes['horario_cierre.required'] = 'Es obligatorio introducir el horario de cierre';
        return $mensajes;
    }

    /**
     * Validacion para las cuotas
     *
     * @return string
     */
    protected function validarCuotas(){
        return 'required|int';
    }

    /**
     * Mensajes para la validacion de las cuotas
     *
     * @return array
     */
    protected function mensajesCuotas(){
        $mensajes = array();
        $mensajes['cuotas.required'] = 'Es obligatorio introducir las cuotas';
        $mensajes['cuotas.int'] = 'Es obligatorio introducir las cuotas';
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
