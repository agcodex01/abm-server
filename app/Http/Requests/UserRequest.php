<?php

namespace App\Http\Requests;

use App\Traits\UniqueRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email:filter|unique:users,email' . $this->getUniqueRule($this->user)
        ];
    }
}
