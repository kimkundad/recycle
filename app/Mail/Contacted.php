<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Contacted extends Mailable
{
    use Queueable, SerializesModels;

    public $mydata;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mydata)
    {
        $this->mydata = $mydata;
    }

    public function build()
    {
        return $this->subject('ข้อมูลการติดต่อจากลูกค้าหน้าเว็บ วงษ์พาณิชย์ รีไซเคิล ')
        ->view('emails.contacts');
    }

    
}
