<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(ContactRequest $request)
    {
        // Validate the request using the ContactRequest
        $validatedData = $request->validated();

        // Create a new Contact instance and assign values
        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->message = $validatedData['message'];
        // Save to database
        $contact->save();
        return redirect()->route('contact.index')->with('success', 'Your message has been sent successfully!');
    }
}
