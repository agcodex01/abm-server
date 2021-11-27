<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Traits\Permission;
use App\Traits\UniqueRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    use UniqueRule, Permission;

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
        if ($this->hasRules($this->method())) {
            return [];
        }
        return [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|max:100|email:filter|unique:users,email' . $this->getUniqueRule($this->user),
            'password' => 'sometimes|min:8|max:100',
            'roles' => 'sometimes|array',
            'roles.*' => 'exists:roles,name'
        ];
    }
}
