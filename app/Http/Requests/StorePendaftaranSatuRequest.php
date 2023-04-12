<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendaftaranSatuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'role' => 'required',
            'cabang_daerah' => 'required',
            'username' => 'required|max:255|unique:akun,username,',
            'foto' => 'image|file',
        ];
    }
}
