<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateElectiveRequest extends FormRequest
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
            'description' => 'required|max:2555',
            'hours' => 'required|numeric|max:2000',
            'teacher' => 'required:max:55',
            'period' => 'required|numeric|max:4|min:1',
            'code' => 'nullable|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht',
            'name.max' => 'De naam mag niet meer dan :max karakters bevatten',
            'description.required' => 'De beschrijving is verplicht',
            'description.max' => 'De bescrijving mag niet meer dan :max karakters bevatten',
            'hours.required' => 'De uren is verplicht',  
            'hours.numeric' => 'Het veld uren mag alleen cijfers bevatten',    
            'hours.max' => 'De uren mag niet hoger dan :max zijn',    
            'teacher.required' => 'De docent is verplicht',  
            'teacher.max' => 'De docent mag niet meer dan :max karakter zijn',    
            'period.required' => 'De periode is verplicht',
            'period.numeric' => 'De periode mag alleen cijfers bevatten',
            'period.max' => 'De periode mag niet meer hoger dan :max zijn',
            'period.min' => 'De periode mag niet meer lager dan :min zijn',
            
            'code.numeric' => 'De code mag alleen cijfers bevatten',    
        ];
    }
}
