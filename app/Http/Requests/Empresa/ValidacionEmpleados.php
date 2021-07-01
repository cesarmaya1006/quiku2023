<?php

namespace App\Http\Requests\Empresa;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEmpleados extends FormRequest
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
        if ($this->route('id')) {
            return [
                'docutipos_id' => 'required',
                'cargo_id' => 'required',
                'sede_id' => 'required',
                'identificacion' => 'required|max:100|unique:empleados,identificacion,' . $this->route('id'),
                'nombre1' => 'required|max:100',
                'nombre2' => 'nullable',
                'apellido1' => 'required|max:100',
                'apellido2' => 'nullable',
                'telefono_celu' => 'required|max:30',
                'direccion' => 'required|max:255',
                'genero' => 'required|max:20',
                'fecha_nacimiento' => 'required',
                'email' => 'required|max:255',
            ];
        } else {
            return [
                'usuario' => 'required|max:30|unique:usuarios,usuario' . $this->route('id'),
                'password' => 'required|min:5',
                'repassword' => 'required|min:5|same:password',
                'docutipos_id' => 'required',
                'cargo_id' => 'required',
                'sede_id' => 'required',
                'identificacion' => 'required|max:100|unique:empleados,identificacion,' . $this->route('id'),
                'nombre1' => 'required|max:100',
                'nombre2' => 'nullable',
                'apellido1' => 'required|max:100',
                'apellido2' => 'nullable',
                'telefono_celu' => 'required|max:30',
                'direccion' => 'required|max:255',
                'genero' => 'required|max:20',
                'fecha_nacimiento' => 'required',
                'email' => 'required|max:255',
            ];
        }
    }
}
