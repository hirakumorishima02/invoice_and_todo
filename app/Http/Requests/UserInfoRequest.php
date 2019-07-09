<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
            'postal_code' => 'required',
            'address' => 'required',
            'billing_name' => 'required',
            'bank_account' => 'required',
            'email' => 'email|max:50',
        ];
    }
    public function messages() 
    {
        return [
            'postal_code.required' => '郵便番号は必ず登録してください。',
            'address.required'  => '住所は必ず登録してください。',
            'billing_name.required'  => '請求者名は必ず登録してください。',
            'bank_account.required'  => '銀行口座は必ず登録してください。',
            'email.email' => 'メールアドレスはアドレス形式で入力してください。',
            'email.max' => 'メールアドレスは最大50字です。',
        ];
    }
}
