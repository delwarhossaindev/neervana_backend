<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['subject'] ?? 'Contact Request' }}</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 14px; color: #333;">
    <p>Dear <b>Sir/Madam,</b></p>

    <p>{!! nl2br(e($details['message'] ?? 'No message provided.')) !!}</p>

    <p>Thank you for your attention.<br>Best regards,</p>

    <span>
        <b>{{ $details['name'] ?? 'Anonymous' }}</b><br>
        {{ $details['address'] ?? '' }}<br>
        {{ $details['email'] ?? '' }}
    </span>

    <hr>
    <p style="font-size: 12px; color: #888;">
        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
        <em>Note: This is an automated message, please do not reply.</em>
    </p>
</body>
</html>
