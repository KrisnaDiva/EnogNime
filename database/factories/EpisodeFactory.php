<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'anime_id'=>mt_rand(1,100),
            'user_id'=>mt_rand(1,100),
            'title'=>$this->faker->sentence(mt_rand(1,2)),
            'episode_number'=>mt_rand(1,25),
            'slug'=>$this->faker->slug(mt_rand(1,10))
            
        ];
    }
}
