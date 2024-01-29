<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\CurrentPassword;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore(Auth::id()),
            ],
            'current_password' => [
                'required',
                new CurrentPassword
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ];
    }
}