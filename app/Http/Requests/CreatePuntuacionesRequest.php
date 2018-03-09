<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePuntuacionesRequest extends FormRequest
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
        // Aquí se especifican las reglas de validación para este Requests
        return [
            'estrellas' => 'required|int|max:99999999999',
            'comentario' => 'required|string|max:99999999999'
        ];
    }

    public function message(){
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'estrellas.required' => 'Este campo es obligatorio.',
            'estrellas.int' => 'La estrellas debe de ser un numero.',
            'estrellas.max' => 'El maximo de caracteres es 99999999999',
            'comentario.required' => 'Este campo es obligatorio',
            'comentario.string' => 'Los comentario debe de ser una cadena de caracteres',
            'comentario.max' => 'El maximo de caracteres es 99999999999'
        ];
    }
}
