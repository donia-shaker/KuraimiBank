<?php

namespace Database\Seeders;

use App\Models\social_media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        social_media::create([
            'name' => json_encode([
                'ar'    =>  'تلفون ',
                'en'    =>  'phone '
            ]),
            'link' =>  '967 1 503888 ',
            'icon' => 'icon',
        ]);

        social_media::create([
            'name' => json_encode([
                'ar'    =>  'فاكس ',
                'en'    =>  'Fax '
            ]),
            'link' =>  ' 967 1 435400 ',
            'icon' => 'icon',
        ]);

        social_media::create([
            'name' => json_encode([
                'ar'    =>  'الرقم المجاني ',
                'en'    =>  'Free Number '
            ]),
            'link' =>  ' 8008800 ',
            'icon' => 'icon',
        ]);

        social_media::create([
            'name' => json_encode([
                'ar'    =>  'صندوق بريد ',
                'en'    =>  'E-Email '
            ]),
            'link' =>  ' 9357',
            'icon' => 'icon',
        ]);
    }
}
