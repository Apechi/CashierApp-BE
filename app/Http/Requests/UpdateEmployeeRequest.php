<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nip' => 'nullable|string|max:12',
            'nama' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|in:pria,wanita',   
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'telepon' => 'nullable|string|max:12',
            'agama' => 'nullable|string|max:15',
            'status_nikah' => 'nullable|in:belum nikah,nikah',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|string',
        ];
    }
}
