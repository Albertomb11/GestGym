<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSalaFormRequest extends FormRequest
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
        $rules['equipamiento'] = $this->validarEquipamiento();
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
        $mensajesEquipamiento = $this->mensajesEquipamiento();
        $mensajes = array_merge(
            $mensajesNombre,
            $mensajesEquipamiento
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
        $mensajes["nombre.regex"] = 'El gimnasio sólo acepta letras y numeros';
        $mensajes["nombre.max"] = 'Has superado el límite de 15 caracteres.';
        return $mensajes;
    }

    /**
     * Validacion para la descripcion
     *
     * @return string
     */
    protected function validarEquipamiento(){
        return 'required';
    }

    /**
     * Mensaje para la validacion de la descripcion
     *
     * @return array
     */
    protected function mensajesEquipamiento(){
        $mensajes = array();
        $mensajes['equipamiento.required'] = 'Es obligatorio introducir el equipamiento';
        return $mensajes;
    }
}
