<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => 'nullable|image|mimes:png,jpg',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'password' => 'nullable|min:8|confirmed'
        ];
    }
    
    public function messages(): array
    {
        return [
            'image.image' => 'يجب أن يكون هذا الحقل صورة',
            'image.mimes' => 'يجب أن يكون هذا الحقل ملفًا من نوع (png, jpg)',
            'name.required' => 'هذا الحقل مطلوب',
            'name.string' => 'هذا الحقل يجب ان يكون نص فقط',
            'email.required' => 'هذا الحقل مطلوب',
            'email.email' => 'يجب أن يكون هذا الحقل عنوان بريد إلكتروني صالحًا',
            'email.unique' => 'لقد تم استخدام البريد الإلكتروني بالفعل',
            'password.min' => 'يجب أن يتكون هذا الحقل من 8 أحرف على الأقل',
            'password.confirmed' => 'هذا الحقل لا يتطابق'
        ];
    }
}
