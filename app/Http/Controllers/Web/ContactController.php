<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoreContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

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

        Log::info('Web contact inquiry received', $validated);

        return redirect()
            ->route('web.contact')
            ->with('success', 'Request received — the owner will reach out shortly.');
    }
}
