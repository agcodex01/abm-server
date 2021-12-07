<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'biller_id' => 'required|uuid|exists:billers,id',
            'account_id' => 'required|uuid|exists:accounts,id',
            'service_number' => 'required|max:100',
            'number' => 'required|numeric',
            'amount' => 'required|numeric',
            'insertedAmount' => 'required|numeric',
            'status' => 'sometimes|string'
        ];
    }
}
