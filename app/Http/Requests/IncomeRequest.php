<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeRequest extends FormRequest
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
        'id_worker' => 'nullable|integer|exists:workers,id',
        'id_student' => 'nullable|integer|exists:students,id',
        'id_visitor' => 'nullable|integer|exists:visitors,id',

        'con_worker' => 'nullable|integer',
        'con_student' => 'nullable|integer',
        'con_visitor' => 'nullable|integer',
        ];
    }
}
