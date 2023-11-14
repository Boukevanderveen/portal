<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class UpdateBookRequest extends FormRequest
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
            'ISBN' => 'required|max:13',
            'price' => 'required|regex:/^[0-9]{1,9}([,.][0-9]{1,9})?$/',
            'school_year' => 'required|numeric|max:10|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht',
            'name.max' => 'De naam mag niet meer dan :max karakters bevatten',
            'ISBN.required' => 'De ISBN is verplicht',
            'ISBN.max' => 'De ISBN mag niet meer dan :max karakters bevatten',
            'price.required' => 'De prijs is verplicht',
            'price.regex' => 'De prijs moet van juist formaat zijn. Voorbeeld: (1,95 of 1.95)',
            'school_year.required' => 'Het schooljaar is verplicht',
            'school_year.numeric' => 'Het schooljaar mag alleen cijfers bevatten',
            'school_year.max' => 'Het schooljaar mag niet hoger zijn dan :max',
            'school_year.min' => 'Het schooljaar mag niet lager zijn dan :min',
        ];
    }
}
