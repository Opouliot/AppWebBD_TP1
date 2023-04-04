<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $fillable = ['last_name', 'first_name', 'birthdate'];

    public function actor_film()
    {
        return $this->hasMany('app/Http/Models/Actor_Film');
    }
}
