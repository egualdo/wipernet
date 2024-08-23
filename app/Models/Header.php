<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Header extends Model
{
    use HasFactory;

      protected $table='header_home';
    protected $fillable = [
        // 'title',
        // 'subtitle',
        // 'image'
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
    
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'header_home', 'id', 'country_id');
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'header_home', 'id', 'city_id');
    }

    public function idioms():BelongsToMany
    {
        return $this->belongsToMany(Idiom::class, 'header_idioms', 'header_id', 'idiom_id');
    }
}
