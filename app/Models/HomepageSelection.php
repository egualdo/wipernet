<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSelection extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function directions()
    {
        return $this->hasMany(Direction::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function news()
    {
        return $this->hasMany(News::class);
    }
    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
    public function dataResearch()
    {
        return $this->hasMany(DataResearch::class);
    }
    public function projectTypes()
    {
        return $this->hasMany(ProjectType::class);
    }
    public function processes()
    {
        return $this->hasMany(Process::class);
    }
    public function tools()
    {
        return $this->hasMany(Tool::class);
    }
}
