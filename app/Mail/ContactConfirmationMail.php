<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactConfirmationMail extends Mailable
{
    use SerializesModels;

    /**
     * @param  array{name: string, email: string, phone?: string|null, use?: string|null, message?: string|null}  $inquiry
     */
    public function __construct(public array $inquiry)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(
                (string) config('mail.from.address'),
                (string) config('property.name')
            ),
            subject: 'We received your inquiry — '.config('property.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.confirmation',
        );
    }
}
