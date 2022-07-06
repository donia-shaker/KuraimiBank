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
                        <div class="right">
                            <p class="name">بنك الكريمي</p>
                            <span>للتمويل الاصغر الاسلامي</span>
                        </div>
                        <div class="icon"><img src="{{ asset('images/logo.svg') }}" alt=""></div>
                        <div class="left">
                            <p class="name">بنك الكريمي</p>
                            <span>للتمويل الاصغر الاسلامي</span>
                        </div>
                    </div>
                    <p> دوما معك ... دوما معك</p>
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
                    <li><a href="">الرئيسية</a></li>
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
</body>

</html>
