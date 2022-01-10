<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'nisn' => 'required|unique:siswas,nisn',
            'nama' => 'required|min:3|string',
            'unit' => 'required',
            'kelas' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nisn.unique' => 'NISN sudah digunakan',
            'nisn.required' => 'NISN tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.string' => 'Nama harus huruf',
            'kelas.required' => 'Kelas tidak boleh kosong'
        ];
    }
}
