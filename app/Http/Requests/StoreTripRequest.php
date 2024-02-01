<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreTripRequest extends FormRequest
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
            'school_year' => 'required|numeric|max:10|min:1',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'link' => 'nullable|max:355|',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000|nullable',

        ];

        
    }

    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht',
            'name.max' => 'De naam mag niet meer dan :max karakters bevatten',
            'school_year.required' => 'Het schooljaar is verplicht',
            'school_year.numeric' => 'Het schooljaar mag alleen cijfers bevatten',
            'school_year.max' => 'Het schooljaar mag niet hoger zijn dan :max',
            'school_year.min' => 'Het schooljaar mag niet lager zijn dan :min',
            'time.required' => 'De tijd is verplicht',    
            'date.required' => 'De datum is verplicht',
            'location.required' => 'De locatie is verplicht',
            'link.max' => 'De link mag niet meer dan :max karakters bevatten',
            'picture.mimes' => 'De afbeelding moet van type jpeg, png, jpg, gif of svg zijn',
            'picture.max' => 'De afbeelding mag niet groter dan 1mb zijn',
            'picture.image' => 'Het het veld afbeelding moet een afbeelding bevatten',
        ];
    }
}
