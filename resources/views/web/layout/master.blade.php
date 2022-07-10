<!DOCTYPE html>
<html lang="en" dir="rtl">

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
    <link rel="stylesheet" href="{{ asset('scss/main.css') }}" />
    <!-- Open Sans Font -->
</head>

<body>
    {{-- start Header Section --}}
    <header>
        <div class="container ">
            <div class="content">
                <div>
                    <ul class="right-list">
                        <li><a href=""><i class="fa-solid fa-user"></i>الوظائف</a></li>
                        <li><a href=""><i class="fa-solid fa-phone"></i>تواصل معنا</a></li>
                    </ul>
                </div>
                <div class="logo">
                    <div class="top">
                        <div class="icon"><img src="{{ asset('images/logok.svg') }}" alt="" ></div>
                    </div>
                </div>
                <div>
                    <ul class="left-list">
                        <li><a href=""><i class="fa-solid fa-location-dot"></i>نقاط الخدمة</a></li>
                        <li><a href=""><i class="fa-solid fa-search"></i></a><a href=""> EN</a></li>
                    </ul>
                </div>
            </div>
            {{-- Start Nav Section --}}
            <nav>
                <ul>
                    <li><a href="">الرئيسية</a>
                    <li><a href="">عن البنك</a></li>
                    <li><a href="">خدمات الافراد</a></li>
                    <li><a href="">خدمات الشركة</a></li>
                    <li><a href="">كريمي اكسبرس</a></li>
                    <li><a href="">أم فلوس</a></li>
                    <li><a href=""> التمويل</a></li>
                    <li><a href=""> تطبيقات البنك</a></li>
                </ul>
            </nav>
            {{-- End Nav Section --}}
        </div>
    </header>
    {{-- End Header Section --}}
    @yield('content')

    {{-- Start Footer --}}
    <footer>
        <div class="container">
            <div class="image">
                <img src="{{asset('images/logok.svg')}}" alt="">
            </div>
            <ul class="main">
                <li class="first" >البنك
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
                <li class="first" >شركائنا
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
                <li class="first" >التقارير
                    <ul>
                        <li><a href="">التقارير المالية</a></li>
                        <li><a href="">القوائم المالية</a></li>

                    </ul>
                </li>
                <li class="first" >نقاط الخدمة
                    <ul>
                        <li><a href=""> وماكينات الصرافة</a></li>
                    </ul>
                </li>
                <li class="first" >تواصل معنا
                    <ul>
                        <li><a href=""> 967 1 503888 : ت</a></li>
                        <li><a href=""> 967 1 435400 : ف</a></li>
                        <li><a href="">967 1 435400 : ف</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </footer>
    {{-- End Footer --}}
    @yield('javascript')

</body>

</html>
