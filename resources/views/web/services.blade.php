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
                        <img src="{{ asset('images/Layer 58.png') }}" alt="" class="two" data-number='1'>
                    </div>
                    <h2 class="name h-2">تراعي طبيعة دخلك</h2>
                    <p class="">تراعي طبيعة دخلك وأقساطها مريحة (شهرية
                        موسمية)</p>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('images/Rectangle 991.png') }}" alt="">
                        <img src="{{ asset('images/Layer 58.png') }}" alt="" class="two" data-number='2'>
                    </div>
                    <h2 class="name h-2">تراعي طبيعة دخلك</h2>
                    <p class="'">تراعي طبيعة دخلك وأقساطها مريحة (شهرية
                        موسمية)</p>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('images/Rectangle 991.png') }}" alt="">
                        <img src="{{ asset('images/Layer 58.png') }}" alt="" class="two" data-number='3'>
                    </div>
                    <h2 class="name h-2">تراعي طبيعة دخلك</h2>
                    <p class="">تراعي طبيعة دخلك وأقساطها مريحة (شهرية
                        موسمية)</p>
                </div>
            </div>

        </div>
    </section>
@endsection
