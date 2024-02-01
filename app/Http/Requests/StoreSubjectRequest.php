<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreSubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::User()->isAdmin;
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {

        return [
            'name' => 'required|max:55',
            'description' => 'required|max:2555',
            'practical_hours' => 'required|numeric|max:2000',
            'theory_hours' => 'required|numeric|max:2000',
            'selfstudy_hours' => 'required|numeric|max:2000',
            'teacher' => 'required:max:55',
            'period' => 'required|max:55',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht',
            'name.max' => 'De naam mag niet meer dan :max karakters bevatten',
            'description.required' => 'De beschrijving is verplicht',
            'description.max' => 'De bescrijving mag niet meer dan :max karakters bevatten',
            'practical_hours.required' => 'De praktische uren zijn verplicht',  
            'practical_hours.numeric' => 'Het veld praktische uren mag alleen cijfers bevatten',    
            'practical_hours.max' => 'De praktische uren mag niet hoger dan :max zijn',    
            'theory_hours.required' => 'De zelfstudie uren zijn verplicht',  
            'theory_hours.numeric' => 'Het veld zelfstudie uren mag alleen cijfers bevatten',    
            'theory_hours.max' => 'De zelfstudie uren mogen niet hoger dan :max zijn',  
            'selfstudy_hours.required' => 'De zelfstudie uren zijn verplicht',  
            'selfstudy_hours.numeric' => 'Het veld zelfstudie uren mag alleen cijfers bevatten',    
            'selfstudy_hours.max' => 'De zelfstudie uren mag niet hoger dan :max zijn',  
            'teacher.required' => 'De docent is verplicht',  
            'teacher.max' => 'De docent mag niet meer dan :max karakter zijn',    
            'period.required' => 'De periode is verplicht',
            'period.max' => 'De periode mag niet meer hoger dan :max zijn',
        ];
    }
}
