<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class attendance extends FormRequest
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
            'date'          => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
            'duration'      => 'required',
            'reason'        => 'required',
            'employee_id'   => 'required',
        ];
    }

    public function messages(): array
    {
        return [

            'date'          => 'Please Enter Today Date',
            'start_date'    => 'Please Enter Start Date',
            'end_date'      => 'Please Enter End Date',
            'duration'      => 'Please Enter Duration',
            'reason'        => 'Please Enter Reason',
            'employee_id'   => 'Please Enter Employee Name',

        ];
    }
}
