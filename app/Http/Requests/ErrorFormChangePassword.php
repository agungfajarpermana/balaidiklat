<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormChangePassword extends FormRequest
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
            'password' => 'required|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'Tidak boleh kosong!',
            'password.required' => 'Tidak boleh kosong!',
            'password.confirmed'=> 'Password dan retype password tidak cocok!'
        ];
    }
}
