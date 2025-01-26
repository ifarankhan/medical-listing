<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FacebookUrl implements Rule
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
     * Examples of valid URLs:
     * - `https://facebook.com/username`
     * - `http://m.facebook.com/page.name`
     * - `https://www.facebook.com/group_name/`
     * - `https://developers.facebook.com`
     * - `https://business.facebook.com`
     * - `https://fb.com/username`
     *
     * @param string $value The URL to validate.
     * @return bool Returns `true` if the URL is a valid Facebook URL, otherwise `false`.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(https?:\/\/)?([a-z0-9]+(\.[a-z0-9]+)*\.)?facebook\.(com|me|net)\/[A-Za-z0-9._-]+(\/)?$/i', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Please provide a valid Facebook URL.';
    }
}
