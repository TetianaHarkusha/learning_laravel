<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UserName;

class UserLoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'login' => 'min:4|max:50|required|unique:App\Models\UserLogin,login',
            'name' => new UserName,
            'email' => 'email|required|max:50|unique:App\Models\User,email',
            'password' => 'min:6|required',
        ];
    }
}
