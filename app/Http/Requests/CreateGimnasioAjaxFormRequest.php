<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateGimnasioAjaxFormRequest extends CreateGimnasioFormRequest
{
    public function rules()
    {
        $rules = array();
        if($this->exists('nombre')){
            $rules['nombre'] = $this->validarNombre();
        }
        if($this->exists('direccion')) {
            $rules['direccion'] = $this->validarDireccion();
        }
        if($this->exists('horario_apertura')) {
            $rules['horario_apertura'] = $this->validarHorarioApertura();
        }
        if($this->exists('horario_cierre')) {
            $rules['horario_cierre'] = $this->validarHorarioCierre();
        }
        if($this->exists('cuotas')) {
            $rules['cuotas'] = $this->validarCuotas();
        }
        if($this->exists('descripcion')) {
            $rules['descripcion'] = $this->validarDescripcion();
        }

        return $rules;
    }
    protected function failedValidation($validator)
    {
        $errors = $validator->errors();
        $response = new JsonResponse([
            'nombre' => $errors->get('nombre'),
            'direccion' => $errors->get('direccion'),
            'horario_apertura' => $errors->get('horario_apertura'),
            'horario_cierre' => $errors->get('horario_cierre'),
            'cuotas' => $errors->get('cuotas'),
            'descripcion' => $errors->get('descripcion'),
        ]);

        throw new ValidationException($validator, $response);
    }
}
