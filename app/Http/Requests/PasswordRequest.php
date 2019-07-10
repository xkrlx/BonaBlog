<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'current' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'current.required' => 'Pole nie może być puste',
            'password.required' => 'Pole nie może być puste',
            'password_confirmation.required' => 'Pole nie może być puste',
            'password.confirmed' => 'Podane hasła się różnią'
        ];
    }
}
