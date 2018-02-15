<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMonitoresRequest extends FormRequest
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
        //Aqui se especifican las reglas de validacion para este Request
        return [
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date|max:50',
            'email' => 'required|email|max:100',
            'estudios' => 'required|string|max:250',
            'direccion' => 'required|string|max:250'
        ];
    }

    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'nombre.required' => 'Este campo es obligatorio.',
            'nombre.string' => 'El nombre debe de ser una cadena de caracteres.',
            'nombre.max' => 'El maximo de caracteres es 100',
            'apellidos.required' => 'Este campo es obligatorio.',
            'apellidos.string' => 'Los apellidos deben de ser una cadena de caracteres.',
            'apellidos.max' => 'El maximo de caracteres es 100',
            'fecha_nacimiento.required' => 'Este campo es obligatorio.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser en formato fecha',
            'fecha_nacimiento.max' => 'El maximo de caracteres es 50',
            'email.required' => 'Este campo es obligatorio.',
            'email.email' => 'Debe ser un formato de email valido.',
            'email.max' => 'El maximo de caracteres es 100',
            'estudios.required' => 'Este campo es obligatorio.',
            'estudios.string' => 'Los estudios deben de ser una cadena de caracteres.',
            'estudios.max' => 'El maximo de caracteres es 250',
            'direccion.required' => 'Este campo es obligatorio.',
            'direccion.string' => 'La direccion debe de ser una cadena de caracteres.',
            'direccion.max' => 'El maximo de caracteres es 250',

        ];
    }
}
