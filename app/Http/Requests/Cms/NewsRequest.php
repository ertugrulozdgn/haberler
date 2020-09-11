<?php

namespace App\Http\Requests\Cms;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        $rules = [
            'short_title' => 'required',
            'published_at' => 'required|date',
            'summary' => 'required',
            'content' => 'required',
            'cover_img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required',
            'redirect_link' => 'nullable|url',
        ];

        return $rules;
    }

    public function attributes()
        {
            return [
                'short_title' => 'Kısa başlık',
                'published_at' => 'Yayın tarihi',
                'summary' => 'Özet',
                'content' => 'İçerik',
                'cover_img' => 'Kapak resmi',
                'category_id' => 'Kategori',
                'redirect_link' => 'Yönlendir linki'
            ];
        }
}
