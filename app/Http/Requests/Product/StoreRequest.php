<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cover' => 'required',
            'images' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'size' => 'required',
            'category[]' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'cover.required' => 'Поле должно быть заполнено!',
            'images.required' => 'Поле должно быть заполнено!',
            'title.required' => 'Поле должно быть заполнено!',
            'price.required' => 'Поле должно быть заполнено!',
            'description.required' => 'Поле должно быть заполнено!',
            'size.required' => 'Поле должно быть заполнено!',
            'category[].required' => 'Поле должно быть заполнено!'
        ];
    }
}
