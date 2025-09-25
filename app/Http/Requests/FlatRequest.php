<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FlatRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'owner_contact' => 'required|string|max:255',
            'owner_email' => 'required|email|unique:flats,owner_email',
        ];

        if (Auth::user() && Auth::user()->hasRole('admin')) {
            $rules['building_id'] = 'required|integer|exists:buildings,id';
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'owner_id' => 'Building',
        ];
    }
}
