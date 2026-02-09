<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValentineMail extends Mailable
{
    use Queueable, SerializesModels;

    public $girlName;

    // Pass girl name dynamically (optional)
    public function __construct($girlName = "Love")
    {
        $this->girlName = $girlName;
    }

    // Email subject
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Happy Valentine Day ❤️'
        );
    }

    // Email content view
    public function content(): Content
    {
        return new Content(
            view: 'emails.valentine'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
