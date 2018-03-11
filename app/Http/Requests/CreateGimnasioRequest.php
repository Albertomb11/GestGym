<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGimnasioRequest extends FormRequest
{

    /**
     * Autorizamos la validacion
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Especificamos las reglas de validacion
     *
     * @return array
     */
    public function rules()
    {
        // Aquí se especifican las reglas de validación para este Requests
        return [
            'nombre' => 'required|string|max:99999999999',
            'direccion' => 'required|string|max:99999999999',
            'horario_apertura' => 'required|time',
            'horario_cierre' => 'required|time',
            'cuotas' => 'required|string|max:99999999999',
            'descripcion' => 'string|max:99999999999',
        ];
    }

    /**
     * Especificamos los mensajes para las reglas de validacion
     *
     * @return array
     */
    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'nombre.required' => 'Este campo es obligatorio.',
            'nombre.string' => 'El nombre debe de ser una cadena de caracteres.',
            'nombre.max' => 'El maximo de caracteres es 99999999999',
            'direccion.required' => 'Este campo es obligatorio.',
            'direccion.string' => 'La direccion debe de ser una cadena de caracteres.',
            'direccion.max' => 'El maximo de caracteres es 99999999999',
            'horario_apertura.required' => 'Este campo es obligatorio.',
            'horario_apertura.time' => 'El horario de apertura debe de ser tipo time',
            'horario_cierre.required' => 'Este campo es obligatorio.',
            'horario_cierre.time' => 'El horario de cierre debe de ser de tipo time',
            'cuotas.required' => 'Este campo es obligatorio.',
            'cuotas.string' => 'Las cuotas deben de ser una cadena de caracteres.',
            'cuotas.max' => 'El maximo de caracteres es 99999999999',
            'descripcion.string' => 'La descripcion debe de ser una cadena de caracteres.',
            'descripcion.max' => 'El maximo de caracteres es 99999999999'
        ];
    }
}
