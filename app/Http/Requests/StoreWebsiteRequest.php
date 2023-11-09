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
            'link' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Het veld naam is verplicht',
            'name.max' => 'De naam mag niet meer dan :max karakters bevatten',
            'link.required' => 'Het veld link is verplicht',
            'link.max' => 'De link mag niet meer dan :max karakters bevatten',
        ];
    }
}
