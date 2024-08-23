<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTypeTags extends Model
{
     use HasFactory;
    protected $table='project_type_tags';

    protected $fillable=['tag_id','project_type_id'];

     public function tags()
    {
        return $this->hasOne(Tags::class, 'id', 'tag_id');
    }

     public function project()
    {
        return $this->hasOne(ProjectType::class,'id','project_type_id');
    }
}
