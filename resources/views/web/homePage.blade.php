@extends('web.layout.master')
@section('content')
    {{-- Start Hero Section --}}
    <main>
        <div class="container">
            <div class="text">
                <h1>حساب في كل بيت يمني</h1>
                <p>يسهم في التنمية الاقتصادية والاجتماعية</p>
            </div>
        </div>
    </main>
    {{-- End Hero Section --}}

    {{-- Start Coin Section --}}
    <section class="coin">
        <div class="container">
            <div class="box">
                <div class="col">
                    <p>دوالار امريكي</p>
                    <span><i class="fa-solid fa-map"></i></span>
                </div>
                <div class="col">
                    <span>بيع</span>
                    <span class="up">600</span>
                </div>
                <div class="col">
                    <span>شراء</span>
                    <span class="down">550</span>
                </div>
            </div>
            <div class="box">
                <div class="col">
                    <p>دوالار امريكي</p>
                    <span><i class="fa-solid fa-map"></i></span>
                </div>
                <div class="col">
                    <span>بيع</span>
                    <span class="up">600</span>
                </div>
                <div class="col">
                    <span>شراء</span>
                    <span class="down">550</span>
                </div>
            </div>
            <div class="box">
                <div class="col">
                    <p>دوالار امريكي</p>
                    <span><i class="fa-solid fa-map"></i></span>
                </div>
                <div class="col">
                    <span>بيع</span>
                    <span class="up">600</span>
                </div>
                <div class="col">
                    <span>شراء</span>
                    <span class="down">550</span>
                </div>
            </div>
            <div class="button">
                <a href="#"><button class="btn">تحويل العملات</button></a>
            </div>
        </div>
    </section>
    {{-- End Coin Section --}}

    {{-- Start Services Section --}}
    <section class="services">
        <div class="container">
            <h2 class="h-2">خدمات تهتم بك</h2>
            <ul>
                <li><a href="">البطاقات الإئتمانية</a></li>
                <li><a href="">تمويل الملكة</a></li>
                <li><a href="">حسابات الافراد</a></li>
                <li class="active"><a href="">ماكينات الصراف الآلي</a></li>
                <li><a href="">التمويل</a></li>
            </ul>
        </div>
        <div class="service">
            <div class="container">
                <div class="box ">
                    <div class="content">
                        <div class="text">
                            <h3>ماكينات الصراف الآلي</h3>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل
                                في نفس المساحة، لقد تم توليد هذا
                                النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في
                                نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                                مثال لنص يمكن أن يستبدهذا النص هو مثال لنص يمكن أن يستبدل
                                في نفس المساحة، لقد تم توليد هذا
                                النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في
                                نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                                مثال لنص يمكن أن يستبد
                            </p>
                        </div>
                        <div class="button">
                            <button class="btn">المزيد</button>
                        </div>
                    </div>
                    <div class="image">
                        <img src="{{ asset('images/Al-_Kurimi_1 f.png') }}" alt="">
                        <img src="{{ asset('images/Layer 61.png') }}" alt="">
                        <img src="{{ asset('images/Layer 71.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="design">
                <img src="{{asset('images/sasa.png')}}" alt="">
            </div>
        </div>
        </div>
    </section>
    {{-- End Services Section --}}

    {{-- Start Application Section --}}
    <section class="app">
        <div class="container">
            <div class="image">
                <img src="{{asset('images/phone.png')}}" alt="">
            </div>
            <div class="content">
                <h2 class="h-2">تطبيقات البنك</h2>
                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                    مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                </p>
                <div class="boxes">
                    <div class="box">
                        <h3 class="h-3">الكريمي جوال</h3>
                        <ul>
                            <li>التحويل بين الحسابات</li>
                            <li>إدارة حساباتك</li>
                            <li>رسال الحوالات</li>
                            <li>الإيداع للحسابات</li>
                            <li>التحويل بين الحسابات</li>
                            <li>سداد فواتير الخدمات</li>
                        </ul>
                        <div class="download">
                            <a href=""><img src="{{asset('images/google_play.png')}}" alt=""></a>
                            <a href=""><img src="{{asset('images/google_play.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Application Section --}}
@endsection
