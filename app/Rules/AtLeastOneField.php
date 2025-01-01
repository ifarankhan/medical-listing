<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AtLeastOneField implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        protected array $fields,
        protected string $message = 'At least one field must be selected.'
    ) {}

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        foreach ($this->fields as $field) {
            if (!empty($value[$field])) {
                return true; // Passes if any field is not empty
            }
        }
        return false; // Fails if none of the fields are not empty
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return $this->message;
    }
}
