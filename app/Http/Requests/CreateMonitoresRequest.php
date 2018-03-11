<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMonitoresRequest extends FormRequest
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
        //Aqui se especifican las reglas de validacion para este Request
        return [
            'nombre' => 'required|string|max:99999999999',
            'apellidos' => 'required|string|max:99999999999',
            'fecha_nacimiento' => 'required|date|max:99999999999',
            'email' => 'required|email|max:99999999999',
            'estudios' => 'required|string|max:99999999999',
            'direccion' => 'required|string|max:99999999999'
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
            'apellidos.required' => 'Este campo es obligatorio.',
            'apellidos.string' => 'Los apellidos deben de ser una cadena de caracteres.',
            'apellidos.max' => 'El maximo de caracteres es 99999999999',
            'fecha_nacimiento.required' => 'Este campo es obligatorio.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser en formato fecha',
            'fecha_nacimiento.max' => 'El maximo de caracteres es 99999999999',
            'email.required' => 'Este campo es obligatorio.',
            'email.email' => 'Debe ser un formato de email valido.',
            'email.max' => 'El maximo de caracteres es 99999999999',
            'estudios.required' => 'Este campo es obligatorio.',
            'estudios.string' => 'Los estudios deben de ser una cadena de caracteres.',
            'estudios.max' => 'El maximo de caracteres es 99999999999',
            'direccion.required' => 'Este campo es obligatorio.',
            'direccion.string' => 'La direccion debe de ser una cadena de caracteres.',
            'direccion.max' => 'El maximo de caracteres es 99999999999',

        ];
    }
}
