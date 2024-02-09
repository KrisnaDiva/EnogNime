<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeStudio extends Model
{
    use HasFactory;
    protected $table = 'anime_studios';
    protected $guarded = ['id'];
}
