<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::User()->isAdmin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:55',
            'link' => 'required|max:255',
            'picture.mimes' => 'De afbeelding moet van type jpeg, png, jpg, gif of svg zijn',
            'picture.max' => 'De afbeelding mag niet groter dan 16mb zijn',
            'picture.image' => 'Het het veld afbeelding moet een afbeelding bevatten',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht',
            'name.max' => 'De naam mag niet meer dan :max karakters bevatten',
            'link.required' => 'De link is verplicht',
            'link.max' => 'De link mag niet meer dan :max karakters bevatten',
            'picture.mimes' => 'De afbeelding moet van type jpeg, png, jpg, gif of svg zijn',
            'picture.max' => 'De afbeelding mag niet groter dan 16mb zijn',
            'picture.image' => 'Het het veld afbeelding moet een afbeelding bevatten',
        ];
    }
}
