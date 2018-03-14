<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateMaquinaAjaxFormRequest extends CreateMaquinaFormRequest
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
        if($this->exists('zona_trabajada')) {
            $rules['zona_trabajada'] = $this->validarZona_trabajada();
        }
        if($this->exists('unidades')) {
            $rules['unidades'] = $this->validarUnidades();
        }
        if($this->exists('descripcion')) {
            $rules['descripcion'] = $this->validarDescripcion();
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
            'zona_trabajada' => $errors->get('zona_trabajada'),
            'unidades' => $errors->get('unidades'),
            'descripcion' => $errors->get('descripcion'),
        ]);

        throw new ValidationException($validator, $response);
    }
}
