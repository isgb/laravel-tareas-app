<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareaRequest extends FormRequest
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
        if ($this->isMethod('put')) {
            return [
                'nombre' => 'sometimes|string|max:255',
                'descripcion' => 'nullable|string',
            ];
        }

        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El título es obligatorio.',
            'nombre.string' => 'El título debe ser una cadena de texto.',
            'nombre.max' => 'El título no debe exceder los 255 caracteres.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
        ];
    }
}
