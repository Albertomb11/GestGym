<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActividadesRequest extends FormRequest
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
            'objetivos' => 'string|max:99999999999',
            'intensidad' => 'required|string|max:99999999999',
            'duracion' => 'required|int|max:99999999999',
            'descripcion' => 'string|max:99999999999'
        ];
    }

    public function messages(){
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'nombre.required' => 'Este campo es obligatorio.',
            'nombre.string' => 'El nombre debe de ser una cadena de caracteres.',
            'nombre.max' => 'El maximo de caracteres es 99999999999',
            'objetivos.string' => 'El objetivo debe de ser una cadena de caracteres.',
            'objetivos.max' => 'El maximo de caracteres es 99999999999',
            'intensidad.required' => 'Este campo es obligatorio.',
            'intensidad.string' => 'La intensidad debe de ser una cadena de caracteres.',
            'intensidad.max' => 'El maximo de caracteres es 99999999999',
            'duracion.required' => 'Este campo es obligatorio.',
            'duracion.int' => 'La duracion debe de ser un numero.',
            'duracion.max' => 'El maximo de caracteres es 99999999999',
            'descripcion.string' => 'La descripcion debe de ser una cadena de caracteres.',
            'descripcion.max' => 'El maximo de caracteres es 99999999999'
        ];
    }
}
