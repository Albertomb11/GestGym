<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductoFormRequest extends FormRequest
{
    /**
     * Autorizamos la validación.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Especificamos las reglas de validacion.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array();
        $rules['nombre'] = $this->validarNombre();
        $rules['precio'] = $this->validarPrecio();
        $rules['stock'] = $this->validarStock();
        $rules['sabor'] = $this->validarSabor();
        $rules['caracteristicas'] = $this->validarCaracteristicas();
        return $rules;
    }

    /**
     * Especificamos los mensajes para las validaciones.
     *
     * @return array
     */
    public function messages()
    {
        $mensajesNombre = $this->mensajesNombre();
        $mensajesPrecio = $this->mensajesPrecio();
        $mensajesStock = $this->mensajesStock();
        $mensajesSabor = $this->mensajesSabor();
        $mensajesCaracteristicas = $this->mensajesCaracteristicas();
        $mensajes = array_merge(
            $mensajesNombre,
            $mensajesPrecio,
            $mensajesStock,
            $mensajesSabor,
            $mensajesCaracteristicas
        );
        return $mensajes;
    }

    /**
     * Regla de valicacion para el nombre.
     *
     * @return string
     */
    protected function validarNombre(){
        return 'required|string|max:15';
    }

    /**
     * Mensajes para la validacion del nombre.
     *
     * @return array
     */
    protected function mensajesNombre(){
        $mensajes = array();
        $mensajes["nombre.required"] = 'Introduzca el nombre';
        $mensajes["nombre.string"] = 'Introduzca el gimnasio';
        $mensajes["nombre.max"] = 'Has superado el límite de 15 caracteres.';
        return $mensajes;
    }

    /**
     * Validacion para la precio
     *
     * @return string
     */
    protected function validarPrecio(){
        return 'required|int';
    }

    /**
     * Mensajes para la validacion de la precio
     *
     * @return array
     */
    protected function mensajesPrecio(){
        $mensajes = array();
        $mensajes['precio.required'] = 'Es obligatorio introducir la precio';
        $mensajes['precio.int'] = 'Es obligatorio introducir la precio';
        return $mensajes;
    }

    /**
     * Validacion para la stock
     *
     * @return string
     */
    protected function validarStock(){
        return 'required|int';
    }

    /**
     * Mensajes para la validacion de stock
     *
     * @return array
     */
    protected function mensajesStock(){
        $mensajes = array();
        $mensajes['stock.required'] = 'Es obligatorio introducir el stock';
        $mensajes['stock.int'] = 'Es obligatorio introducir el stock';
        return $mensajes;
    }

    /**
     * Validacion para el sabor
     *
     * @return string
     */
    protected function validarSabor(){
        return 'required';
    }

    /**
     * Mensajes para la validacion del sabor.
     *
     * @return array
     */
    protected function mensajesSabor(){
        $mensajes = array();
        $mensajes['sabor.required'] = 'Es obligatorio introducir el sabor';
        return $mensajes;
    }

    /**
     * Validacion para la caracteristicas
     *
     * @return string
     */
    protected function validarCaracteristicas(){
        return 'required';
    }

    /**
     * Mensaje para la validacion de la caracteristicas
     *
     * @return array
     */
    protected function mensajesCaracteristicas(){
        $mensajes = array();
        $mensajes['caracteristicas.required'] = 'Es obligatorio introducir la caracteristicas';
        return $mensajes;
    }
}
