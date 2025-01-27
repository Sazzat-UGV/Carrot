<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333333;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .body {
            padding: 20px;
            text-align: left;
        }

        .body h2 {
            color: #007bff;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .body p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .cta-button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 16px;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 20px;
            font-size: 14px;
            color: #6c757d;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Welcome to {{ $setting->site_name }}</h1>
        </div>
        <div class="body">
            <p>{!! $description !!}</p>
        </div>
        <!-- Footer -->
        <div class="footer">
            <p>You're receiving this email because you subscribed to our newsletter at
                {{ $setting->site_name || config('app.name') }}.</p>
            <p>If you wish to unsubscribe, click <a href="#">here</a>.</p>
        </div>
    </div>
</body>

</html>
