<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Direction extends Model
{
    use HasFactory;
    protected $fillable = [
        'acronym',
        'subtitle',
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
        return $this->belongsToMany(Country::class, 'directions', 'id', 'country_id');
    }
    public function cities()
    {
        return $this->belongsToMany(City::class, 'directions', 'id', 'city_id');
    }
    public function idioms():BelongsToMany
    {
        return $this->belongsToMany(Idiom::class, 'directions_idiom', 'direction_id', 'idiom_id');
    }
}