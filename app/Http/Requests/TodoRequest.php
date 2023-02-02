<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:5|max:1000',
            'is_completed' => 'boolean',
            'task_level' => 'required|numeric|min:0|max:2',
        ];
    }

    public function messages()
{
    return [
        'title.required' => 'The title is required',
        'title.min' => 'The title must be at least 3 characters',
        'title.max' => 'The title cannot be more than 255 characters',
        'description.required' => 'The description is required',
        'description.min' => 'The description must be at least 5 characters',
        'description.max' => 'The description cannot be more than 1000 characters',
        'is_completed.boolean' => 'The is_completed field must be a boolean value',
    ];
}


}
