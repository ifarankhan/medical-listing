<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessageRequest;
use App\Models\Listing;
use App\Models\Message;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            // Get provider ID by listing ID
            $providerId = $this->getProviderIdByListingId($request->listing_id);
            // Get request and store in message table.
            // Create a new message instance
            $message = $this->message;
            $message->full_name = $request->fullName;
            $message->email = $request->email;
            $message->phone = $request->phone;
            $message->subject = $request->subject;
            $message->body = $request->message;
            $message->user_id = Auth::id();
            $message->provider_id = $providerId;
            $message->listing_id = $request->listing_id;
            // Save the message
            $message->save();
            // Send email to service provider
            // Fetch user id of the listing's owner
            // Send email.
            // Show success message.
            // Show error message.
            return response()->json([
                'success' => true,
                'message' => 'Message sent successfully!'
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
        // Fetch messages by current user.
        $messages = Auth::user()
            ->messages()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'messages' => $messages,
                'pagination' => (string) $messages->links()
            ]);
        }

        // Load view.
        return view('message.index', compact('messages'));
    }
    private function getProviderIdByListingId(int $listingId)
    {
        $listing = $this->listing->findOrFail($listingId);

        return $listing->user_id;
    }
}
