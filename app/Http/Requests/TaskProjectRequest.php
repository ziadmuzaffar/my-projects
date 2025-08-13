<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'name.string' => 'هذا الحقل يجب ان يكون نص فقط',
        ];
    }
}
