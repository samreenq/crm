<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MeetingEmailToAdmin extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $dataDetail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataDetail)
    {
        $this->dataDetail=$dataDetail;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
        return $this->subject("Meeting Request")->view('web.email.send_user_meeting_request_mail_to_admin');
        //return $this->view('view.name');
    }
}
