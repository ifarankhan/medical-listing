<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WordCount implements Rule
{
    protected int $maxWords = 200;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $maxWords)
    {
        $this->maxWords = $maxWords;
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
        // Ensure the value is a string or handle nullable
        if (is_null($value)) {
            return true;
        }

        // Strip HTML tags and normalize whitespace
        $cleanedValue = trim(strip_tags($value));

        // Match words consisting of letters and handle edge cases
        $wordCount = preg_match_all('/\b[a-zA-Z]+\b/u', $cleanedValue);

        return $wordCount <= $this->maxWords;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return "The :attribute may not be greater than $this->maxWords words.";
    }
}
