<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LinkedinUrl implements Rule
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
        // Match LinkedIn URLs with optional subdomains
        return preg_match('/^https?:\/\/([a-zA-Z0-9-]+\.)?linkedin\.com\/?$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Please provide a valid Linkedin URL.';
    }
}