<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductosRequest extends FormRequest
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
        // Aqui se especifican las reglas de validación para este Request
        return [
            'nombre' => 'required|string|max:99999999999',
            'precio' => 'required|int|max:99999999999',
            'stock' => 'required|int|max:99999999999',
            'sabor' => 'required|string|max:99999999999',
            'caracteristicas' => 'required|string|max:99999999999'
        ];
    }

    public function messages(){
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'nombre.required' => 'Este campo es obligatorio.',
            'nombre.string' => 'El nombre debe de ser una cadena de caracteres.',
            'nombre.max' => 'El maximo de caracteres es 99999999999',
            'precio.required' => 'Este campo es obligatorio.',
            'precio.int' => 'El precio debe de ser un numero.',
            'precio.max' => 'El maximo de caracteres es 99999999999',
            'stock.required' => 'Este campo es obligatorio.',
            'stock.int' => 'El stock debe de ser un numero.',
            'stock.max' => 'El maximo de caracteres es 99999999999',
            'sabor.required' => 'Este campo es obligatorio.',
            'sabor.string' => 'El sabor debe de ser una cadena de caracteres.',
            'sabor.max' => 'El maximo de caracteres es 99999999999',
            'caracteristicas.required' => 'Este campo es obligatorio.',
            'caracteristicas.string' => 'La caracteristicas debe de ser una cadena de caracteres.',
            'caracteristicas.max' => 'El maximo de caracteres es 99999999999',
        ];
    }
}
