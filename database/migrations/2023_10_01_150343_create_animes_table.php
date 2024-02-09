<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       

        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('status_id');
            $table->bigInteger('type_id');
            $table->bigInteger('season_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image');
            $table->string('trailer');
            $table->text('synopsis');
            $table->bigInteger('rating')->nullable();
            $table->bigInteger('total_episode')->nullable();
            $table->string('release');
            $table->bigInteger('duration');
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
