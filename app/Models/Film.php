<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'release_year', 'length', 'description', 'rating', 'language_id', 'special_features', 'image'];

    public function language()
    {
        return $this->belongsTo('App/Models/Language');
    }

    public function actor_film()
    {
        return $this->hasMany('App/Models/Actor_Film');
    }

    public function critics()
    {
        return $this->hasMany('App\Models\Critic');
    }
}
