<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'listing_id' => 'required|array',
            'listing_id.*' => 'integer|exists:listings,id', // Validate each listing ID
        ];
    }

    public function messages(): array
    {
        return [
            'fullName.required' => 'The full name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'The phone field is required.',
            'subject.required' => 'The subject field is required.',
            'message.required' => 'The message field is required.',
            'listing_id.required' => 'The listing ID field is required.',
            'listing_id.exists' => 'The selected listing ID is invalid.', // Example of custom message for exists rule
        ];
    }
}
