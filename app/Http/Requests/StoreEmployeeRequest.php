<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'nip' => 'required|string|max:12',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:pria,wanita',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'telepon' => 'required|string|max:12',
            'agama' => 'required|string|max:15',
            'status_nikah' => 'required|in:belum nikah,nikah',
            'alamat' => 'required|string',
            'foto' => 'string',
        ];
    }
}
