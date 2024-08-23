<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'lastname',
        'email',
        'phone',
        'country',
        'company',
        'project_type_id',
        'newsletter',
        'idiom_id',
        'comments'
    ];

    
}
