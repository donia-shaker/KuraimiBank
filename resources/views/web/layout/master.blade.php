<!DOCTYPE html>
@if (app()->getLocale() != 'en')
    <html lang="ar" dir="rtl">
@else
    <html lang="en" dir='ltr'>
@endif
{{-- <html lang="en" dir="rtl"> --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuraimi Bank</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <!-- CSS Normalized -->
    <link rel="stylesheet" href="{{ asset('css/normalized.css') }}" />
    <!-- CSS File -->
    <link rel="stylesheet" href="{{ asset('scss/header&footer.css') }}" />
    @yield('css')
    <!-- Open  Font -->
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}" />
    <link rel="preload" href="HacenTunisia.woff2" as="font" type="font/woff2" crossorigin>


</head>
@if (app()->getLocale() != 'en')

    <body dir="rtl">
    @else

        <body dir="ltr">
@endif
{{-- start Header Section --}}
<header>
    <div class="container ">
        <div class="content">
            <div>
                <div class="minu" id="minu" onclick="showNav()">
                    <span></span>
                    <span></span>
                </div>
                <ul class="right-list">
                    <li class="job"><a href=""><i class="fa-solid fa-user"></i>@lang('content.jobs')</a></li>
                    <li><a href=""><i class="fa-solid fa-phone"></i>@lang('content.contact_us')</a></li>
                </ul>
            </div>
            <div class="logo">
                <div class="top">
                    <div class="icon"><img src="{{ asset('images/logok.svg') }}" alt=""></div>
                </div>
            </div>
            <div>
                <ul class="left-list">
                    <li class="points"><a href=""><i class="fa-solid fa-location-dot"></i>@lang('content.point_services')</a>
                    </li>
                    <li><a href=""><i class="fa-solid fa-search"></i></a>
                        @if (app()->getLocale() != 'en')
                            <a rel="alternate" hreflang="en" class="lang"
                                href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                EN
                            </a>
                        @else
                            <a rel="alternate" hreflang="ar" class="lang"
                                href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                AR
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        {{-- Start Nav Section --}}
        <nav>
            <ul class="main-list " id="main-list">
                <li><a href="">@lang('content.home')</a></li>
                <li><a href="">@lang('content.about_us')</a>
                    <div class="info">
                        <h2 class="h-2">@lang('content.about_us')</h2>
                        <div class="list">
                            <h3 class="h-3">من نحن</h3>
                            <ol>
                                <li><a href="">من نحن </a></li>
                                <li><a href="">القيم والمبادئ </a></li>
                                <li><a href="">بيان الاستراتيجية </a></li>
                            </ol>
                        </div>
                        <div class="list">
                            <h3 class="h-3">من نحن</h3>
                            <ol>
                                <li><a href="">من نحن </a></li>
                                <li><a href="">القيم والمبادئ </a></li>
                            </ol>
                        </div>
                    </div>
                </li>
                @foreach ($main_categories as $main_category)
                    <li>
                        <a href="">
                            @if (app()->getLocale() != 'en')
                                {{ $main_category->name->ar }}
                            @else
                                {{ $main_category->name->en }}
                            @endif
                        </a>
                        <div class="info">
                            <h2 class="h-2">
                                @if (app()->getLocale() != 'en')
                                    {{ $main_category->name->ar }}
                                @else
                                    {{ $main_category->name->en }}
                                @endif
                            </h2>
                            @foreach ($all_categories as $sub_category)
                                @if ($sub_category->parentId == $main_category->id)
                                    <div class="list">
                                        <h3 class="h-3">
                                            @if (app()->getLocale() != 'en')
                                                {{ $sub_category->name->ar }}
                                            @else
                                                {{ $sub_category->name->en }}
                                            @endif
                                        </h3>
                                        <ol>
                                            @foreach ($services as $service)
                                                @if ($service->category_id == $sub_category->id)
                                                    <li><a href="">{{ $service->name }}</a></li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        {{-- <div class="list">
                            <h3 class="h-3">من نحن</h3>
                            <ol>
                                <li><a href="">من نحن </a></li>
                                <li><a href="">القيم والمبادئ </a></li>
                            </ol>
                        </div>
    </div> --}}
                    </li>
                @endforeach
                {{-- <li><a href="">عن البنك</a>
                        <div class="info">
                            <h2 class="h-2">عن البنك</h2>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                    <li><a href="">بيان الاستراتيجية </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li><a href="">خدمات الافراد</a>
                        <div class="info">
                            <h2 class="h-2">عن البنك</h2>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                    <li><a href="">بيان الاستراتيجية </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li><a href="">خدمات الشركة</a>
                        <div class="info">
                            <h2 class="h-2">عن البنك</h2>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                    <li><a href="">بيان الاستراتيجية </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li><a href="">كريمي اكسبرس</a>
                        <div class="info">
                            <h2 class="h-2">عن البنك</h2>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                    <li><a href="">بيان الاستراتيجية </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li><a href="">أم فلوس</a>
                        <div class="info">
                            <h2 class="h-2">عن البنك</h2>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                    <li><a href="">بيان الاستراتيجية </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li><a href=""> التمويل</a>
                        <div class="info">
                            <h2 class="h-2">عن البنك</h2>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                    <li><a href="">بيان الاستراتيجية </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">من نحن</h3>
                                <ol>
                                    <li><a href="">من نحن </a></li>
                                    <li><a href="">القيم والمبادئ </a></li>
                                </ol>
                            </div>
                        </div>
                    </li> --}}
                <li><a href="">@lang('content.bank_app')</a>
                    <div class="info">
                        <h2 class="h-2">@lang('content.bank_app')</h2>
                        <div class="list">
                            <h3 class="h-3">من نحن</h3>
                            <ol>
                                <li><a href="">من نحن </a></li>
                                <li><a href="">القيم والمبادئ </a></li>
                                <li><a href="">بيان الاستراتيجية </a></li>
                            </ol>
                        </div>
                        <div class="list">
                            <h3 class="h-3">من نحن</h3>
                            <ol>
                                <li><a href="">من نحن </a></li>
                                <li><a href="">القيم والمبادئ </a></li>
                            </ol>
                        </div>
                    </div>
                </li>
            </ul>

        </nav>
        {{-- End Nav Section --}}
    </div>
</header>
{{-- End Header Section --}}
@yield('content')

{{-- Start Footer --}}
<footer>
    <div class="layer1"><img src="{{ asset('images/Layer 118.png') }}" alt=""></div>
    <div class="container">
        <div class="image">
            <img src="{{ asset('images/logok.svg') }}" alt="">
        </div>
        <ul class="main">
            <li class="first">البنك
                <ul>
                    <li><a href="">عن البنك</a></li>
                    <li><a href="">الرؤية</a></li>
                    <li><a href="">الرسالة</a></li>
                    <li><a href="">الأهداف </a></li>
                    <li><a href="">القيم والمبادئ</a></li>
                    <li><a href="">بيان سياسة </a></li>
                    <li><a href="">مكافحة غسل </a></li>
                    <li><a href=""> شركائنا </a></li>

                </ul>
            </li>
            <li class="first">شركائنا
                <ul>
                    <li><a href="">موني جرام</a></li>
                    <li><a href="">ماستر كارد</a></li>
                    <li><a href="">البنوك المراسلة</a></li>
                    <li><a href="">منظمة التمويل الدولية </a></li>
                    <li><a href=""> تيمينوس </a></li>

                </ul>
            </li>
            <li class="first">الخدمات
                <ul>
                    <li><a href="">خدمات الأفراد</a></li>
                    <li><a href="">خدمات الشركات</a></li>
                    <li><a href="">كريمي اكسبرس</a></li>
                    <li><a href="">ام فلوس </a></li>
                    <li><a href=""> التمويل </a></li>

                </ul>
            </li>
            <li class="first">التقارير
                <ul>
                    <li><a href="">التقارير المالية</a></li>
                    <li><a href="">القوائم المالية</a></li>

                </ul>
            </li>
            <li class="first">نقاط الخدمة
                <ul>
                    <li><a href=""> وماكينات الصرافة</a></li>
                </ul>
            </li>
            <li class="first">تواصل معنا
                <ul>
                    <li><a href=""> 967 1 503888 : ت</a></li>
                    <li><a href=""> 967 1 435400 : ف</a></li>
                    <li><a href="">967 1 435400 : ف</a></li>
                </ul>
            </li>
        </ul>
        <div class="links">
            <div class="social">
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
            </div>
            <div class="google-play">
                <a href=""><img src="{{ asset('images/google_play_white.png') }}" alt=""></a>
                <a href=""><img src="{{ asset('images/google_play_white.png') }}" alt=""></a>
            </div>
        </div>
        <div class="copy-right">
            <span>kuraimibank</span> 2022 &copy;
        </div>
    </div>
    <div class="layer2"><img src="{{ asset('images/Layer 118.png') }}" alt=""></div>
</footer>
{{-- End Footer --}}
@yield('javascript')
<script src="{{ asset('js/header&footer.js') }}"></script>

</body>

</html>
