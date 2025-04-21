<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyToContact extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Your inquiry has been replied to')
                    ->view('emails.replyToContact')
                    ->with([
                        'contact_name' => $this->contact->name,
                        'reply_message' => $this->contact->reply_message,
                    ]);
    }
}
