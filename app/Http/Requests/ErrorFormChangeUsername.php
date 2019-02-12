<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormChangeUsername extends FormRequest
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
            'user' => 'required',
            'newuser' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'Tidak boleh kosong!',
            'newuser.required' => 'Tidak boleh kosong!',
            'newuser.email' => 'Email tidak valid!'
        ];
    }
}
