<?php

namespace App\Http\Requests\Empresa;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEmpleado extends FormRequest
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
            'nombres' => 'required|max:100',
            'apellidos' => 'nullable|max:100',
            'identificacion' => 'required|max:100|unique:usuarios,identificacion,' . $this->route('id'),
            'email' => 'required|max:100|unique:usuarios,email,' . $this->route('id'),
            'telefono' => 'required|min:10',
            'password' => 'required|min:5',
            're_password' => 'required|min:5|same:password',
        ];
    }
}
