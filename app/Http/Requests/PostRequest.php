<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:5|max:150|string',
            'keywords' => 'nullable',
            'text' => 'required|min:10',
            'cover' => 'nullable|file|image'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле title обязательно',
            'title.min' => 'Поле title должно быть минимум 5 символов',
            'title.max' => 'Поле title должно быть максимум 150 символов',
            'text.required' => 'Поле text должно быть обязательно заполнено',
            'text.min' => 'Поле text должно быть минимум 10 символов',
            'cover.file' => 'Поле cover должно быть файлом',
            'cover.image' => 'Поле cover долно быть картинкой'
        ];
    }
}
