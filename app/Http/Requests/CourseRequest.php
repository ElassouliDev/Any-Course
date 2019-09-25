<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title_ar' => 'string|required',
            'title_en' => 'string|required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'category_id' => 'numeric|required',
            'is_paid' => 'boolean|required',
            'price' => 'numeric|nullable',
            'image' => 'nullable|image|mimes:jpeg,bmp,png',

        ];
    }
}
