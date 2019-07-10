<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagesRequest extends FormRequest
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
            'title' => 'bail|required||max:255',
            'body' => 'required||max:2500',
            'select_file'  => 'required|image|mimes:jpeg,png,gif|max:4096',
            'category' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tytuł jest wymagany',
            'title.max' => 'Tytuł jest za długi, max 255 znaków',
            'body.required'  => 'Wpisz tekst',
            'body.max'  => 'Tekst jest za długi, max 1000 znaków',
            'select_file.required'  => 'Wrzuć grafike',
            'select_file.image'  => 'Tylko obraz',
            'select_file.mimes'  => 'Tylko format jpeg,png,gif',
            'select_file.max' => 'Plik jest za duży, max 4 MB',
            'category.required'  => 'Wybierz kategorie',
        ];
    }
}
