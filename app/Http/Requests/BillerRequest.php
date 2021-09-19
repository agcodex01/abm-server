<?php

namespace App\Http\Requests;

use App\Models\Biller;
use App\Traits\UniqueRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BillerRequest extends FormRequest
{
    use UniqueRule;

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
            'name' => 'required|unique:billers,name' . $this->getUniqueRule($this->biller),
            'type' => 'required'
        ];
    }
}
