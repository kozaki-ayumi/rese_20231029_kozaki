<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'name' => ['required', 'max:125'],
            'image_url' => ['required'],
            'area_id' => ['required'],
            'genre_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '※名前を入力してください',
            'name.max' => '※名前を125文字以下で入力してください',
            'image_url.required' => '※画像を選択してください',
        ];
    }
}
