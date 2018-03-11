<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
        return [
            'email' => [
                'required', 'email'
            ]
        ];
    }

    /**
     * Especifimaos los mensajes para las reglas de validacion
     *
     * @return array
     */
    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'email.required' => 'El email es requerido',
            'email.email' => 'Debe ser un formato de email valido'
        ];
    }
}
