<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoreContactRequest;
use App\Mail\ContactConfirmationMail;
use App\Mail\ContactInquiryMail;
use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('screens.web.pages.contact.index', [
            'property' => config('property'),
            'contact' => config('property.contact'),
        ]);
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $inquiry = ContactInquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'intended_use' => $validated['use'] ?? null,
            'message' => $validated['message'] ?? null,
            'status' => 'new',
        ]);

        Log::info('Web contact inquiry received', [
            'id' => $inquiry->id,
            ...$validated,
        ]);

        $ownerEmail = (string) config('mail.to.address');

        try {
            Mail::to($ownerEmail, config('mail.to.name'))
                ->send(new ContactInquiryMail($validated));
        } catch (Throwable $e) {
            Log::error('Failed to send contact inquiry to owner', [
                'inquiry_id' => $inquiry->id,
                'exception' => $e->getMessage(),
            ]);
        }

        $visitorEmail = $validated['email'];

        if (strcasecmp($visitorEmail, $ownerEmail) !== 0) {
            try {
                Mail::to($visitorEmail, $validated['name'])
                    ->send(new ContactConfirmationMail($validated));
            } catch (Throwable $e) {
                Log::warning('Contact inquiry stored, but visitor confirmation failed', [
                    'inquiry_id' => $inquiry->id,
                    'email' => $visitorEmail,
                    'exception' => $e->getMessage(),
                ]);
            }
        }

        return redirect()
            ->route('web.contact')
            ->with('success', 'Request received — the owner will reach out shortly.');
    }
}
