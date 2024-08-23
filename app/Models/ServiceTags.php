<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTags extends Model
{
   use HasFactory;
    protected $table='service_tags';

    protected $fillable=['tag_id','service_id'];

     public function tags()
    {
        return $this->hasOne(Tags::class, 'id', 'tag_id')->withTimestamps();
    }

     public function service()
    {
        return $this->hasOne(Service::class, 'id', 'service_id')->withTimestamps();
    }
}
