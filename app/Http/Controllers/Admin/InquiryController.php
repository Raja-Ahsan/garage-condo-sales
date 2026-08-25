<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InquiryController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->get('q', ''));
        $status = (string) $request->get('status', '');

        $inquiries = ContactInquiry::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($inner) use ($search) {
                    $inner->where('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%')
                        ->orWhere('phone', 'like', '%'.$search.'%')
                        ->orWhere('message', 'like', '%'.$search.'%');
                });
            })
            ->when(in_array($status, ['new', 'read'], true), function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latestFirst()
            ->paginate(15)
            ->withQueryString();

        return view('screens.admin.inquiries.index', [
            'inquiries' => $inquiries,
            'search' => $search,
            'status' => $status,
            'newCount' => ContactInquiry::query()->unread()->count(),
        ]);
    }

    public function show(ContactInquiry $inquiry): View
    {
        $inquiry->markRead();

        return view('screens.admin.inquiries.show', compact('inquiry'));
    }

    public function update(Request $request, ContactInquiry $inquiry): RedirectResponse
    {
        $action = (string) $request->input('action');

        if ($action === 'unread') {
            $inquiry->markUnread();

            return redirect()
                ->route('admin.inquiries.show', $inquiry)
                ->with('success', 'Inquiry marked as unread.');
        }

        $inquiry->markRead();

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Inquiry marked as read.');
    }

    public function destroy(ContactInquiry $inquiry): RedirectResponse
    {
        $inquiry->delete();

        return redirect()
            ->route('admin.inquiries.index')
            ->with('success', 'Inquiry deleted.');
    }
}
