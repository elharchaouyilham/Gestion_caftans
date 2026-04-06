<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show contact form
     */
    public function create()
    {
        return view('pages.contact');
    }

    /**
     * Store contact message
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|in:reservation,catallog,availability,other',
            'message' => 'required|string|min:10|max:2000',
            'terms' => 'required|accepted'
        ]);

        try {
            // Log the message
            \Log::info('Contact Form Submission', [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? 'N/A',
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'timestamp' => now()
            ]);

            return back()->with('success', 'Merci! Votre message a été envoyé avec succès. Nous vous répondrons rapidement.');
        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            return back()
                ->withErrors(['error' => 'Une erreur est survenue. Veuillez réessayer.'])
                ->withInput();
        }
    }
}
