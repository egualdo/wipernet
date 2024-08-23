<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataResearchIdiom extends Model
{
    use HasFactory;
    protected $table = 'data_research_idiom';

    public function idiom()
    {
        return $this->hasOne(Idiom::class, 'id', 'idiom_id');
    }
    
}