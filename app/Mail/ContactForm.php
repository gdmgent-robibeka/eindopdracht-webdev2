<?php

namespace App\Mail;

use App\Models\ContactForms;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $contactForm;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactForms $contactForm)
    {
        $this->contactForm = $contactForm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->contactForm->subject)->markdown('emails.contact');
    }
}
