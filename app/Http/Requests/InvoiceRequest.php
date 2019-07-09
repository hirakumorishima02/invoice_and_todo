<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'billing_name' => 'required',
            'invoice_title' => 'required',
            'payment_day' => 'required',
            'billing_day' => 'required',
        ];
    }
    public function messages() 
    {
        return [
            'billing_name.required' => '請求宛先名称は必ず登録してください。',
            'invoice_title.required'  => '請求書のタイトルは必ず登録してください。',
            'payment_day.required'  => '支払期限は必ず登録してください。',
            'billing_day.required'  => '請求日は必ず登録してください。',
        ];
    }
}
