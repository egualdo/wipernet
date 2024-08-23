<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo','counter',
        'user_id'
    ];

    protected $casts = [
        'country_id' => 'array',
        'city_id' => 'array',
       // 'idiom_id' => 'array',
    ];
    public function home()
    {
        return $this->belongsTo(HomepageSelection::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'news', 'id', 'country_id');
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'news', 'id', 'city_id');
    }

    public function idioms():BelongsToMany
    {
        return $this->belongsToMany(Idiom::class, 'news_idiom', 'new_id', 'idiom_id');
    }

     public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tags::class, 'new_tags', 'new_id', 'tag_id')->withTimestamps();
    }
    
    public function incremeting(){
        $this->increment('counter');
        
    }
}