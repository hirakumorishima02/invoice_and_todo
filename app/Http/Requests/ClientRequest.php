<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'client_name' => 'required',
            'personnel' => 'required',
            'client_tel_number' => 'required',
            'client_address' => 'required',
            'sales_tax_rate' => 'required',
            'withholding_tax_rate' => 'required',
            'tax_category' => 'required',
            'fraction' => 'required',
        ];
    }
    public function messages() 
    {
        return [
            'client_name.required' => 'クライアント名は必ず登録してください。',
            'personnel.required'  => '担当者名のタイトルは必ず登録してください。',
            'client_tel_number.required'  => '連絡先住所は必ず登録してください。',
            'client_address.required'  => '住所は必ず登録してください。',
            'sales_tax_rate.required'  => '消費税率は必ず登録してください。',
            'withholding_tax_rate.required'  => '源泉徴収税率は必ず登録してください。',
            'tax_category.required'  => '税区分は必ず登録してください。',
            'fraction.required'  => '税区分は必ず登録してください。',
        ];
    }
}
