<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    protected $guarded=['$id'];
    protected $with=['type','status','season','studios','genres','episodes'];
    public function scopeFilter($query,array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
            $query->where('title','like','%'.$filters['search'].'%');        
        }
    }
    public function getRouteKeyName(){
        return 'slug';
    }
  
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function season(){
        return $this->belongsTo(Season::class);
    }
    public function studios()
    {
        return $this->belongsToMany(Studio::class, 'anime_studios')->withPivot(["created_at","updated_at"]);
    }
    public function genres(){
        return $this->belongsToMany(Genre::class,'anime_genres')->withPivot(["created_at","updated_at"]);
    }
    public function episodes(){
        return $this->hasMany(Episode::class);
    }
}
