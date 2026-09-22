<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactInquiryMail extends Mailable
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
        $ownerEmail = (string) config('mail.to.address');
        $ownerName = (string) config('mail.to.name');

        return new Envelope(
            to: [
                new Address($ownerEmail, $ownerName),
            ],
            replyTo: [
                new Address($this->inquiry['email'], $this->inquiry['name']),
            ],
            subject: 'New contact inquiry: '.$this->inquiry['name'].' ('.$this->inquiry['email'].')',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.inquiry',
        );
    }
}
