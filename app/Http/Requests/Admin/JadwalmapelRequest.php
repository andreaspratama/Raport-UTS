<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JadwalmapelRequest extends FormRequest
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
            'mapel_id' => 'required|integer|exists:mapels,id',
            'guru_id' => 'required|integer|exists:gurus,id',
            'kelas' => 'required',
            'unit' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'kelas.required' => 'Kelas tidak boleh kosong'
        ];
    }
}
