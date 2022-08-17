<?php

namespace Tests\Feature;

use App\Enums\PodcastStatus;
use App\Mail\PodcastPublishedMail;
use App\Models\Podcast;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PublishPodcastTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_publishes_podcast(): void
    {
        // Arrange
        Mail::fake();
        $podcast = Podcast::factory()->create();

        // Act
        $this->post(route('podcasts.publish', $podcast));

        // Assert
        $this->assertDatabaseHas('podcasts', [
            'id' => $podcast->id,
            'status' => PodcastStatus::PUBLISHED,
        ]);
    }

    /** @test */
    public function it_sends_out_email_to_the_podcast_author(): void
    {
        // Arrange
        Mail::fake();
        $podcast = Podcast::factory()->create();

        // Act
        $this->post(route('podcasts.publish', $podcast));

        // Assert
        Mail::assertSent(PodcastPublishedMail::class);
    }
}
