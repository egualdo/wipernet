<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleIdiom extends Model
{
    use HasFactory;

     protected $table='module_idioms';

     protected $casts = [
        // 'text' => 'array',
        // 'title' => 'array',
        // 'subtitle' => 'array',
        // 'video' => 'array',
        // 'image' => 'array',
        // 'file' => 'array',
    ];

     public function idiom()
    {
        return $this->hasOne(Idiom::class, 'id', 'idiom_id');
    }

     public function modules()
    {
        return $this->hasOne(Module::class, 'id', 'module_id');
    }

     public function typemodule()
    {
        return $this->hasOne(ModuleType::class, 'id', 'module_type_id');
    }
}
