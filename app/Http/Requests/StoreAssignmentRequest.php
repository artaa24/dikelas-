<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'deadline_at' => ['required', 'date'],
            'max_score' => ['required', 'integer', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul tugas wajib diisi.',
            'deadline_at.required' => 'Batas waktu wajib diisi.',
            'deadline_at.date' => 'Batas waktu harus berupa tanggal yang valid.',
            'max_score.required' => 'Skor maksimal wajib diisi.',
            'max_score.min' => 'Skor maksimal minimal 0.',
            'max_score.max' => 'Skor maksimal maksimal 100.',
        ];
    }
}
