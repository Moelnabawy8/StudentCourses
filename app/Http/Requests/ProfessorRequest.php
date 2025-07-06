<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
            'status' => 'required|in:active,inactive',
            'courses' => 'array',
            'courses.*' => 'exists:courses,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'اسم المعلم مطلوب',
            'status.required' => 'حالة المعلم مطلوبة',
            'courses.array' => 'الدورات يجب أن تكون مصفوفة',
            'courses.*.exists' => 'الدورة المختارة غير موجودة',
            'image.image' => 'يجب أن تكون الصورة ملف صورة',
            'image.mimes' => 'امتداد الصورة يجب أن يكون jpeg, png, jpg, gif, svg',
            'image.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجابايت',
            'country.required' => 'البلد مطلوب',
            'phone.required' => 'رقم الهاتف مطلوب',
        ];
    }
}
