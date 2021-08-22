<?php

namespace App\Http\Controllers\Pages\Contact;

use App\Http\Controllers\Controller;
use App\Mail\ContactForm;
use App\Models\ContactForms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMail(Request $request) {
        $contactForm = ContactForms::create($request->all());

        Mail::to('robin.bekaert@hotmail.com')->send(new ContactForm($contactForm));

        return redirect()->back();
    }
}
