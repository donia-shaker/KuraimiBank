<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class service_points extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(cities::class, 'city_id');
    }

}
