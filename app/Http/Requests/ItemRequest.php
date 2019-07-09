<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'item_name' => 'required',
            'delivery_date' => 'required',
            'unit_price' => 'required',
            'memo' => 'required',
            'client_id' => 'required'
        ];
    }
    public function messages() 
    {
        return [
            'item_name.required' => '案件名は必ず登録してください。',
            'delivery_date.required'  => '納期は必ず登録してください。',
            'unit_price.required'  => '単価は必ず登録してください。',
            'memo.required'  => '備考欄は必ず登録してください。',
            'client_id.required'  => 'クライアントは必ず登録してください。',
        ];
    }
}
