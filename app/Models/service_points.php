<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_points extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(cities::class, 'city_id');
    }

}
