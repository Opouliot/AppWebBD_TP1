<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critic extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'film_id', 'score', 'comment'];

    public function film()
    {
        return $this->belongsTo('app\Models\Film');
    }
    public function user()
    {
        return $this->belongsTo('app\Models\User');
    }
}
