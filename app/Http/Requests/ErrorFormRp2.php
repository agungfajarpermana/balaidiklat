<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormRp2 extends FormRequest
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
            'waktu.*' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'waktu.*.required' => 'Masukan angka 0 (NOL)',
            'waktu.*.numeric'  => 'Harus berupa angka',
        ];
    }
}
