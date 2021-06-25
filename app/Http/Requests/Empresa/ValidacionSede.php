<?php

namespace App\Http\Requests\Empresa;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidacionSede extends FormRequest
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
            'nombre' =>  [
                'required',
                Rule::unique('sedes')
                    ->where('municipio_id', $this->municipio_id) . $this->route('id')
            ]
        ];
    }
    public function messages()
    {
        return [
            'nombre.unique' => 'El nombre de la sede ya existe en esa ciudad. Por favor validelo e intentelo nuevamente',
        ];
    }
}
