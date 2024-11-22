<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactProfilesRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:14',
            'office_hours' => 'required|string|max:14',
            'location' => 'required|string|max:255',
            'social_media' => 'required|string|max:255',
        ];
    }
}
