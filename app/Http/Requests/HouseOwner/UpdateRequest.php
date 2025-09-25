<?php

namespace App\Http\Requests\HouseOwner;

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
            'name' => 'required|string|max:255',
            'phone' => ['required', 'string', 'max:11', Rule::unique('users')->ignore($this->owner->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->owner->id)],
            'building_name' => 'required|string|max:255',
            'building_address' => 'required|string|max:255',
        ];
    }
}
