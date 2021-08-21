<?php

namespace App\Http\Controllers\Pages\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendMail(Request $request) {
        return redirect()->back();
    }
}
