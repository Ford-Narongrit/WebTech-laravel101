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
            'title' => ['required', 'min:3'],
            'detail' => ['required', 'min:10', 'max:1000'],
            'due_date' => ['required', 'after:yesterday']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The Task title is required',
            'detail.required' => 'You must have to input detail to this task',
            'due_date.after' => 'วันที่ต้องมากกว่าปัจจุบัน'
        ];
    }
}
