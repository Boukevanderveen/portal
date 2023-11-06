<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return Auth::User()->isAdmin;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:55|alpha_num|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht',
            'name.min' => 'De naam moet minimaal :min letters bevatten',
            'name.max' => 'De naam mag niet meer dan :max karakters bevatten',
            'name.alpha_num' => 'De naam mag alleen letters en cijfers bevatten',
            'name.unique' => 'Deze naam is al in gebruik',
            'email.required' => 'De email is verplicht',
            'email.max' => 'De E-mail mag niet meer dan :max karakters bevatten',
            'email.unique' => 'Dit E-mailadres is al in gebruik',
            'email.email' => 'Vul een geldig E-mail adres in',
            'password.required' => 'Het wachtwoord is verplicht',
            'password.max' => 'Het wachtwoord mag niet meer dan :max karakters bevatten',
        ];
    }
}
