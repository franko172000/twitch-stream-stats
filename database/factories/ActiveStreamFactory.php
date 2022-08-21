<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActiveStream>
 */
class ActiveStreamFactory extends Factory
{
    protected int $counter = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->counter++;
        return [
            'twitch_stream_id'=> $this->faker->unique()->randomDigit(),
            'channel_name' => $this->faker->text,
            'stream_title' => $this->faker->text,
            'game_name' => $this->faker->text,
            'viewers_count' => $this->faker->randomDigit(),
            'date_started' => $this->faker->date(),
            'thumbnail_url' => $this->faker->url(),
        ];
    }
}
