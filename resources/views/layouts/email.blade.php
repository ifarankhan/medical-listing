<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Email from ' . config('app.name') }}</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .email-container {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }
        .header {
            background-color: #000000; /* Change background color to black */
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }
        .header img {
            max-width: 200px; /* Adjust the logo size */
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #999999;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
        }
        .content {
            margin: 30px 0;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="header">
        <a href="{{ config('app.url') }}">
            <img src="{{ asset('frontend/images/logo_diverrx.png') }}" alt="{{ config('app.name') }} Logo">
        </a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </div>
</div>
</body>
</html>
