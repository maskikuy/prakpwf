<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'qty' => 'sometimes|integer|min:0',
            'price' => 'sometimes|numeric|min:0',
            'user_id' => 'sometimes|exists:users,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.string' => 'Nama produk harus berupa teks.',
            'name.max' => 'Nama produk tidak boleh lebih dari 255 karakter.',
            'qty.integer' => 'Jumlah produk harus berupa angka bulat (tidak boleh desimal).',
            'qty.min' => 'Jumlah produk tidak boleh kurang dari 0.',
            'price.numeric' => 'Harga produk harus berupa angka yang valid.',
            'price.min' => 'Harga produk tidak boleh kurang dari 0.',
            'user_id.exists' => 'User yang dipilih tidak ada.',
        ];
    }
}
