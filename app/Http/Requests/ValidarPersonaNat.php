<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarPersonaNat extends FormRequest
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
            'identificacion' => 'required|max:100|unique:personas,identificacion,' . $this->route('id'),
            'email' => 'required|max:100|unique:personas,email,' . $this->route('id'),
            'usuario' => 'required|max:100|unique:usuarios,usuario,' . $this->route('id'),
            'password' => 'required|min:5',
            'verificacionpassword' => 'required|min:5|same:password',
            'condiciones' => 'accepted',
        ];
    }
}
