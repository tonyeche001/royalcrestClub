<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        try {
            $toEmail = config('mail.from.address') ?: 'info@royalcrestclub.com';
            Mail::raw(
                "New Contact Form Submission from Royal Crest Club Website:\n\n" .
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Subject: " . ($validated['subject'] ?? 'General Inquiry') . "\n\n" .
                "Message:\n{$validated['message']}",
                function ($mail) use ($validated, $toEmail) {
                    $mail->to($toEmail)
                        ->subject('Royal Crest Club Contact: ' . ($validated['subject'] ?? 'New Inquiry'))
                        ->replyTo($validated['email'], $validated['name']);
                }
            );
        } catch (\Throwable $e) {
            Log::error('Contact form email failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Thank you for contacting Royal Crest Club! Your message has been received.');
    }
}
