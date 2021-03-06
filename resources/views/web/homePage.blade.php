@extends('web.layout.master')
@section('css')
<link rel="stylesheet" href="{{ asset('scss/main/main.css') }}" />
<link rel="stylesheet" href="{{ asset('scss/news/news.css') }}" />
@endsection
@section('content')
    {{-- Start Hero Section --}}
    @if (app()->getLocale() != 'en')
        <main dir="rtl">
        @else
            <main dir="ltr">
    @endif
    <div class="container">
        @if (app()->getLocale() != 'en')
            <div class="text" dir="rtl">
            @else
                <div class="text" dir="ltr">
        @endif
        <h1 class="h-1">@lang('content.home_title')</h1>
        <p>@lang('content.home_p')</p>
    </div>
    </div>
    </main>
    {{-- End Hero Section --}}

    {{-- Start Coin Section --}}
    <section class="coin">
        <div class="container shadow">
            <div class="box">
                <div class="col">
                    <p>دولار امريكي</p>
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
                    <p>دولار امريكي</p>
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
                    <p>دولار امريكي</p>
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
    <section class="services ">
        <div class="container">
            <h2 class="h-2">خدمات تهتم بك</h2>
            <ul>
                <li class="ServicesDot active" onclick="currentservicesSlide(1)">البطاقات الإئتمانية</li>
                <li class="ServicesDot" onclick="currentservicesSlide(2)">تمويل الملكة</li>
                <li class="ServicesDot" onclick="currentservicesSlide(3)">حسابات الافراد</li>
                <li class="ServicesDot" onclick="currentservicesSlide(4)">ماكينات الصراف الآلي</li>
                <li class="ServicesDot" onclick="currentservicesSlide(5)">التمويل</li>
            </ul>
        </div>
        <div class="service shadow-inset">
            <div class="container">
                <div class="slider">
                    <div class="slider-wrapper">
                        <div class="box shadow myservicesSlides fade active">
                            <div class="content">
                                <div class="text">
                                    <h3 class="h-3">البطاقات الإئتمانية</h3>
                                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل
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
                        <div class="box shadow myservicesSlides fade">
                            <div class="content">
                                <div class="text">
                                    <h3 class="h-3">تمويل الملكة</h3>
                                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل
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
                        <div class="box shadow myservicesSlides fade">
                            <div class="content">
                                <div class="text">
                                    <h3 class="h-3">حسابات الافراد</h3>
                                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل
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
                        <div class="box shadow myservicesSlides fade">
                            <div class="content">
                                <div class="text">
                                    <h3 class="h-3">ماكينات الصراف الآلي</h3>
                                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل
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
                        <div class="box shadow myservicesSlides fade">
                            <div class="content">
                                <div class="text">
                                    <h3 class="h-3">التمويل</h3>
                                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل
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
                </div>
                <div class="slider-btn">
                    <a class="prev" onclick="prev(-1)">❮</a>
                    <a class="next" onclick="next(1)">❯</a>
                </div>
            </div>
            <div class="design">
                <img src="{{ asset('images/sasa.png') }}" alt="">
            </div>
        </div>
        </div>
    </section>
    {{-- End Services Section --}}

    {{-- Start Application Section --}}
    <section class="app">
        <div id="wave"></div>
        <div class="overflow">
            <div class="container">
                <div class="image">
                    <img src="{{ asset('images/phone .png') }}" alt="">
                </div>
                <div class="content">
                    <h2 class="h-2">تطبيقات البنك</h2>
                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                        مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                    </p>
                    <div class="boxes">
                        <div class="box mySlides shadow main-position">
                            <h3 class="h-3">الكريمي جوال</h3>
                            <ul class="f-4">
                                <li>التحويل بين الحسابات</li>
                                <li>إدارة حساباتك</li>
                                <li>رسال الحوالات</li>
                                <li>الإيداع للحسابات</li>
                                <li>التحويل بين الحسابات</li>
                                <li>سداد فواتير الخدمات</li>
                                <li>
                                    <a href=""><img src="{{ asset('images/google_play.png') }}"
                                            alt=""></a>
                                </li>
                                <li>
                                    <a href=""><img src="{{ asset('images/google_play.png') }}"
                                            alt=""></a>
                                </li>
                            </ul>
                        </div>
                        <div class="box mySlides shadow seconed-position">
                            <h3 class="h-3">الكريمي جوال2</h3>
                            <ul class="f-4">
                                <li>التحويل بين الحسابات</li>
                                <li>إدارة حساباتك</li>
                                <li>رسال الحوالات</li>
                                <li>الإيداع للحسابات</li>
                                <li>التحويل بين الحسابات</li>
                                <li>سداد فواتير الخدمات</li>
                                <li>
                                    <a href=""><img src="{{ asset('images/google_play.png') }}"
                                            alt=""></a>
                                </li>
                                <li>
                                    <a href=""><img src="{{ asset('images/google_play.png') }}"
                                            alt=""></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div>
                        <span class="dot active" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                    </div>
                </div>
            </div>
        </div>

        <div id="wave-two"></div>
    </section>
    {{-- End Application Section --}}

    {{-- Start News Section --}}
<section class="news">
    <img src="{{ asset('images/From selection.png') }}" alt="" class="layer1">
    <x-news></x-news>
    <div class="button"><button class="btn">المزيد</button></div>
    </div>
    <div class="new-wave"></div>
    <div class="layer2">
        <img src="{{ asset('images/aa.png') }}" alt="">
        <img src="{{ asset('images/From selection.png') }}" alt="">
    </div>
</section>
{{-- End News Section --}}

    {{-- Start Number Section --}}
    <section class="number">
        <div class="container">
            <h2 class="h-2">نجاحاتنا في أرقام</h2>
            <div class="boxes">
                <div class="box">
                    <a data-content="+889"><span class="h-2">+ 889</span></a>
                    <p>تمويل عقاري تم تمويلة تمويلا شاملا</p>
                </div>
                <div class="box">
                    <a data-content="+679"><span class="h-2">+ 679</span></a>
                    <p>تمويل عقاري تم تمويلة تمويلا شاملا</p>
                </div>
                <div class="box">
                    <a data-content="+889"><span class="h-2">+ 889</span></a>
                    <p>تمويل عقاري تم تمويلة تمويلا شاملا</p>
                </div>
                <div class="box">
                    <a data-content="+889"><span class="h-2">+ 889</span></a>
                    <p>تمويل عقاري تم تمويلة تمويلا شاملا</p>
                </div>
                <div class="box">
                    <a data-content="+889"><span class="h-2">+ 889</span></a>
                    <p>تمويل عقاري تم تمويلة تمويلا شاملا</p>
                </div>
                <div class="box">
                    <a data-content="+889"><span class="h-2">+ 889</span></a>
                    <p>تمويل عقاري تم تمويلة تمويلا شاملا</p>
                </div>
                <div class="box ">
                    <a data-content="+889"><span class="h-2">+ 889</span></a>
                    <p>تمويل عقاري تم تمويلة تمويلا شاملا</p>
                </div>
                <div class="box">
                    <a data-content="+889"><span class="h-2">+ 889</span></a>
                    <p>تمويل عقاري تم تمويلة تمويلا شاملا</p>
                </div>
            </div>
        </div>
    </section>
    {{-- End Number Section --}}

    {{-- Start Location Section --}}
    <section class="location">
        <div class="layer1">
            <img src="{{ asset('images/From selection.png') }}" alt="">
        </div>
        <div class="container">
            <div class="content">
                <h2 class="h-2">نقاط تواجدنا</h2>
                <div class="boxes">
                    <div class="box">
                        <span>100</span>
                        <p>فرع بنك</p>
                    </div>
                    <div class="box">
                        <span>400</span>
                        <p>صراف آلي</p>
                    </div>
                    <div class="box">
                        <span>100</span>
                        <p>نقطة خدمة</p>
                    </div>
                </div>
                <div class="button"><button class="btn">أقرب نقطة لك</button></div>
            </div>
            <div class="image">
                <img src="{{ asset('images/map.PNG') }}" alt="">
            </div>
        </div>
        <div class="layer2">
            <img src="{{ asset('images/aa.png') }}" alt="">
        </div>
    </section>
    {{-- End Location Section --}}
@endsection
@section('javascript')
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="{{ asset('js/news_slider.js') }}"></script>
@endsection
