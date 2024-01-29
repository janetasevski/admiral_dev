<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CurrentPassword implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the provided password matches the user's current password
        return Hash::check($value, auth()->user()->password);
    }

    public function message()
    {
        return 'The current password is incorrect.';
    }
}
