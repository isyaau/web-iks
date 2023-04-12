<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAkunRequest extends FormRequest
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
            'nama' => 'required|max:255',
            'role' => 'required|max:255',
            'username' => 'required|unique:akun|max:255',
            'password' => 'required|max:255',
            'cabang_daerah' => 'required|max:255',
            'foto' => 'required|image|file',
        ];
    }
}
