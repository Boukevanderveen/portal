<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreTestRequest extends FormRequest
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
            'period' => 'required|max:55',
            'date' => 'required',
            'time' => 'required',
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
            'period.required' => 'De periode is verplicht',
            'period.max' => 'De periode mag niet meer hoger dan :max zijn',
            'time.required' => 'De tijd is verplicht',    
            'date.required' => 'De datum is verplicht',    

        ];
    }
}
