<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class PodcastPublishedMail extends Mailable
{
    public function __construct()
    {
    }

    public function build(): PodcastPublishedMail
    {
        return $this->view('emails.podcast-published');
    }
}
