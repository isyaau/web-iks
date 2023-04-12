<?php

namespace App\Http\Requests;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAkunRequest extends FormRequest
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
            // 'username' => 'required|unique:akun,username,id' . $this->id, 'id',
            'nama' => 'required|max:255',
            'foto' => 'image|file',
            'username' => [
                'required',
                Rule::unique('akun')->ignore($this->id, 'id', 'id'),
            ],
            // 'nama' => 'required|unique:tb_warga,nama,' . $this->id,
            // 'tempat_lahir' => 'required|max:255',
            // 'tanggal_lahir' => 'required',
            // 'alamat' => 'required|max:255',
            // 'cabang_daerah' => 'required|max:255',
            // 'foto_setengah_badan' => 'image|file',
            // 'foto_full_badan' => 'image|file',
        ];
    }
}
