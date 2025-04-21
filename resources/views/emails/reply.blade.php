<!DOCTYPE html>
<html>
<head>
    <title>Reply to Your Contact Form Submission</title>
</head>
<body>
    <h3>Dear {{ $contact->name }},</h3>
    <p>Thank you for reaching out to us. Here is our reply:</p>
    <p>{{ $replyMessage }}</p>
    <p>Best regards,<br>Your Company</p>
</body>
</html>
