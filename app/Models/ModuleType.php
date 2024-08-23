<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleType extends Model
{
    use HasFactory;

    protected $table='type_modules';

     protected $fillable = [
        'name','preview','html','json_data','link'
        
    ];

    // protected $casts = [
    //     'country_id' => 'array',
    //     'city_id' => 'array',
    //    // 'idiom_id' => 'array',
    // ];
    // public function home()
    // {
    //     return $this->belongsTo(HomepageSelection::class);
    // }
  
    // public function countries()
    // {
    //     return $this->belongsToMany(Country::class, 'modules', 'id', 'country_id');
    // }

    // public function cities()
    // {
    //     return $this->belongsToMany(City::class, 'modules', 'id', 'city_id');
    // }

    // public function idioms():BelongsToMany
    // {
    //     return $this->belongsToMany(Idiom::class, 'module_idioms', 'module_id', 'idiom_id');
    // }
}
