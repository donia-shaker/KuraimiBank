<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class financial_reports extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    public $translatable = ['title','description'];
}
