<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsIdiom extends Model
{
     use HasFactory;
    protected $table = 'news_idiom';

     protected $fillable = [
        'topic',
        'autor',
        'date',
        'title',
        'subtitle',
        'linkedin',
        'facebook',
        'twitter',
        'photo',
        'description',
        'slug',
        'new_id',
        'idiom_id',
        'email'
    ];

            

    public function idiom()
    {
        return $this->hasOne(Idiom::class, 'id', 'idiom_id');
    }

     public function news()
    {
        return $this->hasOne(News::class, 'id', 'new_id');
    }
}
