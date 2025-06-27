<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ];
    }
    /**
     * Get the custom messages for the validation rules.
     *
     * @return array<string, string>
     */
    public function messages(){
        return [
            'name.required' => 'اسم الدولة مطلوب',
            'name.string' => 'اسم الدولة يجب أن يكون نصًا',
            'name.max' => 'اسم الدولة لا يمكن أن يتجاوز 255 حرفًا',
            'status.required' => 'الحالة مطلوبة',
            'status.boolean' => 'الحالة يجب أن تكون true أو false',
        ];
    }
}
