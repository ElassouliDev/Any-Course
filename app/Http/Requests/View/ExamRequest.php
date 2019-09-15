<?php

namespace App\Http\Requests\View;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'title_en' => 'required',
            'is_correct' => 'required',
            'value_ar' => 'required',
            'value_en' => 'required',
            'title_ar' => 'required|max:255',
        ];
    }
}
