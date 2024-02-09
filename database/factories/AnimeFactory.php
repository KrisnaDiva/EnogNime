<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Youtube;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anime>
 */
class AnimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new Youtube($faker));

        return [
            'status_id'=> mt_rand(1,2),
            'type_id'=>mt_rand(1,5),
            'season_id'=>mt_rand(1,100),
            'title'=>$this->faker->sentence(mt_rand(1,2)),
            'slug'=>$this->faker->slug(mt_rand(1,10)),
            'image'=>$this->faker->word(),
            'trailer'=>$faker->youtubeEmbedUri(),
            'synopsis'=>collect($this->faker->paragraphs(mt_rand(1,3)))->map(fn($p)=>"<p>$p<?p>")->implode(''),
            'rating'=>mt_rand(1,10),
            'total_episode'=>mt_rand(1,25),
            'release'=>$this->faker->date('m-d-Y'),
            'duration'=>mt_rand(1,60),
        ];
    }
}
