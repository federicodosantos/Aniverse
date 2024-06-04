<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'id' => 'required',
            'user_id' => 'required',
            'product_id' => 'required',
            'payment_method' => 'nullable','string', 'max:10',
            'transaction_id' => 'nullable',
            'gross_amount' => 'required', 'numeric',
            'token' => 'required', 'string',
            'redirect_url' => 'required', 'string',
            'status' => 'nullable', 'string', 'max:20',
        ];
    }
}
