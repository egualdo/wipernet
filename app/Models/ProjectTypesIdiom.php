<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTypesIdiom extends Model
{
    use HasFactory;
    protected $table='project_types_idiom';

     public function idiom()
    {
        return $this->hasOne(Idiom::class, 'id', 'idiom_id');
    }

     public function project()
    {
        return $this->hasOne(ProjectType::class, 'id', 'project_type_id');
    }
}
