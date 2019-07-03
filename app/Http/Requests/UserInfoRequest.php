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
            'tel_number' => 'required',
            'fax_number' => 'required',
            'billing_name' => 'required',
            'bank_account' => 'required',
            'billing_message' => 'required',
        ];
    }
    public function messages() 
    {
        return [
            'postal_code.required' => '郵便番号は必ず登録してください。',
            'address.required'  => '住所は必ず登録してください。',
            'tel_number.required'  => '電話番号は必ず登録してください。',
            'fax_number.required'  => 'ファックス番号は必ず登録してください。',
            'billing_name.required'  => '請求者名は必ず登録してください。',
            'bank_account.required'  => '銀行口座は必ず登録してください。',
            'billing_message.required'  => '請求書の備考欄は必ず登録してください。',
        ];
    }
}
