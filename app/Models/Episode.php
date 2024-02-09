<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    
    public function getRouteKeyName(){
        return 'slug';
    }
    public function anime(){
        return $this->belongsTo(Anime::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function links(){
        return $this->hasMany(Link::class);
    }
}
