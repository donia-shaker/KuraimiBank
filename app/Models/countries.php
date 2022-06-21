<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    use HasFactory;

    public function getNameAttribute()
    {
        return json_decode($this->attributes['name']);
    }
}
