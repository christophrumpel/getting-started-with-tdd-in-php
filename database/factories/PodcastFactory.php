<?php

namespace Database\Factories;

use App\Enums\PodcastStatus;
use App\Models\Podcast;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PodcastFactory extends Factory
{
    protected $model = Podcast::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'status' => PodcastStatus::DRAFT->value,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
