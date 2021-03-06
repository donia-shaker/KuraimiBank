@extends('web.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('scss/services/services.css') }}" />
@endsection
@section('content')
    <main>
        <div class="container">
            @foreach ($service as $service)
                <div class="text">
                    <span>التمويل/{{ $service->name }}</span>
                    <h1 class="h-1">{{ $service->name }}</h1>
                    {!! $service->description !!}
                    <button class="btn-2">طلب الخدمة</button>
                </div>
                <div class="images">
                    <img src="{{ asset('images/'.$service->background_image.'') }}" alt="" class="back">
                    <img src="{{ asset('images/'.$service->image.'') }}" alt="">
                </div>
            @endforeach

        </div>
    </main>

    {{-- Start Adventage Section --}}
    <section class="adventages">
        <div class="container">
            <div class="main-adv">
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('images/Rectangle 991.png') }}" alt="">
                        <img src="{{ asset('images/Layer 58.png') }}" alt="" class="two">
                        <span>1</span>
                    </div>
                    <h2 class="name h-2">تراعي طبيعة دخلك</h2>
                    <p class="">تراعي طبيعة دخلك وأقساطها مريحة (شهرية
                        موسمية)</p>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('images/Rectangle 991.png') }}" alt="">
                        <img src="{{ asset('images/Layer 58.png') }}" alt="" class="two">
                        <span>2</span>
                    </div>
                    <h2 class="name h-2">تراعي طبيعة دخلك</h2>
                    <p class="'">تراعي طبيعة دخلك وأقساطها مريحة (شهرية
                        موسمية)</p>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('images/Rectangle 991.png') }}" alt="">
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
                    <li class="dot active" onclick="currentSlide(1)">المميزات</li>
                    <li class="dot" onclick="currentSlide(2)">الشروط</li>
                    <li class="dot" onclick="currentSlide(3)">الاشتراك</li>
                    <li class="dot" onclick="currentSlide(4)"> أسئلة شائعة</li>
                </ul>
            </div>
            {{-- @foreach ($service as $service) --}}
            <div class="slider-wrapper">
                <div class="box  mySlides fade active">
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/Group -9.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h2 class="h-2"> مميزات خدمة {{ $service->name }}</h2>
                            {!!$service->other_adventage!!}
                            <div class="link">
                                <a onclick="currentSlide(2)">الشروط</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="box  mySlides fade active">
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/Group -9.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h2 class="h-2">شروط خدمة {{$service->name}}</h2>
                            {!! $service->service_conditions !!}
                            <div class="link">
                                <a onclick="currentSlide(3)">الاشتراك</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="box  mySlides fade active">
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/Group -9.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h2 class="h-2"> الاشتراك في خدمة {{$service->name}}</h2>
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
                            <div class="link">
                                <a onclick="currentSlide(4)">اسئلة شائعه</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="box  mySlides fade active">
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/Group -9.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h2 class="h-2">اسئلة شائعه على خدمة {{$service->name}}</h2>
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
                            <div class="link">
                                <a onclick="currentSlide(1)">المميزات</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
            

        </div>
    </section>
    {{-- End Aventages Section --}}

    {{-- Start Text Section --}}
    <section class="text">
        <div class="container">
            <p class="one">بطاقة الصراف الآلي تُبقي خدماتنا</p>
            <p>المصرفية في متناول يد <span>7/24</span> ك بلا انقطاع</p>
        </div>
    </section>
    {{-- End Text Section --}}

    {{-- Start Success Section --}}
    <section class="success">
        <div class="container">
            <h2 class="h-2">قصص النجاح </h2>
            <div class="slider-wrapper">
                <div class="box story-slides fade">
                    <div class="text">
                        <h3 class="h-3">
                            مولت مشروعي
                        </h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                        </p>
                        <a href="{{ route('success_story') }}">قراءة المزيد</a>
                    </div>
                </div>
                <div class="box story-slides fade">
                    <div class="text">
                        <h3 class="h-3">
                            استلمت حوالتي نص الليل
                        </h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                        </p>
                        <a href="{{ route('success_story') }}">قراءة المزيد</a>
                    </div>
                </div>
                <div class="box story-slides fade">
                    <div class="text">
                        <h3 class="h-3">
                            خدمة سريعه
                        </h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                        </p>
                        <a href="{{ route('success_story') }}">قراءة المزيد</a>
                    </div>
                </div>
                <div class="box story-slides fade">
                    <div class="text">
                        <h3 class="h-3">
                            الاكثر ثقة
                        </h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                        </p>
                        <a href="{{ route('success_story') }}">قراءة المزيد</a>
                    </div>
                </div>
            </div>
            <div class="btn-success">
                <span class="btn next" onclick="plusStorySlides(-1)"><i class="fa-solid fa-chevron-right"></i></span>
                <span class="btn prev" onclick="plusStorySlides(1)"><i class="fa-solid fa-chevron-left"></i></span>
            </div>
        </div>
    </section>
    {{-- End Success Section --}}

    {{-- Start Other service Section --}}
    <section class="other">
        <h2 class="h-2">
            خدمات أخرى قد تهمك
        </h2>
        <div class="bg">
            <img src="{{ asset('images/bg-other.png') }}" alt="">
        </div>
        <div class="slides-wrapper" id="slides-wrapper">
            <div class="box">
                <img src="{{ asset('images/other-1.png') }}" alt="">
                <h3 class="h-3">
                    ماكينات الصراف الآلي
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/other-2.png') }}" alt="">
                <h3 class="h-3">
                    تمويل مشروعي
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/other-1.png') }}" alt="">
                <h3 class="h-3">
                    ماكينات الصراف الآلي
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/other-2.png') }}" alt="">
                <h3 class="h-3">
                    تمويل مشروعي
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/other-1.png') }}" alt="">
                <h3 class="h-3">
                    ماكينات الصراف الآلي
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/other-2.png') }}" alt="">
                <h3 class="h-3">
                    تمويل مشروعي
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/other-1.png') }}" alt="">
                <h3 class="h-3">
                    ماكينات الصراف الآلي
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/other-2.png') }}" alt="">
                <h3 class="h-3">
                    تمويل مشروعي
                </h3>
            </div>
        </div>
        <div class="btn-other">
            <span class="other-btn next" onclick="servPrev(-1)"><i class="fa-solid fa-chevron-right"></i></span>
            <span class="other-btn prev" onclick="servNext(1)"><i class="fa-solid fa-chevron-left"></i></span>
        </div>
    </section>
    {{-- End Other service Section --}}
@endsection
@section('javascript')
    <script src="{{ asset('js/servicePage.js') }}"></script>
    <script src="{{ asset('js/successStory.js') }}"></script>
    <script src="{{ asset('js/another_serv.js') }}"></script>
@endsection
