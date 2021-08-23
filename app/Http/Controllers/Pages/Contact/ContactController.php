<?php

namespace App\Http\Controllers\Pages\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use App\Models\ContactForms;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMail(ContactFormRequest $request) {
        $contactForm = ContactForms::create($request->all());
        $emails = [];

        foreach(User::all() as $user) {
            array_push($emails, $user->email);
        }

        foreach($emails as $email) {
            Mail::to($email)->send(new ContactForm($contactForm));
        }

        return redirect()->back();
    }
}
