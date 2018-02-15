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
            'nombre' => 'required|string|max:100',
            'objetivos' => 'required|string|max:100',
            'intensidad' => 'required|string|max:100',
            'duracion' => 'required|int|max:200',
            'horario' => 'required|string|max:250',
            'descripcion' => 'required|string|max:250'
        ];
    }

    public function messages(){
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'nombre.required' => 'Este campo es obligatorio.',
            'nombre.string' => 'El nombre debe de ser una cadena de caracteres.',
            'nombre.max' => 'El maximo de caracteres es 100',
            'objetivos.required' => 'Este campo es obligatorio.',
            'objetivos.string' => 'El objetivo debe de ser una cadena de caracteres.',
            'objetivos.max' => 'El maximo de caracteres es 100',
            'intensidad.required' => 'Este campo es obligatorio.',
            'intensidad.string' => 'La intensidad debe de ser una cadena de caracteres.',
            'intensidad.max' => 'El maximo de caracteres es 100',
            'duracion.required' => 'Este campo es obligatorio.',
            'duracion.int' => 'La duracion debe de ser un numero.',
            'duracion.max' => 'El maximo de caracteres es 200',
            'horario.required' => 'Este campo es obligatorio.',
            'horario.string' => 'El horario debe de ser en formato "hora:minutos".',
            'horario.max' => 'El maximo de caracteres es 250',
            'descripcion.required' => 'Este campo es obligatorio.',
            'descripcion.string' => 'La descripcion debe de ser una cadena de caracteres.',
            'descripcion.max' => 'El maximo de caracteres es 250'
        ];
    }
}
