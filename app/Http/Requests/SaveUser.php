<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUser extends FormRequest
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
            'email'=>'required| unique:users',
            'password'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'The  Name is required.',
            'email.required' => 'The Email is required.',
            'password.required' => 'The Password is required.',
            'email.unique' => 'This email is already registered in our server kindly choose another',

        ];
    }
}
