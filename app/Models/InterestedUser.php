<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedUser extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'lastname',
        'email',
        'country',
        'phone',
        'company',
        'idiom_id',
        'data_research_id',
        'status'
    ];

     public function dataResearchs()
    {
        return $this->belongsTo(DataResearch::class);
    }

    public function idioms()
    {
        return $this->belongsTo(Idiom::class);
    }
}
