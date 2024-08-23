<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolsIdiom extends Model
{
    use HasFactory;
    protected $table='tools_idiom';

    public function idiom()
    {
        return $this->hasOne(Idiom::class, 'id', 'idiom_id');
    }
    public function tool()
    {
        return $this->hasOne(Tool::class, 'id', 'tool_id');
    }
}
