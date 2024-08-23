<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderIdiom extends Model
{
    use HasFactory;
    protected $table='header_idioms';
     protected $fillable = [
        'link'
    ];

     public function idiom()
    {
        return $this->hasOne(Idiom::class, 'id', 'idiom_id');
    }

     public function headers()
    {
        return $this->hasOne(Header::class, 'id', 'header_id');
    }
}
