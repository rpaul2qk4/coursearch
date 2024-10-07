<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUniversityRequest extends FormRequest
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
            'university' => 'required', 
			'code' => '', 
			'description' => '', 			
			'website' => 'required', 
			'country_id' => 'required',         
			'state_id' => 'required',         
			'city_id' => '', 
        ];
    }
}
