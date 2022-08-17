<?php

namespace App\Http\Controllers;

use App\Enums\PodcastStatus;
use App\Mail\PodcastPublishedMail;
use App\Models\Podcast;
use Illuminate\Contracts\Mail\Mailer;

class PublishPodcastController extends Controller
{
    public function __invoke(Podcast $podcast, Mailer $mailer)
    {
        $podcast->update(['status' => PodcastStatus::PUBLISHED->value]);

        $mailer
            ->to($podcast->user)
            ->send(new PodcastPublishedMail());

    }
}
