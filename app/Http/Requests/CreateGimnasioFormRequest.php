<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGimnasioFormRequest extends FormRequest
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
        $rules['nombre'] = $this->validarNombre();
        $rules['direccion'] = $this->validarDireccion();
        $rules['horario_apertura'] = $this->validarHorarioApertura();
        $rules['horario_cierre'] = $this->validarHorarioCierre();
        $rules['cuotas'] = $this->validarCuotas();
        $rules['descripcion'] = $this->validarDescripcion();
        return $rules;
    }

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
    protected function validarNombre(){
        return 'required|string|regex:/^[A-Za-z0-9]*$/|max:15';
    }
    protected function mensajesNombre(){
        $mensajes = array();
        $mensajes["nombre.required"] = 'Introduzca el gimnasio';
        $mensajes["nombre.string"] = 'Introduzca el gimnasio';
        $mensajes["nombre.regex"] = 'El gimnasio sólo acepta letras y numeros';
        $mensajes["nombre.max"] = 'Has superado el límite de 15 caracteres.';
        return $mensajes;
    }
    protected function validarDireccion(){
        return 'required|string';
    }
    protected function mensajesDireccion(){
        $mensajes = array();
        $mensajes['direccion.required'] = 'Es obligatorio introducir la direccion';
        $mensajes['direccion.string'] = 'Es obligatorio introducir la direccion';
        return $mensajes;
    }
    protected function validarHorarioApertura(){
        return 'required';
    }
    protected function mensajesHorarioApertura(){
        $mensajes = array();
        $mensajes['horario_apertura.required'] = 'Es obligatorio introducir el horario de apertura';
//        $mensajes['horario_apertura'] = 'Es obligatorio introducir el horario de apertura';
        return $mensajes;
    }
    protected function validarHorarioCierre(){
        return 'required';
    }
    protected function mensajesHorarioCierre(){
        $mensajes = array();
        $mensajes['horario_cierre.required'] = 'Es obligatorio introducir el horario de cierre';
//        $mensajes['horario_cierre'] = 'Es obligatorio introducir el horario de cierre';
        return $mensajes;
    }
    protected function validarCuotas(){
        return 'required|int';
    }
    protected function mensajesCuotas(){
        $mensajes = array();
        $mensajes['cuotas.required'] = 'Es obligatorio introducir las cuotas';
        $mensajes['cuotas.int'] = 'Es obligatorio introducir las cuotas';
        return $mensajes;
    }
    protected function validarDescripcion(){
        return 'string';
    }
    protected function mensajesDescripcion(){
        $mensajes = array();
        $mensajes['descripcion.string'] = 'Es obligatorio introducir la descripcion';
        return $mensajes;
    }
}
