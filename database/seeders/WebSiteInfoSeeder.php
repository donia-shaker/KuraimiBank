<?php

namespace Database\Seeders;

use App\Models\website_info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebSiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        website_info::create([
                
                    'table_key' => [
                        'ar'    =>  '<p><a> عن البنك </a></p> ',
                        'en'    =>  '<p><a> about The Bank </a></p> '
                    ],
                    'table_value' => [
                        'ar'    =>  '<p> تحتوي هذه الصفحة عن معلومات البنك <p>',
                        'en'    =>  '<p>  this Pages Contain Information About The Bank <p>',
                    ],
                

                    'table_key' => [
                        'ar'    =>  '<p><a>الرؤيا </a></p> ',
                        'en'    =>  '<p><a>Our principles </a></p> '
                    ],
                    'table_value' => [
                        'ar'    =>  '<p> ادخل الرؤيا الخاصة البنك <p>',
                        'en'    =>  '<p>  this Pages Contain Information About The Bank <p>',
                    ],
                ]

            
        );
    }
}
