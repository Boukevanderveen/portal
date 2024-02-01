<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateSubProjectRequest extends FormRequest
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
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000|nullable',
            'intro' => 'max:255|required',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht',
            'name.max' => 'De naam mag niet meer dan :max karakters bevatten',
            'picture.mimes' => 'De afbeelding moet van type jpeg, png, jpg, gif of svg zijn',
            'picture.max' => 'De afbeelding mag niet groter dan 1mb zijn',
            'picture.image' => 'Het het veld afbeelding moet een afbeelding bevatten',
            'intro.required' => 'De intro is verplicht',
            'intro.max' => 'De intro mag niet meer dan :max karakters bevatten',
            'description.required' => 'De beschrijving is verplicht',
        ];
    }
}
