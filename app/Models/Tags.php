<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'status'
    ];


     public function cases():BelongsToMany
    {
        return $this->belongsToMany(ProjectType::class, 'project_type_tags', 'tag_id', 'project_type_id');
    }

    public function services():BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'service_tags', 'tag_id', 'service_id');
    }

    public function news():BelongsToMany
    {
        return $this->belongsToMany(News::class, 'new_tags', 'tag_id', 'new_id');
    }

}
