<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateUserRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:55|unique:users,name,' . $this->route('user')->id . ',id',
            'email'=>'required|email|max:255|unique:users,email,' . $this->route('user')->id . ',id',
            'password' => 'nullable|max:255'
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
            
            'name.required' => 'Het veld naam is verplicht',
            'name.min' => 'Het veld naam moet minimaal :min letters bevatten',
            'name.max' => 'Het veld naam mag niet meer dan :max karakters bevatten',
            'name.unique' => 'Deze naam bestaat al',
            'email.required' => 'Het veld E-mail is verplicht',
            'email.max' => 'Het veld E-mail mag niet meer dan :max karakters bevatten',
            'email.unique' => 'Dit E-mail is al in gebruik',
            'email.email' => 'Het veld E-mail moet een geldige E-mail bevatten',
            'password.max' => 'Het veld wachtwoord mag niet meer dan :max karakters bevatten',
        ];
    }
}
