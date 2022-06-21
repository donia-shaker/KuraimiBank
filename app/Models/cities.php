<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    use HasFactory;

    public function country(){
        return $this->belongsTo(countries::class,'country_id');
    }

    public function getNameAttribute()
    {
        return json_decode($this->attributes['name']);
    }
}
