<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function services()
    {
        return $this->belongsToMany(Service::class, 'services', 'city_id', 'id');
    }

    public function directions()
    {
        return $this->belongsToMany(Direction::class, 'directions', 'city_id', 'id');
    }
    public function news()
    {
        return $this->belongsToMany(News::class, 'news', 'city_id', 'id');
    }
    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'staff', 'city_id', 'id');
    }
    public function dataResearch()
    {
        return $this->belongsToMany(DataResearch::class, 'dataResearchs', 'city_id', 'id');
    }
    public function projectTypes()
    {
        return $this->belongsToMany(ProjectType::class, 'projectTypes', 'city_id', 'id');
    }
    public function processes()
    {
        return $this->belongsToMany(Process::class, 'processes', 'city_id', 'id');
    }
    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'tools', 'city_id', 'id');
    }
}