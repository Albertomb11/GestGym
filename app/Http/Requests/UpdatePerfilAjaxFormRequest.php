<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class UpdatePerfilAjaxFormRequest extends UpdatePerfilFormRequest
{
    public function rules()
    {
        $rules = array();
        if($this->exists('name')){
            $rules['name'] = $this->validarName();
        }
        if($this->exists('surname')) {
            $rules['surname'] = $this->validarSurname();
        }
        $rules = array();
        if($this->exists('email')){
            $rules['email'] = $this->validarEmail();
        }
        if($this->exists('movil')) {
            $rules['movil'] = $this->validarMovil();
        }
        $rules = array();
        if($this->exists('website')){
            $rules['website'] = $this->validarWebsite();
        }
        if($this->exists('about')) {
            $rules['about'] = $this->validarAbout();
        }

        return $rules;
    }
    protected function failedValidation($validator)
    {
        $errors = $validator->errors();
        $response = new JsonResponse([
            'name' => $errors->get('name'),
            'surname' => $errors->get('surname'),
            'email' => $errors->get('email'),
            'movil' => $errors->get('movil'),
            'website' => $errors->get('website'),
            'about' => $errors->get('about'),
        ]);

        throw new ValidationException($validator, $response);
    }
}
