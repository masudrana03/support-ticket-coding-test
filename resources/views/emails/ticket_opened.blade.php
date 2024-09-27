<!DOCTYPE html>
<html>
<head>
    <title>New Ticket Opened</title>
</head>
<body>
    <h1>New Ticket Opened</h1>

    <p>Dear Admin,</p>

    <p>A new ticket has been opened by {{ $customerName }}:</p>

    <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
    <p><strong>Description:</strong> {{ $ticket->description }}</p>

    <p>You can review the ticket in the admin panel.</p>

    <p>Best regards,<br>Your Support Team</p>
</body>
</html>
