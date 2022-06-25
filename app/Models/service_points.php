<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class service_points extends Model
{
    use HasFactory , HasTranslations;

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(cities::class, 'city_id');
    }

    public $translatable = ['name','address','working_hours'];


}
