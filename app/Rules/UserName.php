<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UserName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Сhecks that the attribute consists of two words starting with a capital letter 
     * and no more than 50 characters (in Cyrillic or Latin)
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pattern = '~^([А-Я][а-я]+ [А-Я][а-я]+|[A-Z][a-z]+ [A-Z][a-z]+)$~u';
        return preg_match($pattern, $value) && strlen($value)<=50;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must contain two words starting with a capital letter,
            separated by one space, and no more than 50 characters (Cyrillic and Latin variants are possible).';
    }
}
