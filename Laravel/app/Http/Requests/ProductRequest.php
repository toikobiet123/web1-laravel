<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:12',
            'price' => 'required|numeric',
            'description' => 'required',
            'cate_id' => 'required',
            'size_id' => 'required',
            'image' => 'file',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Mầy ngu lắm tên bắt buộc nhập',
        ];
    }
}
