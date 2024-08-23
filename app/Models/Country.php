<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function services()
    {
        return $this->belongsToMany(Service::class, 'services', 'country_id', 'id');
    }

    public function directions()
    {
        return $this->belongsToMany(Direction::class, 'directions', 'country_id', 'id');
    }
    public function news()
    {
        return $this->belongsToMany(News::class, 'news', 'country_id', 'id');
    }
    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'staff', 'country_id', 'id');
    }
    public function dataResearch()
    {
        return $this->belongsToMany(DataResearch::class, 'dataResearchs', 'country_id', 'id');
    }
    public function proyectTypes()
    {
        return $this->belongsToMany(ProjectType::class, 'proyectTypes', 'country_id', 'id');
    }
    public function processes()
    {
        return $this->belongsToMany(Process::class, 'processes', 'country_id', 'id');
    }
    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'tools', 'country_id', 'id');
    }
}
