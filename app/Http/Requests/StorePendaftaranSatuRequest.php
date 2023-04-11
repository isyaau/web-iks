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
            'nama' => 'required|unique:anggota|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|max:255',
            'nomor' => 'required|max:255',
            'cabang_daerah' => 'required|max:255',
            'tingkat' => 'required|max:255',
            'foto_setengah_badan' => 'required|image|file',
            'foto_full_badan' => 'required|image|file',
        ];
    }
}
