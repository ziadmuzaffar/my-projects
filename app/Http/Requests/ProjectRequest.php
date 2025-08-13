<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string'
        ];
    }
    
    public function messages(): array
    {
        return [
            'title.required' => 'هذا الحقل مطلوب',
            'title.string' => 'هذا الحقل يجب ان يكون نص فقط',
            'description.required' => 'هذا الحقل مطلوب',
            'description.string' => 'هذا الحقل يجب ان يكون نص فقط',
        ];
    }
}
