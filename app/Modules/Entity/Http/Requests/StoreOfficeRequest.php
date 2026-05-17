<?php

namespace App\Modules\Entity\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class StoreOfficeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'provinceId' => 'required|exists:provinces,id',
            'municipalityId' => 'required|exists:municipalities,id',
            'officeTypeId' => 'required|exists:office_types,id',
            'phone' => 'string|regex:/[0-9]{10}/',
            'address' => 'string',
            'name' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'provinceId.required' => 'Province ID field is required.',
            'municipalityId.required' => 'Municipality ID field is required.',
            'officeTypeId.required' => 'Office Type ID field is required.',
            'phone.regex' => 'Please enter a valid phone number.',
            'name.required' => 'Name field is required.',
            'province_id.exists' => 'Province does not exist.',
            'municipality_id.exists' => 'Municipality does not exist.',
        ];
    }
}
