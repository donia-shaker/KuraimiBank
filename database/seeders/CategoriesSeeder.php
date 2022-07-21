<?php

namespace Database\Seeders;

use App\Models\categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categories::create([
            'name' => json_encode([
                'ar'    =>  'عن البنك ',
                'en'    =>  'about us '
            ])
        ]);

        categories::create([
            'name' => json_encode([
                'ar'    =>  'خدمات الافراد  ',
                'en'    =>  'client services '
            ])
        ]);

        categories::create([
            'name' => json_encode([
                'ar'    =>  'خدمات الشركة ',
                'en'    =>  'companies services '
            ])
        ]);

        categories::create([
            'name' => json_encode([
                'ar'    =>  'كريمي اكسبرس ',
                'en'    =>  'kuraimi Exspress'
            ])
        ]);

        categories::create([
            'name' => json_encode([
                'ar'    =>  'أم فلوس ',
                'en'    =>  'am pholose '
            ])
        ]);

        categories::create([
            'name' => json_encode([
                'ar'    =>  'خدمات الافراد  ',
                'en'    =>  'lient services '
            ])
        ]);

        categories::create([
            'name' => json_encode([
                'ar'    =>  'التمويل ',
                'en'    =>  'al-tamweel '
            ])
        ]);

        categories::create([
            'name' => json_encode([
                'ar'    =>  'من نحن ',
                'en'    =>  'About Us '
            ]),
            'parentId'=> 1
        ]);

        categories::create([
            'name' => json_encode([
                'ar'    =>  'هيكل البنك',
                'en'    =>  'Bank '
            ]),
            'parentId'=> 1
        ]);
    }
}
