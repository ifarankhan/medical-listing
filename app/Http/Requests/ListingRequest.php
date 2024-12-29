<?php

namespace App\Http\Requests;

use App\Rules\WordCount;
use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
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
        $contactFormatRule = 'required|regex:/^\(\d{3}\)\s\d{3}-\d{4}$/|max:14';
        // Check if this is a create or update request
        $isUpdate = $this->has('listing_id');
        return [
            'authorized' => 'required|boolean',
            'registered' => 'required|boolean',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => $contactFormatRule,
            //'address' => 'required|string',
            'business_name' => 'required|string',
            'ein' => 'nullable|regex:/^\d{2}-\d{7}$/',
            'business_address' => 'required|string',
            'business_city' => 'string',
            'business_zipcode' => 'string|regex:/^\d{5}(-\d{4})?$/',
            'business_contact' => $contactFormatRule,
            'business_email' => 'required|email:rfc',
            'business_states' => 'required|max:5',
            'profile_picture' => $isUpdate
                ? 'nullable|mimes:jpeg,png,jpg|image|max:4096'
                : 'required|mimes:jpeg,png,jpg|image|max:4096', // Required only for new entries
            'legal_proof' => $isUpdate
                ? 'nullable|mimes:jpeg,png,jpg,pdf|file|max:10240'
                : 'required|mimes:jpeg,png,jpg,pdf|file|max:10240', // Required only for new entries
            'business_description' => ['nullable', new WordCount(200)],
            'social_media_1' => 'nullable|facebook_url',
            'social_media_2' => 'nullable|twitter_url',
            'social_media_3' => 'nullable|linkedin_url',
            'social_media_4' => 'nullable|instagram_url',
            'products' => 'required|array|max:5', // Maximum 5 products allowed.
            'products.*.category_id' => 'bail|required|exists:categories,id|distinct', // Using bail to stop after first failure.
            'products.*.description' => ['required', 'string', new WordCount(200)], // Validate each product description.
            'products.*.virtual' => 'nullable|boolean', // Validate each product virtual attribute.
            'products.*.in_person' => 'nullable|boolean', // Validate each product in_person attribute.
            'products.*.accept_insurance' => 'nullable|boolean', // Validate each product accept_insurance attribute.
            'products.*.insurance_list' => 'nullable|string|required_if:products.*.accept_insurance,1', // Validate each product insurance_list attribute.
            'products.*.price' => 'nullable|numeric|min:0', // Validate each product price.
            'products.*.accepting_clients' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'profile_picture.max' => 'The profile picture must be a file of type: jpeg, png, jpg, must be an image, and may not be greater than 4 MB.',
            'profile_picture.mimes' => 'The profile picture must be a file of type: jpeg, png, jpg, must be an image, and may not be greater than 4 MB.',
            'legal_proof.max' => 'The file must be an image (jpeg, png, jpg) or a PDF, and may not be greater than 10MB.',
            'legal_proof.mimes' => 'The file must be an image (jpeg, png, jpg) or a PDF, and may not be greater than 10MB.',
            'products.*.category_id.required' => 'The Product/Service is required for each product.',
            'products.*.category_id.exists' => 'The selected Product/Service does not exist.',
            'products.*.category_id.distinct' => 'Each product must have a unique Product/Service.',
            'products.*.insurance_list.required_if' => 'Insurance List is required when Insurance is accepted for each product.',
            'business_contact' => 'Please enter a valid phone number in the format (000) 000-0000.',
            'contact_number' => 'Please enter a valid phone number in the format (000) 000-0000.',
            //'business_states' => 'You can add up to 5 states where you’re currently operating.'
        ];
    }
}
