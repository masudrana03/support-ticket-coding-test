<!DOCTYPE html>
<html>
<head>
    <title>Your Ticket Has Been Closed</title>
</head>
<body>
    <h1>Your Ticket Has Been Closed</h1>

    <p>Dear {{ $customerName }},</p>

    <p>Your ticket titled "<strong>{{ $ticket->subject }}</strong>" has been successfully closed by our support team.</p>

    <p>If you have further issues, feel free to open a new ticket.</p>

    <p>Thank you for using our services.</p>

    <p>Best regards,<br>Your Support Team</p>
</body>
</html>
