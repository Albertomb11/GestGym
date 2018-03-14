<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateMonitorAjaxFormRequest extends CreateMonitorFormRequest
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
        if($this->exists('direccion')) {
            $rules['direccion'] = $this->validarDireccion();
        }
        if($this->exists('apellidos')) {
            $rules['apellidos'] = $this->validarApellidos();
        }
        if($this->exists('fecha_nacimiento')) {
            $rules['fecha_nacimiento'] = $this->validarFecha_nacimiento();
        }
        if($this->exists('email')) {
            $rules['email'] = $this->ValidarEmail();
        }
        if($this->exists('estudios')) {
            $rules['estudios'] = $this->validarEstudios();
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
            'direccion' => $errors->get('direccion'),
            'apellidos' => $errors->get('apellidos'),
            'fecha_nacimiento' => $errors->get('fecha_nacimiento'),
            'email' => $errors->get('email'),
            'estudios' => $errors->get('estudios'),
        ]);

        throw new ValidationException($validator, $response);
    }
}
