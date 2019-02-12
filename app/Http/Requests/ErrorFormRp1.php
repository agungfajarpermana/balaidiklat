<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormRp1 extends FormRequest
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
            'nama' => 'required',
            'mata' => 'required',
        ];
    }

    public function messages()
    {
      return [
        'nama.required' => 'tidak boleh kosong,..',
        'mata.required' => 'tidak boleh kosong,..',
      ];
    }
}
