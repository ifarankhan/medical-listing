<?php

namespace App\Http\Controllers;

use App\Mail\GetInTouchMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GetInTouchController extends Controller
{
    public function sendEmail(Request $request): JsonResponse
    {
        try {
            // Validate the email field
            $request->validate([
                'email' => 'required|email',
            ]);
            // Prepare the data for the email.
            $email = $request->input('email');
            $toEmail = env('INO_EMAIL', 'info@diverrx.com');

            Mail::to($toEmail)
                ->send(new GetInTouchMail([
                    'fromEmail' => 'no-reply@diverrx.com',
                    'email' => $email,
                ]));
            // Return a success response
            return response()->json([
                'success' => true,
                'message' => 'Thank you for getting in touch!'
            ]);
        } catch (\Exception $ex) {
            // Return a failure response
            return response()->json([
                'success' => false,
                'message' => 'Failed to send email. Please try again later.'
            ], 500);
        }
    }
}
