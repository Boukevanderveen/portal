<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreWebsiteRequest extends FormRequest
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
            'name' => 'required|min:3|max:55|unique:users',
            'description' => 'nullable|max:2555',
            'file' => 'required|mimes:zip|max:8000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Het veld naam is verplicht',
            'name.max' => 'De naam mag niet meer dan :max karakters bevatten',
            'name.min' => 'De naam moet meer dan :min karakters bevatten',
            'description.max' => 'De beschrijving mag niet meer dan :max karakters bevatten',
            'file.required' => 'Het veld bestand is verplicht',
            'file.mimes' => 'Het bestand dient een zip te zijn',
            'file.max' => 'Het bestand dient minder dan 1MB te zijn',
        ];
    }
}
