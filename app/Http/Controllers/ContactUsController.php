<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactUsController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('contactus')->with(['meta' => [
            'og:title' => 'Contact Us',
        ]]);
    }

    public function submit(Request $request): RedirectResponse
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'subject' => 'required',
            'phone' => ['required', 'regex:/^(?:\+1)?\d{10}$/'],
            'g-recaptcha-response' => 'required|captcha',
        ],[
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ]);

        // Get individual fields
        $name = $request->input('name');
        $email = $request->input('email');
        $messageBody = $request->input('message');
        $subject = $request->input('subject');
        $phone = $request->input('phone');
        // Send email to the site admin (Recipient).
        Mail::send('emails.contact_to_admin', compact(
            'name',
            'email',
            'messageBody',
            'subject',
            'phone'
        ), function ($message) use ($name, $email) {

            $message->to(env('INO_EMAIL', 'info@diverrx.com'))  // Recipient email
                    ->subject('New Contact Us Message')
                    ;
        });

        // Send email back to the user (Acknowledgment).
        Mail::send('emails.contact_to_user', compact(
            'name',
            'email',
            'messageBody',
            'subject',
            'phone'
        ), function ($message) use ($email, $name) {
            $message->to($email)  // User's email
                    ->subject('Thank you for contacting us!');
        });

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
