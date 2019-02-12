<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormRbpmd2 extends FormRequest
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
            'teori.*'   => 'required|numeric',
            'latihan.*'   => 'required|numeric',
            'lapangan.*'   => 'required|numeric',
            'total.*'   => 'required|numeric',
            'nip' => 'required|numeric|digits_between:18,18',
            'nama' => 'required|regex:/^[a-zA-Z\s\., ]*$/|min:10'
        ];
    }

    public function messages()
    {
      return [
        'teori.*.required'   => 'Masukan angka 0 (NOL)',
        'teori.*.numeric'    => 'Harus berupa angka!',
        'latihan.*.required'   => 'Masukan angka 0 (NOL)',
        'latihan.*.numeric'    => 'Harus berupa angka!',
        'lapangan.*.required'   => 'Masukan angka 0 (NOL)',
        'lapangan.*.numeric'    => 'Harus berupa angka!',
        'total.*.required'   => 'Masukan angka 0 (NOL)',
        'total.*.numeric'    => 'Harus berupa angka!',
        'nip.required' => 'Tidak boleh kosong!',
        'nip.digits_between' => 'Harus 18 angka!',
        'nip.numeric' => 'harus berupa angka!',
        'nama.required' => 'Tidak boleh kosong!',
        'nama.regex' => 'Tidak boleh ada karakter ( - | _ ) dan angka',
        'nama.min' => 'Minimal 10 karakter!'
      ];
    }
}
