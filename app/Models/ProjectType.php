<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectType extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','photo','name'
    ];

    protected $casts = [
        'country_id' => 'array',
        'city_id' => 'array',
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
        return $this->belongsToMany(Country::class, 'projectTypes', 'id', 'country_id');
    }
    public function cities()
    {
        return $this->belongsToMany(City::class, 'projectTypes', 'id', 'city_id');
    }
    public function idioms():BelongsToMany
    {
        return $this->belongsToMany(Idiom::class, 'project_types_idiom', 'project_type_id', 'idiom_id');
    }
    
    public function modules(): HasMany
    {
        return $this->hasMany(Module::class, 'id', 'project_type_id');
    }

      public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tags::class, 'project_type_tags', 'project_type_id', 'tag_id')->withTimestamps();
    }
}