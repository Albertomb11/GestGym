<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateSalaAjaxFormRequest extends CreateSalaFormRequest
{
    /**
     * Especificamos las reglas de validacion asincrona.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array();
        if($this->exists('nombre')){
            $rules['nombre'] = $this->validarNombre();
        }
        if($this->exists('equipamiento')) {
            $rules['equipamiento'] = $this->validarEquipamiento();
        }

        return $rules;
    }

    /**
     * Decimos que salte las validaciones cuando falle.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation($validator)
    {
        $errors = $validator->errors();
        $response = new JsonResponse([
            'nombre' => $errors->get('nombre'),
            'equipamiento' => $errors->get('equipamiento'),
        ]);

        throw new ValidationException($validator, $response);
    }
}
