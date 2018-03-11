<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMaquinasRequest extends FormRequest
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
        return [
            'nombre' => 'required|string|max:99999999999',
            'zona_trabajada' => 'required|string|max:99999999999',
            'unidades' => 'int|max:99999999999',
            'descripcion' => 'string|max:99999999999'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Este campo es obligatorio.',
            'nombre.string' => 'El nombre debe de ser una cadena de caracteres.',
            'nombre.max' => 'El maximo de caracteres es 99999999999.',
            'zona_trabajada.required' => 'Este campo es obligatorio.',
            'zona_trabajada.string' => 'La zona trabajada debe de ser una cadena de caracteres.',
            'zona_trabajada.max' => 'El maximo de caracteres es 99999999999.',
            'unidades.int' => 'Las unidades deben de ser tipo entero.',
            'unidades.max' => 'El maximo de caracteres es 99999999999.',
            'descripcion.string' => 'La descripcion debe de ser una cadena de caracteres',
            'descripcion.max' => 'El maximo de caracteres es 99999999999'
        ];
    }
}
