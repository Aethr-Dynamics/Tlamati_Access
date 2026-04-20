<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorRequest extends FormRequest
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
			'id_visitor' => 'required',
			'nombre' => 'required|string',
			'apellido_paterno' => 'required|string',
			'apellido_materno' => 'string',
			'motivo' => 'required|string',
			'es_menor' => 'required',
			'identificacion' => 'required|string',
			'code_qr' => 'required|string',
			'reactivacion' => 'required',
			'fechas_impresion' => 'required',
        ];
    }
}
