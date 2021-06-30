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
            'title' => 'required|max:255|min:3',
            'description' =>'required',
            'task_type' =>'required',
            'created_by'=>'',
            'status'=>'',
            'shortcode' =>'',
            'project_id'=>'',
            'priority'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.max' => 'Todo title should not be greater than 255',
             'title.min' => 'Todo title should  be greater than 5'
        ];
    }
}
