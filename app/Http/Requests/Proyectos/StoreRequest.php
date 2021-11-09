<?php

namespace App\Http\Requests\Proyectos;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'nombre' => 'required|unique:proyectos|max:255',
            'imagen' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'descripcion' => 'required',
            'url' => 'required|unique:proyectos|max:255',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Es necesario el campo nombre.',
            'nombre.unique' => 'Ya se ha registrado este nombre',
            'nombre.max' => 'Solo se admiten hasta 255 caracteres',

            'imagen.mimes' => 'Solo se admiten formatos peg,jpg,png,gif.',
            'imagen.required' => 'Es necesario el campo imagen.',

            'descripcion.required' => 'Es necesario el campo descripción.',

            'url.required' => 'Es necesario el campo url.',
            'url.unique' => 'Ya se ha registrado este proyecto',
            'url.max' => 'Solo se admiten hasta 255 caracteres',

        ];
    }
}
