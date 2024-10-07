<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecializationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'specialization'=>'required',
			'code' => '', 
			'description' => '', 
			'apply_deadline'=>'required', 
			'start_date'=>'required', 
			'acceptance_rate'=>'required', 
			'gpa_req_rate'=>'required', 
			'scholorship'=>'required', 
			'attendance_id'=>'required',
        ];
    }
}
