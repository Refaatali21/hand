<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name'           => 'required',
            'email'          => 'required',
            'phone'          => 'required',
            'address'        => 'required',
            'Gender'         => 'required',
            'status'         => 'required',
            'job_title'      => 'required',
            'hire_date'      => 'required',
            'date_of_birth'  => 'required',
            'salary'         => 'required',
        ];
    }

    public function messages(): array
    {
        return [

            'name'           => 'Please Enter Employee Name',
            'email'          => 'Please Enter Employee Email',
            'phone'          => 'Please Enter Employee Phone',
            'address'        => 'Please Enter Employee Address',
            'Gender'         => 'Please Enter Employee Gender',
            'status'         => 'Please Enter Employee Status',
            'job_title'      => 'Please Enter Employee Job Title',
            'hire_date'      => 'Please Enter Employee Hire Date',
            'date_of_birth'  => 'Please Enter Employee Date Of Birth',
            'salary'         => 'Please Enter Employee Salary',

        ];
    }
}
