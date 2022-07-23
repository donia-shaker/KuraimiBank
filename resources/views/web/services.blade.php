@extends('web.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('scss/services.css') }}" />
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="text">
                <span>التمويل/مشروعي</span>
                <h1 class="h-1">مشروعي</h1>
                <p class="f-16pt">بتمويلات تصل إلى <span class="number"> 50 </span> مليون ريال يمني، تخيل ماذا يمكنك أن
                    تفعل لتطوير مشروعك؟ بنك الكريمي للتمويل الأصغر الإسلامي
                    يساعدك لتجيب عن هذا التساؤ
                </p>
                <button class="btn-2">طلب الخدمة</button>
            </div>
            <div class="images">
                <img src="{{asset('images/Al-_Kurimi_3 f2.png')}}" alt="" class="back">
                <img src="{{ asset('images/Al-_Kurimi_3 5 f.png') }}" alt="">
            </div>
        </div>
    </main>

    {{-- Start Adventage Section --}}
    <section class="adventages">
        <div class="container">
            <div class="main-adv">
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('images/Rectangle 991.png') }}" alt="" >
                        <img src="{{ asset('images/Layer 58.png') }}" alt="" class="two" >
                        <span>1</span>
                    </div>
                    <h2 class="name h-2">تراعي طبيعة دخلك</h2>
                    <p class="">تراعي طبيعة دخلك وأقساطها مريحة (شهرية
                        موسمية)</p>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('images/Rectangle 991.png') }}" alt="" >
                        <img src="{{ asset('images/Layer 58.png') }}" alt="" class="two">
                        <span>2</span>
                    </div>
                    <h2 class="name h-2">تراعي طبيعة دخلك</h2>
                    <p class="'">تراعي طبيعة دخلك وأقساطها مريحة (شهرية
                        موسمية)</p>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('images/Rectangle 991.png') }}" alt="" >
                        <img src="{{ asset('images/Layer 58.png') }}" alt="" class="two">
                        <span>3</span>
                    </div>
                    <h2 class="name h-2">تراعي طبيعة دخلك</h2>
                    <p class="">تراعي طبيعة دخلك وأقساطها مريحة (شهرية
                        موسمية)</p>
                </div>
            </div>
            <div class="slider-list">
                <ul>
                    <li class="ServicesDot active" onclick="currentservicesSlide(1)">المميزات</li>
                    <li class="ServicesDot" onclick="currentservicesSlide(2)">الشروط</li>
                    <li class="ServicesDot" onclick="currentservicesSlide(3)">الاشتراك</li>
                    <li class="ServicesDot" onclick="currentservicesSlide(4)"> أسئلة شائعة</li>
                </ul>
            </div>
            <div class="slider-wrapper">
                <div class="box  myservicesSlides fade active">
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/Group -9.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h2 class="h-2">مميزات خدمة مشروعي</h2>
                            <p class="f-4">السحب مجاناً عبر شبكة الصرَّافات الآلية الخاصة بـ بنك الكريمي للتمويل الأصغر الإسلامي
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
                            <div class="link">
                                <a >الشروط</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
