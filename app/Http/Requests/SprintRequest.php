<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SprintRequest extends FormRequest
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
            'name' => 'required|max:255|min:3',
            'description' =>'required',
            'project_id' =>'',
            
        ];
    }
    public function messages()
    {
        return [
            'name.max' => ' title should not be greater than 255',
             'name.min' => ' title should  be greater than 3'
        ];
    }
}
