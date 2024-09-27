<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class TicketOpened extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    /**
     *
     * @param \App\Models\Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Ticket Opened: ' . $this->ticket->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.ticket_opened',
            with: [
                'ticket' => $this->ticket,
                'customerName' => $this->ticket->user->name,
            ]
        );
    }

    /**
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
