<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateProductoAjaxFormRequest extends CreateProductoFormRequest
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
        if($this->exists('precio')) {
            $rules['precio'] = $this->validarPrecio();
        }
        if($this->exists('stock')) {
            $rules['stock'] = $this->validarStock();
        }
        if($this->exists('sabor')) {
            $rules['sabor'] = $this->validarSabor();
        }
        if($this->exists('caracteristicas')) {
            $rules['caracteristicas'] = $this->validarCaracteristicas();
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
            'precio' => $errors->get('precio'),
            'stock' => $errors->get('stock'),
            'sabor' => $errors->get('sabor'),
            'caracteristicas' => $errors->get('caracteristicas'),
        ]);

        throw new ValidationException($validator, $response);
    }
}
