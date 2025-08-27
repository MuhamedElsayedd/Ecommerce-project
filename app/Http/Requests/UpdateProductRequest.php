<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'sometimes|nullable|string|max:255',
            'price'       => 'sometimes|nullable|string|max:50',
            'description' => 'sometimes|nullable|string',
            'image'       => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'sometimes|nullable|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string'        => 'The product name must be a string.',
            'name.max'           => 'The product name must not exceed 255 characters.',
            'price.string'       => 'The price must be a string.',
            'price.max'          => 'The price must not exceed 50 characters.',
            'description.string' => 'The description must be a string.',
            'category_id.exists' => 'The selected category does not exist.',
            'image.image'        => 'The file must be an image.',
            'image.mimes'        => 'The image must be a file of type: jpg, jpeg, png.',
            'image.max'          => 'The image must not be larger than 2MB.',
        ];
    }
}
