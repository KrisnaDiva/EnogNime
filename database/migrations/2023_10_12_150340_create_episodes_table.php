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
;

        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anime_id');
            $table->bigInteger('user_id');
            $table->string('title');
            $table->bigInteger('episode_number');
            $table->string('slug')->unique();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
