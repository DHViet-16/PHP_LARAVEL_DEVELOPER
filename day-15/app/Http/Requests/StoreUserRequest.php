<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'age' => ['required', 'integer', 'min:18', 'max:100'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'name.min' => 'Tên phải có ít nhất 2 ký tự.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'age.required' => 'Vui lòng nhập tuổi.',
            'age.integer' => 'Tuổi phải là số nguyên.',
            'age.min' => 'Tuổi phải từ 18 trở lên.',
            'age.max' => 'Tuổi không được vượt quá 100.',
        ];
    }
}
