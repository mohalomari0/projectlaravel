<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $replyMessage;

    /**
     * إنشاء البريد مع بيانات الاتصال ورسالة الرد.
     *
     * @param  Contact  $contact
     * @param  string  $replyMessage
     * @return void
     */
    public function __construct(Contact $contact, $replyMessage)
    {
        $this->contact = $contact;
        $this->replyMessage = $replyMessage;
    }

    /**
     * بناء البريد المرسل.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reply to Your Contact Form Submission')
                    ->view('emails.reply')
                    ->with([
                        'contact' => $this->contact,
                        'replyMessage' => $this->replyMessage,
                    ]);
    }
}
