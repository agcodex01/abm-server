<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemitRequest extends FormRequest
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
            'remitted_by' => 'required',
            'total' => 'required|numeric',
            'transaction_ids' =>'required|array'
        ];
    }
}
