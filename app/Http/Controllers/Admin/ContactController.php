<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactSubmission::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(ContactSubmission $contact)
    {
        // Mark as read when viewed
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(ContactSubmission $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Message deleted.');
    }
}
