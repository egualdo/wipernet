<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsIdiom extends Model
{
    use HasFactory;
    protected $table='client_idioms';

     public function idiom()
    {
        return $this->hasOne(Idiom::class, 'id', 'idiom_id');
    }

     public function clients()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }
}
