<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreProjectWeekRequest extends FormRequest
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
            'period' => 'required|max:55',
            'week' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'target_class' => 'required',

        ];  
    }

    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht',
            'name.max' => 'De naam mag niet meer dan :max karakters bevatten',
            'period.required' => 'De periode is verplicht',
            'period.max' => 'De periode mag niet meer dan :max karakters bevatten',
            'week.required' => 'De week is verplicht',
            'week.max' => 'De week mag niet meer dan :max karakters bevatten',
            'start_date.required' => 'De start-datum is verplicht',
            'end_date.required' => 'De eind-datum is verplicht',
            'target_class.required' => 'De doelgroep is verplicht',
        ];
    }
}
