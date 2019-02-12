<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormRbpmd1 extends FormRequest
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
            'nama_pelatihan' => 'required',
            'mata_pelatihan' => 'required',
            'alokasi_waktu'  => 'required',
            'deskripsi'      => 'required|min:10',
            'hasil'          => 'required|min:10',
            'indikator.0'    => 'required|min:5',
            'materi.0'       => 'required|min:5'
        ];
    }

    public function messages()
    {
      return [
        'nama_pelatihan.required' => 'Tidak boleh kosong!',
        'mata_pelatihan.required' => 'Tidak boleh kosong!',
        'alokasi_waktu.required'  => 'Tidak boleh kosong!',
        'deskripsi.required'      => 'Tidak boleh kosong!',
        'deskripsi.min'           => 'Minimal 10 karakter!',
        'hasil.required'          => 'Tidak boleh kosong!',
        'hasil.min'               => 'Minimal 10 karakter!',
        'indikator.0.required'    => 'Tidak boleh kosong!',
        'indikator.0.min'         => 'Minimal 5 karakter!',
        'materi.0.required'       => 'Tidak boleh kosong!',
        'materi.0.min'            => 'Minimal 5 karakter!'
      ];
    }
}
