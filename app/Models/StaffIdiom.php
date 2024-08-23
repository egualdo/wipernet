<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffIdiom extends Model
{
    use HasFactory;
    protected $table = 'staff_idiom';

    public function idiom()
    {
        return $this->hasOne(Idiom::class, 'id', 'idiom_id');
    }
    public function staff()
    {
        return $this->hasOne(Staff::class, 'id', 'staff_id');
    }
}