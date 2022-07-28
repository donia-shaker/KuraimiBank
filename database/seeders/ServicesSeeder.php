<?php

namespace Database\Seeders;

use App\Models\services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        services::create([
            'name' => [
                'ar'    =>  'مشروعي',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 5
        ]);

        services::create([
            'name' => [
                'ar'    =>  'تمويل المساكن',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 5
        ]);

        services::create([
            'name' => [
                'ar'    =>  'حساب جاري',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 6
        ]);

        services::create([
            'name' => [
                'ar'    =>  'حساب توفير',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 6
        ]);

        services::create([
            'name' => [
                'ar'    =>  'حساب وديعه',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 7
        ]);

        services::create([
            'name' => [
                'ar'    =>  'حساب توفير',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 7
        ]);

        services::create([
            'name' => [
                'ar'    =>  'نظام ابواب',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 2
        ]);

        services::create([
            'name' => [
                'ar'    =>  ' خدمات الشركة الخارجيه',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 2
        ]);

        services::create([
            'name' => [
                'ar'    =>  ' ارسال واستلام حوالات',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 3
        ]);

        services::create([
            'name' => [
                'ar'    =>  ' كريمي توكيل',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 3
        ]);

        services::create([
            'name' => [
                'ar'    =>  ' ام فلوس أفراد',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 4
        ]);

        services::create([
            'name' => [
                'ar'    =>  ' ام فلوس وكلاء',
                'en'    =>  'project'
            ],
            'description' => [
                'ar'    =>  '
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                يساعدك لتجيب عن هذا التساؤ
            </p>',
                'en'    =>  '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'image' =>  'Al-_Kurimi_3 5 f.png',

            'background_image' => 'Al-_Kurimi_3 f2.png',
            'other_adventage' => [
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'service_conditions'=>[
                'ar'    =>  '
                <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر
                الإسلامي
                على مدار الساعة وطوال أيام الأسبوع
                إمكانيَّة سحب واستلام الحوالات مباشرة عبر خدمة الصرَّاف الآلي وبدون أي
                بطاقة
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                إمكانيَّة التحويل إلى أي حساب في بنك الكريمي للتمويل الأصغر الإسلامي
                سبأفون - سداد الهاتف الثابت - سداد -Y - YOU - يمن موبايل) سداد فواتير الخدمات
                (فواتير الكهرباء - فواتير الماء- adsl الانترنت فايبر
                تغيير كلمة المرور في الصرَّافات التابعة لبنك للتمويل الأصغر الإسلامي
                الإيداع النقدي للحساب في الصرَّافات الآلية التي تدعم ذلك
                طلب كشف حساب مختصر او الاستعلام عن الرصي</p>
                ',
                'en'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus corrupti maxime illum incidunt itaque dicta libero aperiam, a quos, repudiandae nemo dolore aspernatur optio doloremque sint fuga qui reprehenderit velit.
                '
            ],
            'category_id' => 4
        ]);
    }
}
