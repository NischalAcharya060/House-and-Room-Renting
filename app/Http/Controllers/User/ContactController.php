<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('user.contact.index');
    }

    public function submitForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the form data in the database
        $contactMessage = new ContactMessage();
        $contactMessage->name = $request->input('name');
        $contactMessage->email = $request->input('email');
        $contactMessage->subject = $request->input('subject');
        $contactMessage->message = $request->input('message');
        $contactMessage->save();

        // Send email with form data
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        // Send email
        Mail::to('Dhakalritesh11@gmail.com')->send(new ContactFormSubmitted($name, $email, $subject, $message));

        // Optionally, you can flash a success message to the user
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
