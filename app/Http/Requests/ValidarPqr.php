<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class ValidarPqr extends FormRequest
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
        $rules = [];

        if (request('adquisicion') === 'Sede física') {

            $rules['sede_id'] = 'required';
        }
        if (request('tipo') === 'Producto') {
            $rules['referencia_id'] = 'required';
        } else {
            $rules['servicio_id'] = 'required';
        }


        return $rules;
    }
    public function messages()
    {
        // use trans instead on Lang
        return [
            'sede_id.required' => 'la sede es requerida',
            'referencia_id.required' => 'la referencia es requerida',
            'servicio_id.required' => 'El tipo de servicio es un campo requerido',
        ];
    }
}
