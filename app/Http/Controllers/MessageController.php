<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessageRequest;
use App\Mail\MessageSend;
use App\Models\Listing;
use App\Models\Message;


use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    private Message $message;
    private Listing $listing;

    public function __construct(Message $message, Listing $listing)
    {
        $this->message = $message;
        $this->listing = $listing;
    }

    public function send(SendMessageRequest $request): JsonResponse
    {
        try {
            // Validate request, ensure all fields are provided.
            $request->validated();
            // Array of listing ids.
            $listingIds = $request->listing_id;
            $serviceProviderName = '';
            // Prepare and store the message in message table and send email.
            foreach($listingIds as $listingId) {

                $serviceProvider = $this->getProviderIdByListingId($listingId);
                $message = $this->message->newInstance(); // Need new instance to store individual data.
                $message->full_name = $request->fullName;
                $message->email = $request->email;
                $message->phone = $request->phone;
                $message->subject = $request->subject;
                $message->body = $request->message;
                $message->user_id = Auth::id();
                // Get provider ID by listing ID
                $message->provider_id = $serviceProvider->id;
                $message->listing_id = $listingId;
                // Save the message
                $message->save();
                // Send email to service provider
                $this->sendMail($serviceProvider->email, $message);
                $serviceProviderName = $serviceProvider->name;
            }

            $message = 'Your message was successfully sent to your selected providers. You can view the messages sent in Messaging Center';

            if (count($listingIds) == 1) {

                $message = sprintf('Your message was successfully sent to %s. You can view the message sent in Messaging Center', $serviceProviderName);
            }
            // Clear the session after processing.
            session()->forget('selectedValues');
            // Show success message.
            return response()->json([
                'success' => true,
                'message' => $message
            ]);
        } catch (ModelNotFoundException $exception) {
            // Handle the case where the listing with the provided ID is not found.
            return response()->json([
                'errors' => [
                    'listing' => ['Listing not found.']
                ],
            ], 404);
        }
    }

    public function index(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        // Fetch messages by current user.
        $messages = $user->messages()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        if ($request->ajax()) {
            $view = view('message.partials.messages', compact('messages'))->render();
            return response()->json([
                'messages' => $view,
                'pagination' => (string) $messages->links('pagination::bootstrap-4')
            ]);
        }
        // Load view.
        return view('message.index', compact('messages'));
    }
    private function getProviderIdByListingId(int $listingId)
    {
        $listing = $this->listing->findOrFail($listingId);

        return $listing->user()->first();
    }

    private function sendMail(string $email, $message): void
    {
        try {
            Mail::to($email)->send(new MessageSend($message));
        } catch (Exception $e) {

            Log::error('Error sending email: ' . $e->getMessage());
        }
    }
}
