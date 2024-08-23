<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DirectionsIdiom extends Model
{
    use HasFactory;
    protected $table = 'directions_idiom';

    public function idiom()
    {
        return $this->hasOne(Idiom::class, 'id', 'idiom_id');
    }
    public function direc()
    {
        return $this->hasOne(Direction::class, 'id', 'direction_id');
    }
}