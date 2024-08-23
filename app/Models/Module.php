<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Module extends Model
{
    use HasFactory;
           
     protected $fillable = [
        'name','order','project_type_id','service_id','module_type_id','json_data'
        
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
  
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'modules', 'id', 'country_id');
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'modules', 'id', 'city_id');
    }

    public function idioms():BelongsToMany
    {
        return $this->belongsToMany(Idiom::class, 'module_idioms', 'module_id', 'idiom_id');
    }

    public function typeModule()
    {
        return $this->hasOne(ModuleType::class, 'id', 'module_type_id');
    }

    public function typeProjects()
    {
        return $this->belongsTo(ProjectType::class);
    }

     public function services()
    {
        return $this->belongsTo(Service::class);
    }
}
