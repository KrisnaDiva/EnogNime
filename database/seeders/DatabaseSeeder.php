<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\Studio;
use App\Models\AnimeGenre;
use App\Models\AnimeStudio;
use App\Models\Episode;
use App\Models\Link;
use App\Models\Season;
use App\Models\Status;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Type::create([
            'name'=>'TV',
            'slug'=>'tv'
        ]);
        Type::create([
            'name'=>'OVA',
            'slug'=>'ova'
        ]);
        Type::create([
            'name'=>'ONA',
            'slug'=>'ona'
        ]);
        Type::create([
            'name'=>'Special',
            'slug'=>'special'
        ]);
        Type::create([
            'name'=>'Movie',
            'slug'=>'movie'
        ]);

        Status::create([
            'name'=>'Ongoing',
            'slug'=>'ongoing'
        ]);
        Status::create([
            'name'=>'Completed',
            'slug'=>'completed'
        ]);
        Season::create([
            'name'=>'Winter 2023',
            'slug'=>'winter-2023'
        ]);
        Season::create([
            'name'=>'Spring 2023',
            'slug'=>'spring-2023'
        ]);
        Season::create([
            'name'=>'Summer 2023',
            'slug'=>'summer-2023'
        ]);
        Season::create([
            'name'=>'Fall 2023',
            'slug'=>'fall-2023'
        ]);

        User::factory(100)->create();
        Anime::factory(100)->create();
        Genre::factory(100)->create();
        AnimeGenre::factory(100)->create();
        Studio::factory(100)->create();
        Season::factory(100)->create();
        AnimeStudio::factory(100)->create();
        Episode::factory(100)->create();
        Link::factory(100)->create();
    }
}
