<?php

namespace App\Http\Requests\Empresa;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ValidacionAsignacionParticular extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'tipo' =>  [
                'required',
                Rule::unique('asignacion_particular_pqr')
                    ->where('tipo_pqr_id', $request->tipo_pqr_id)
                    ->where('prodserv', $request->prodserv)
                    ->where('motivo_id', $request->motivo_id)
                    ->where('motivo_sub_id', $request->motivo_sub_id)
                    ->where('servicio_id', $request->servicio_id)
                    ->where('categoria_id', $request->categoria_id)
                    ->where('producto_id', $request->producto_id)
                    ->where('marca_id', $request->marca_id)
                    ->where('referencia_id', $request->referencia_id)
                    ->where('sede_id', $request->sede_id)
                    ->where('cargo_id', $request->cargo_id)
                    ->where('adquisicion', $request->adquisicion)
                    ->where('palabra1', $request->palabra1)
                    ->where('palabra2', $request->palabra2)
                    ->where('palabra3', $request->palabra3)
                    ->where('palabra4', $request->palabra4)
            ]
        ];
    }

    public function messages()
    {
        return [
            'tipo.unique' => 'La regla de asignación ya existe con los parametros que se escogieron.',
        ];
    }
}
