<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TwitterUrl implements Rule
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
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^https:\/\/(www\.)?x\.com\/[A-Za-z0-9._-]+\/?$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Please provide a valid X URL.';
    }
}
