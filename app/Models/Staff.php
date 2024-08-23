<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'photo',
        'linkedin',
        'user_id'
    ];

    protected $casts = [
        'country_id' => 'array',
        'city_id' => 'array',
      //  'idiom_id' => 'array',
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
        return $this->belongsToMany(Country::class, 'staff', 'id', 'country_id');
    }
    public function cities()
    {
        return $this->belongsToMany(City::class, 'staff', 'id', 'city_id');
    }
    public function idioms():BelongsToMany
    {
        return $this->belongsToMany(Idiom::class, 'staff_idiom', 'staff_id', 'idiom_id');
    }
}