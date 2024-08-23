<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessesIdiom extends Model
{
    use HasFactory;
    protected $table = 'processes_idiom';

    public function idiom()
    {
        return $this->hasOne(Idiom::class, 'id', 'idiom_id');
    }

     public function process()
    {
        return $this->hasOne(Process::class, 'id', 'process_id');
    }
}