<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'deadline' =>'required',
            'percentage'=>'required',
            'project_owner'=>'',
            'shortcode' =>'required|max:4|min:2|unique'
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
