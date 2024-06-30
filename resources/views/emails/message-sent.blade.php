<!DOCTYPE html>
<html>
    <head>
        <title>New Message Received</title>
    </head>
    <body>
        <h2>New Message Received</h2>
        <p>
            Hello {{ $message->user->name }},
            <br>
            You have received a new message:
            <br><br>
            <strong>Subject:</strong> {{ $message->subject }}
            <br>
            <strong>Message:</strong> {{ $message->body }}
        </p>
    </body>
</html>
