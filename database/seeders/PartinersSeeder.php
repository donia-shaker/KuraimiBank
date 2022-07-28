<?php

namespace Database\Seeders;

use App\Models\our_partiners;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartinersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        our_partiners::create([
            'title' => [
                'ar'    =>  'mastercard',
                'en'    =>  'mastercard'
            ],
            'image' =>  'comp-1.png',
            'description' => [
                'ar'    =>  'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة                ',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
        ]);

        our_partiners::create([
            'title' => [
                'ar'    =>  'مصرف الانماء',
                'en'    =>  'Alinma Bank'
            ],
            'image' =>  'IFC-4.png',
            'description' => [
                'ar'    =>  'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة                ',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
        ]);
    }
}
