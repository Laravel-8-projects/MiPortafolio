<?php

namespace App\Http\Requests\User\Contact;

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
            'nombre' => 'string|required|max:255',
            'email' => 'required|unique:contacts|max:60|email',
            'telefono' => 'string|required|unique:contacts|max:10',
            'mensaje' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nombre.string' => 'Solo texto.',
            'nombre.required' => 'Es necesario el campo nombre.',
            'nombre.max' => 'Solo se admiten hasta 255 caracteres',

            'email.required' => 'Campo requerido.',
            'email.unique' => 'Ya se ha registrado este email.',
            'email.max' => 'Se admite 60 caracteres.',
            'email.email' => 'No es un email válido.',

            'telefono.required' => 'Es necesario el campo teléfono.',
            'telefono.unique' => 'Ya se ha registrado este teléfono.',
            'telefono.max' => 'Se admite 10 caracteres.',

            'mensaje.required' => 'Es necesario el campo url.',

        ];
    }
}
