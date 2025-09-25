<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'contact' => ['required', 'regex:/^[0-9]{11}$/', Rule::unique('tenants')->ignore($this->tenant->id)],
            'email' => ['required', 'email', Rule::unique('tenants')->ignore($this->tenant->id)],
        ];
    }

    public function attributes(): array
    {
        return [
            'building_id' => 'Building',
        ];
    }
}
