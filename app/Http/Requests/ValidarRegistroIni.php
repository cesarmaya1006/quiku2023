<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarRegistroIni extends FormRequest
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
            'identificacion' => 'required|max:100|unique:usuariotemp,identificacion,docutipos_id' . $this->route('id'),
            'email' => 'required|email|unique:usuariotemp,email' . $this->route('id'),
        ];
    }
}
