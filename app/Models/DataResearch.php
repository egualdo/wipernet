<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DataResearch extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id'
    ];

    protected $casts = [
        'country_id' => 'array',
        'city_id' => 'array',
        //'idiom_id' => 'array',
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
        return $this->belongsToMany(Country::class, 'dataResearchs', 'id', 'country_id');
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'dataResearchs', 'id', 'city_id');
    }

    public function idioms():BelongsToMany
    {
        return $this->belongsToMany(Idiom::class, 'data_research_idiom', 'data_research_id', 'idiom_id');
    }
}