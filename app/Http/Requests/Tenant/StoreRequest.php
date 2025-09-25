<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'building_id' => 'required|integer|exists:buildings,id',
            'name' => 'required|string|max:255',
            'contact' => 'required|regex:/^[0-9]{11}$/|unique:tenants,contact',
            'email' => 'required|email|unique:tenants,email',
        ];
    }

    public function attributes(): array
    {
        return [
            'building_id' => 'Building',
        ];
    }
}
