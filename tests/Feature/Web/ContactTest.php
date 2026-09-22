<?php

namespace Tests\Feature\Web;

use App\Mail\ContactConfirmationMail;
use App\Mail\ContactInquiryMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_can_be_rendered(): void
    {
        $this->get(route('web.contact'))->assertOk();
    }

    public function test_inquiry_is_saved_and_emailed_to_the_owner_with_visitor_reply_to(): void
    {
        Mail::fake();

        $payload = [
            'name' => 'Alex Buyer',
            'email' => 'buyer@example.com',
            'phone' => '615-555-0100',
            'use' => 'Collector',
            'message' => 'I would like a private tour this weekend.',
        ];

        $this->post(route('web.contact.store'), $payload)
            ->assertRedirect(route('web.contact'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('contact_inquiries', [
            'name' => 'Alex Buyer',
            'email' => 'buyer@example.com',
            'phone' => '615-555-0100',
            'intended_use' => 'Collector',
            'message' => 'I would like a private tour this weekend.',
            'status' => 'new',
        ]);

        Mail::assertSent(ContactInquiryMail::class, function (ContactInquiryMail $mail) use ($payload) {
            return $mail->hasTo(config('mail.to.address'))
                && ! $mail->hasTo($payload['email'])
                && $mail->hasReplyTo($payload['email'], $payload['name'])
                && $mail->inquiry['name'] === $payload['name']
                && $mail->inquiry['message'] === $payload['message'];
        });

        Mail::assertSent(ContactConfirmationMail::class, function (ContactConfirmationMail $mail) use ($payload) {
            return $mail->hasTo($payload['email'])
                && ! $mail->hasTo(config('mail.to.address'));
        });
    }

    public function test_visitor_confirmation_is_not_sent_to_the_admin_address(): void
    {
        Mail::fake();

        $ownerEmail = (string) config('mail.to.address');

        $this->post(route('web.contact.store'), [
            'name' => 'Admin Self Test',
            'email' => $ownerEmail,
            'message' => 'Should not send thank-you to admin.',
        ])->assertRedirect(route('web.contact'));

        Mail::assertSent(ContactInquiryMail::class, function (ContactInquiryMail $mail) use ($ownerEmail) {
            return $mail->hasTo($ownerEmail);
        });

        Mail::assertNotSent(ContactConfirmationMail::class);
    }

    public function test_inquiry_email_uses_the_website_logo_instead_of_laravel(): void
    {
        $html = (new ContactInquiryMail([
            'name' => 'Alex Buyer',
            'email' => 'buyer@example.com',
            'phone' => '615-555-0100',
            'use' => 'Collector',
            'message' => 'Tour request',
        ]))->render();

        $this->assertStringContainsString('Garages of America', $html);
        $this->assertStringContainsString('Dual Luxury Suites', $html);
        $this->assertStringNotContainsString('laravel.com/img/notification-logo', $html);
    }

    public function test_contact_form_requires_name_and_email(): void
    {
        Mail::fake();

        $this->from(route('web.contact'))
            ->post(route('web.contact.store'), [])
            ->assertRedirect(route('web.contact'))
            ->assertSessionHasErrors(['name', 'email']);

        Mail::assertNothingSent();
        $this->assertDatabaseCount('contact_inquiries', 0);
    }
}
