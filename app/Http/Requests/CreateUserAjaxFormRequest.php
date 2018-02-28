<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateUserAjaxFormRequest extends CreateUserFormRequest
{
    public function rules()
    {
        $rules = array();
        if($this->exists('username')){
            $rules['username'] = $this->validarUsername();
        }
        if($this->exists('email')) {
            $rules['email'] = $this->validarEmail();
        }

        return $rules;
    }
    protected function failedValidation($validator)
    {
        $errors = $validator->errors();
        $response = new JsonResponse([
            'username' => $errors->get('username'),
            'email' => $errors->get('email')
        ]);

        throw new ValidationException($validator, $response);
    }
}
