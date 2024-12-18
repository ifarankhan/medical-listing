<?php
namespace App\Services;

class PhoneService
{
    /**
     * Remove non-numeric characters from a phone number.
     *
     * @param string $phone
     * @return string
     */
    public function unformatPhoneNumber(string $phone): string
    {
        return preg_replace('/\D/', '', $phone);
    }

    /**
     * Format the phone number as (XXX) XXX-XXXX.
     *
     * @param string $phone
     * @return string
     */
    public function formatPhoneNumber(string $phone): string
    {
        return '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . '-' . substr($phone, 6);
    }
}
