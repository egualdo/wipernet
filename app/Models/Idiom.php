<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Idiom extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'acronym',
    ];
    public function dataResearchs():BelongsToMany
    {
        return $this->belongsToMany(DataResearch::class, 'data_research_idiom', 'idiom_id', 'data_research_id');
    }
    public function directions():BelongsToMany
    {
        return $this->belongsToMany(Direction::class, 'directions_idiom', 'idiom_id', 'direction_id');
    }
    public function news():BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_idiom', 'idiom_id', 'new_id');
    }
    public function processes():BelongsToMany
    {
        return $this->belongsToMany(Process::class, 'processes_idiom', 'idiom_id', 'process_id');
    }
    public function projectTypes():BelongsToMany
    {
        return $this->belongsToMany(ProjectType::class, 'project_types_idiom', 'idiom_id', 'project_type_id');
    }
    public function services():BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'services_idiom', 'idiom_id', 'service_id');
    }
    public function staff():BelongsToMany
    {
        return $this->belongsToMany(Staff::class, 'staff_idiom', 'idiom_id', 'staff_id');
    }
    public function tools():BelongsToMany
    {
        return $this->belongsToMany(Tool::class, 'tools_idiom', 'idiom_id', 'tool_id');
    }
    public function clients():BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'client_idioms', 'idiom_id', 'client_id');
    }
     public function modules():BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'module_idioms', 'idiom_id', 'module_id');
    }
}