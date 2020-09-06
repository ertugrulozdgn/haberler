<?php

namespace App\Http\Requests\Cms;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required'
        ];

        return $rules;
    }

    public function attributes() // Lang dosyasında attributes = [] yapmamıza gerek kalmadı bu daha kullanışlı
    {
        return [

        'name' => 'Kategori isim',
        'seo_title' => 'Seo başlık',
        'seo_description' => 'Seo açıklama'

        ];
    }
}
