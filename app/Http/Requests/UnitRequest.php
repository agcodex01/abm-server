<?php

namespace App\Http\Requests;

use App\Traits\UniqueRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UnitRequest extends FormRequest
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
            'name' => 'required|string|max:100|unique:units,name' . $this->getUniqueRule($this->unit),
            'fund' => 'required|integer',
            'postal_code' => 'required|digits:4',
            'province' => 'required|max:100',
            'city_municipality' => 'required|string|max:100',
            'barangay' => 'sometimes|string|max:100',
            'street' => 'sometimes|string|max:100'
        ];
    }
}
