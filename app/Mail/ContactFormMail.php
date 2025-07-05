<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $data) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: $this->data['email'],
            subject: 'New Contact Form Submission',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.contact-form',
            with: [
                'name' => $this->data['name'],
                'message' => $this->data['message'],
            ],
        );
    }
}
