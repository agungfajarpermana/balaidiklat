<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormDuplicateRbpmd extends FormRequest
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
            'waktu.*' => 'required|numeric',
            'nip' => 'required|numeric|digits_between:16,18',
            'nama' => 'required|regex:/^[a-zA-Z\s\., ]*$/|min:10'
        ];
    }

    public function messages()
    {
        return [
            'waktu.*.required' => 'Masukan angka 0 (NOL)',
            'waktu.*.numeric'  => 'Harus berupa angka',
            'nip.required' => 'Tidak boleh kosong!',
            'nip.digits_between' => 'Minimal 16 dan maksimal 18 angka!',
            'nip.numeric' => 'harus berupa angka!',
            'nama.required' => 'Tidak boleh kosong!',
            'nama.regex' => 'Tidak boleh ada karakter ( - | _ ) dan angka',
            'nama.min' => 'Minimal 10 karakter!'
        ];
    }
}
