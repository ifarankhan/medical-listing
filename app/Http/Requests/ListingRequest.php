<?php

namespace App\Http\Requests;

use App\Rules\AtLeastOneField;
use App\Rules\WordCount;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        $isUpdate = $this->filled('listing_id');
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
            'slug' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/', // Enforces slug format
                'max:100',
                'unique:listings,slug,' . $this->route('listing') // Ignore the current record if updating
            ],
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
            /*'products.*' => [
                'required',
                new AtLeastOneField([
                    'virtual',
                    'in_person'
                ], 'Each Service/Product must have at least one of "Virtual" or "In Person" selected.')
            ],*/
            'products.*.virtual' => 'nullable|boolean', // Validate each product virtual attribute.
            'products.*.in_person' => 'nullable|boolean', // Validate each product in_person attribute.
            'products.*.accept_insurance' => 'required|boolean', // Validate each product accept_insurance attribute.
            'products.*.insurance_list' => 'nullable|string|required_if:products.*.accept_insurance,1', // Validate each product insurance_list attribute.
            'products.*.price' => 'nullable|numeric|min:0', // Validate each product price.
            'products.*.accepting_clients' => 'required'
        ];
    }

    public function messages(): array
    {
        $profilePicture = 'The Profile Picture must be of type image (jpeg, png, jpg) and may not be greater than 4 MB.';
        $legalProof = 'The Legal Proof must be an image (jpeg, png, jpg) or a PDF, and may not be greater than 10MB.';
        $contactNumber = 'The Contact Number must be in the format (000) 000-0000.';

        return [
            'profile_picture.max' => $profilePicture,
            'profile_picture.mimes' => $profilePicture,
            'legal_proof.max' => $legalProof,
            'legal_proof.mimes' => $legalProof,
            'products.*.category_id.required' => 'The Product/Service is required for each product.',
            'products.*.category_id.exists' => 'The selected Product/Service does not exist.',
            'products.*.category_id.distinct' => 'Each product must have a unique Product/Service.',
            'products.*.accept_insurance' => 'Please select at least one option.',
            'products.*.description' => 'Please add description for this product.',
            'products.*.insurance_list.required_if' => 'Insurance List is required when Insurance is accepted for each product.',
            'products.*.accepting_clients' => 'Please select at least one option.',
            'business_contact' => $contactNumber,
            'contact_number' => $contactNumber,
            'business_states' => 'Please add up to 5 states where you’re currently operating.',
            'slug.required' => 'The slug is required.',
            'slug.string' => 'The slug must be a valid string.',
            'slug.regex' => 'The slug format is invalid. Use only letters, numbers, and hyphens without spaces.',
            'slug.max' => 'The slug must not exceed 100 characters.',
            'slug.unique' => 'The slug must be unique. This one is already taken.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = collect($validator->errors()->toArray())
            ->mapWithKeys(function ($messages, $key) {
                // Replace dot notation with desired formatting.
                if (str_contains($key, '.')) {
                    // Only apply transformation if the key contains a dot.
                    $formattedKey = preg_replace('/\.(\d+)\./', '[$1][', $key) . ']';
                } else {
                    $formattedKey = $key; // Keep the key as is if no dot is present.
                }

                return [$formattedKey => $messages];
            });

        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors occurred.',
            'errors' => $errors,
        ], 422));
    }
}
