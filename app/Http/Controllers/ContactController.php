<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a newly created contact message.
     */
    public function store(StoreContactRequest $request)
    {
        try {
            // Create contact record
            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Optional: Send email notification to admin
            // Mail::to('admin@indahinternet.com')->send(new ContactFormMail($contact));

            // Optional: Send auto-response to customer
            // Mail::to($contact->email)->send(new ContactAutoResponse($contact));

            // Return success response
            return back()->with('success', 'Terima kasih! Pesan Anda telah terkirim. Tim kami akan segera menghubungi Anda.');

        } catch (\Exception $e) {
            // Log error
            \Log::error('Contact Form Error: ' . $e->getMessage());

            // Return error response
            return back()
                ->withInput()
                ->with('error', 'Maaf, terjadi kesalahan. Silakan coba lagi atau hubungi kami via WhatsApp.');
        }
    }

    /**
     * Display all contact messages (Admin only).
     */
    public function index()
    {
        // Admin view - show all contacts
        $contacts = Contact::latest()->paginate(20);
        
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Mark contact as read (Admin only).
     */
    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->markAsRead();

        return back()->with('success', 'Pesan ditandai sebagai sudah dibaca.');
    }
}
