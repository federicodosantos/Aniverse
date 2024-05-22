<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $expiredValidation = date('Y-m', time());
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:50', 'unique:users,email'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'expired' => ['required', 'date', 'after_or_equal:' . $expiredValidation],
        ];
    }
}
