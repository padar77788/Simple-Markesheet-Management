<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name'=>'required',
            'roll'=>'required',
            'registration'=>'required',
            'shift_id'=>'required',
            'department_id'=>'required',
            'semester_id'=>'required',
            'f_name'=>'required',
            'm_name'=>'required',
            'dob'=>'required',
            'religion'=>'required',
            'gender'=>'required',
            'session'=>'required',
        ];
    }
}
