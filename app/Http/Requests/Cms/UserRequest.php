<?php

namespace App\Http\Requests\Cms;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',           // ortak olanları rules da tanımlarız ortak olmayanları $rules['password'] şeklinde tanımlamalarımızı if sorgulamalarımızı yaparız.
        ];

        if ($this->method() == 'POST') {
            $rules['password'] = 'required|Min:8|Max:20|confirmed';
            $rules['email'] = 'required|email|unique:users';
        }

        if ($this->method() == 'PUT') {
            if ($this->filled('password')) {
                $rules['password'] = 'required|Min:8|Max:20|confirmed';
            }
            $rules['email'] = 'required|email|unique:users,email,' . $this->user; // 1. parametre tablo tutar,2. parametre sutün tutar, 3. parametre model(yani bu sutünü dışında unique yap)
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'Ad',
            'email' => 'Mail Adresi',
            'password' => 'Şifre'
        ];
    }
}
