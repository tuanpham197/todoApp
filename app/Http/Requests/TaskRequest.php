<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title'   => 'required|max:255',
            'content' => 'required|min:10'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'title.max'   => 'Title no larger than 255 characters',
            'content.required' => 'Content is required',
            'content.min' => 'content quá ngắn'
        ];
    }
}
