<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewTags extends Model
{
   use HasFactory;
    protected $table='new_tags';

    protected $fillable=['new_id','tag_id'];

     public function tags()
    {
        return $this->hasOne(Tags::class, 'id', 'tag_id')->withTimestamps();
    }

     public function news()
    {
        return $this->hasOne(News::class, 'id', 'new_id')->withTimestamps();
    }
}
