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
         $rules = [];
         if ($this->privileges == 2) {
             $rules['name'] = 'required|regex:/(?=.*[A-Za-z])+/|min:3|max:55|unique:users,name';
         }
         else{
             $rules['name'] = 'required|numeric|min:3|max:999999|unique:users,name';
         }
 
         $rules['email'] = 'required|email|max:255|unique:users,email,';
         $rules['password'] = 'nullable|max:255';
         return $rules;
     }
 
     /** 
      * Get the error messages for the defined validation rules.
      *
      * @return array<string, string>
      */
     public function messages(): array
     {
         $messages = [];
 
         $messages['name.required'] ='Het veld naam is verplicht';
         $messages['name.min'] = 'Het veld naam moet minimaal :min letters bevatten';
         $messages['name.max'] = 'Het veld naam mag niet meer dan :max karakters bevatten';
         $messages['name.unique'] = 'Deze naam bestaat al';
         $messages['name.regex'] = 'Voor admins moet de naam moet minimaal een letter bevatten';
         $messages['name.numeric'] = 'Het leerlingnummer mag alleen cijfers bevatten';
         $messages['email.required'] = 'Het veld E-mail is verplicht';
         $messages['email.max'] = 'Het veld E-mail mag niet meer dan :max karakters bevatten';
         $messages['email.unique'] = 'Dit E-mail is al in gebruik';
         $messages['email.email'] ='Het veld E-mail moet een geldige E-mail bevatten';
         $messages['password.max'] = 'Het veld wachtwoord mag niet meer dan :max karakters bevatten';
         
         return $messages; 
     }
}
