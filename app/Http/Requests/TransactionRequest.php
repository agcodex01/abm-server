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
            'service_number' => 'required',
            'number' => 'required|digits:11',
            'requirement_id' => 'required|uuid',
            'requirement_values' => 'required|json',
            'amount' => 'required|numeric'
        ];
    }
}
