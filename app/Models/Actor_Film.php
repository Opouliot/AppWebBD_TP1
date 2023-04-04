<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor_Film extends Model
{
    use HasFactory;
    protected $fillable = ['actor_id', 'film_id'];

    public function actor()
    {
        return $this->belongsTo('app/Models/Actor');
    }
    public function film()
    {
        return $this->belongsTo('app/Models/Film');
    }
}
