<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Profile;

class ContactController extends Controller
{
    public function submit(ContactFormRequest $request)
    {
        $validatedData = $request->validated();

        // Get the admin profile to find the email to send to
        $adminProfile = Profile::first();

        // Fallback email if no admin profile is set
        $adminEmail = $adminProfile->email ?? config('mail.from.address');

        Mail::to($adminEmail)->send(new ContactFormMail($validatedData));

        return back()->with('success', 'Thank you for your message! I will get back to you shortly.');
    }
}
