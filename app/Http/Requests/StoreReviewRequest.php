<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'listing_id'  => 'required|exists:listings,id',
            'rating'      => 'required|integer|min:1|max:5',
            'review_text' => 'required|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'listing_id.required'  => 'Listing is required.',
            'listing_id.exists'    => 'Invalid listing selected.',
            'rating.required'      => 'Please provide a rating.',
            'rating.integer'       => 'Rating must be a number.',
            'rating.min'           => 'Rating must be at least 1.',
            'rating.max'           => 'Rating cannot be more than 5.',
            'review_text.required' => 'Review text is required.',
            'review_text.max'      => 'Review text cannot exceed 500 characters.',
        ];
    }
}
