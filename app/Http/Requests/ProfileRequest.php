<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'about_me' => ['max:1000'],
            'profile_picture'  => 'image|mimes:jpeg,png,gif|max:4096',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nick jest wymagany',
            'name.max' => 'Nick jest za długi',
            'email.required'  => 'Email jest wymagany',
            'email.max'  => 'Email jest za długi',
            'about_me.max'  => 'Opis jest za długi',
            'profile_picture.image'  => 'Tylko obraz',
            'profile_picture.mimes'  => 'Tylko format jpeg,png,gif',
            'profile_picture.max' => 'Plik jest za duży, max 4 MB',
        ];
    }
}
