<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    // protected $casts = [
    //     'name' => 'object'
    // ];

    public function getNameAttribute()
    {
        return json_decode($this->attributes['name']);
    }
}
