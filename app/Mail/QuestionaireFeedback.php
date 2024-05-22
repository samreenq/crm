<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuestionaireFeedback extends Mailable implements ShouldQueue
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
        return $this->subject("Questionaire Feedback")->view('web.email.send_questionaire_feedback');
        //return $this->view('view.name');
    }
}
