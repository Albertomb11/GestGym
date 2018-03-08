<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGimnasioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Aquí se especifican las reglas de validación para este Requests
        return [
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:250',
            'horario_apertura' => 'required',
            'horario_cierre' => 'required',
            'cuotas' => 'required|string|max:250',
            'descripcion' => 'required|string|max:250',
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
            'direccion.required' => 'Este campo es obligatorio.',
            'direccion.string' => 'La direccion debe de ser una cadena de caracteres.',
            'direccion.max' => 'El maximo de caracteres es 250',
            'horario_apertura.required' => 'Este campo es obligatorio.',
            'horario_cierre.required' => 'Este campo es obligatorio.',
            'cuotas.required' => 'Este campo es obligatorio.',
            'cuotas.string' => 'Las cuotas deben de ser una cadena de caracteres.',
            'cuotas.max' => 'El maximo de caracteres es 250',
            'descripcion.required' => 'Este campo es obligatorio.',
            'descripcion.string' => 'La descripcion debe de ser una cadena de caracteres.',
            'descripcion.max' => 'El maximo de caracteres es 500'
        ];
    }
}
