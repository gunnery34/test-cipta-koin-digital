<?php

namespace App\Http\Requests\API\Todo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'is_done' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul todo harus diisi.',
            'title.string' => 'Judul todo harus berupa teks.',
            'title.max' => 'Judul todo tidak boleh lebih dari 255 karakter.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'is_done.boolean' => 'Status selesai harus berupa true atau false.'
        ];
    }
}