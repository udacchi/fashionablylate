<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,others',
            'email' => 'required|email|max:255',
            'phone1' => 'required|digits_between:1,5',
            'phone2' => 'required|digits_between:1,5',
            'phone3' => 'required|digits_between:1,5',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'detail' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'phone1.required' => '電話番号を入力してください',
            'phone2.required' => '電話番号を入力してください',
            'phone3.required' => '電話番号を入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'content.required' => 'お問い合わせ内容を入力してください'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $phone1 = $this->input('phone1');
            $phone2 = $this->input('phone2');
            $phone3 = $this->input('phone3');
            if (empty($phone1) || empty($phone2) || empty($phone3)) {
                $validator->errors()->add('phone_group', '電話番号をすべて入力してください');
            }
        });
    }
}
