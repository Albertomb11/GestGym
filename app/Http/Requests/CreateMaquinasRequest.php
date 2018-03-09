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
            'unidades' => 'required|int|max:99999999999',
            'descripcion' => 'required|string|max:99999999999'
        ];
    }
}
