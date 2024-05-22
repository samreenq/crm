<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'password' => 'sometimes|nullable|confirmed',
            'email' => [
                'required',
                Rule::unique('users')->ignore(session()->get("userEmail"), 'email'),
            ],
         
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'The  Name is required.',
            'email.required' => 'The Email is required.',
            'password.confirmed' => 'Password confirmation does not match.',
            'email.unique' => 'The email is already in use.',
            'email.email' => 'Please enter a valid email address.',
            
           
        ];
    }
}
