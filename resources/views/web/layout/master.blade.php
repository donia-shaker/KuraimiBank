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
    <link rel="stylesheet" href="{{ asset('scss/header&footer/header&footer.css') }}" />
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
                    <li><a href="{{ route('contact_page') }}"><i class="fa-solid fa-phone"></i>@lang('content.contact_us')</a>
                    </li>
                </ul>
            </div>
            <div class="logo">
                <div class="top">
                    <div class="icon"><img src="{{ asset('images/logok.svg') }}" alt=""></div>
                </div>
            </div>
            <div>
                <ul class="left-list">
                    <li class="points"><a href="{{route('location_page')}}"><i class="fa-solid fa-location-dot"></i>@lang('content.point_services')</a>
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
                <li><a href="{{ route('home') }}">@lang('content.home')</a></li>
                <li><a>@lang('content.about_us')</a>
                    <div class="info">
                        <h2 class="h-2">@lang('content.about_us')</h2>
                        <div class="list">
                            <h3 class="h-3">???? ??????</h3>
                            <ol>
                                <li><a href="{{ route('about_us') }}">???? ?????? </a></li>
                                <li><a href="{{ route('about_us') }}">?????????? ???????????????? </a></li>
                                <li><a href="{{ route('about_us') }}">???????? ???????????????????????? </a></li>
                            </ol>
                        </div>
                        <div class="list">
                            <h3 class="h-3"> ???????? ????????????</h3>
                            <ol>
                                <li><a href="{{ route('managers') }}">???????????? ????????????????
                                    </a></li>
                                <li><a href="{{ route('managers') }}">???????? ??????????????
                                    </a></li>
                            </ol>
                        </div>
                    </div>
                </li>
                @foreach ($main_categories as $main_category)
                    <li>
                        <a>
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
                                                    <li><a href="{{route('services_page',$service->id)}}">{{ $service->name }}</a></li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </div>
                                @else
                                    <div class="list">
                                        <h3></h3>
                                        <ol>
                                            @foreach ($services as $service)
                                                @if ($service->category_id == $main_category->id)
                                                    <li><a href="{{route('services_page',$service->id)}}">{{ $service->name }}</a></li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        {{-- <div class="list">
                            <h3 class="h-3">???? ??????</h3>
                            <ol>
                                <li><a href="">???? ?????? </a></li>
                                <li><a href="">?????????? ???????????????? </a></li>
                            </ol>
                        </div>
    </div> --}}
                    </li>
                @endforeach
                {{-- <li><a href="">???? ??????????</a>
                        <div class="info">
                            <h2 class="h-2">???? ??????????</h2>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                    <li><a href="">???????? ???????????????????????? </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li><a href="">?????????? ??????????????</a>
                        <div class="info">
                            <h2 class="h-2">???? ??????????</h2>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                    <li><a href="">???????? ???????????????????????? </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li><a href="">?????????? ????????????</a>
                        <div class="info">
                            <h2 class="h-2">???? ??????????</h2>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                    <li><a href="">???????? ???????????????????????? </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li><a href="">?????????? ????????????</a>
                        <div class="info">
                            <h2 class="h-2">???? ??????????</h2>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                    <li><a href="">???????? ???????????????????????? </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li><a href="">???? ????????</a>
                        <div class="info">
                            <h2 class="h-2">???? ??????????</h2>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                    <li><a href="">???????? ???????????????????????? </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li><a href=""> ??????????????</a>
                        <div class="info">
                            <h2 class="h-2">???? ??????????</h2>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                    <li><a href="">???????? ???????????????????????? </a></li>
                                </ol>
                            </div>
                            <div class="list">
                                <h3 class="h-3">???? ??????</h3>
                                <ol>
                                    <li><a href="">???? ?????? </a></li>
                                    <li><a href="">?????????? ???????????????? </a></li>
                                </ol>
                            </div>
                        </div>
                    </li> --}}
                <li><a href="{{route('home')}}">@lang('content.bank_app')</a>
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
            <li class="first">??????????
                <ul>
                    <li><a href="{{route('about_us')}}">???? ??????????</a></li>
                    <li><a href="{{route('about_us')}}">????????????</a></li>
                    <li><a href="{{route('about_us')}}">??????????????</a></li>
                    <li><a href="{{route('about_us')}}">?????????????? </a></li>
                    <li><a href="{{route('about_us')}}">?????????? ????????????????</a></li>
                    <li><a href="{{route('about_us')}}">???????? ?????????? </a></li>
                    <li><a href="{{route('about_us')}}">???????????? ?????? </a></li>
                    <li><a href="{{route('companies')}}"> ?????????????? </a></li>

                </ul>
            </li>
            <li class="first">??????????????
                <ul>
                    <li><a href="{{route('companies')}}">???????? ????????</a></li>
                    <li><a href="{{route('companies')}}">?????????? ????????</a></li>
                    <li><a href="{{route('companies')}}">???????????? ????????????????</a></li>
                    <li><a href="{{route('companies')}}">?????????? ?????????????? ?????????????? </a></li>
                    <li><a href="{{route('companies')}}"> ?????????????? </a></li>

                </ul>
            </li>
            <li class="first">??????????????
                <ul>
                    @foreach ($main_categories as $main_category)
                        <li><a>
                                @if (app()->getLocale() != 'en')
                                    {{ $main_category->name->ar }}
                                @else
                                    {{ $main_category->name->en }}
                                @endif
                            </a></li>
                        {{-- <li><a href="">?????????? ??????????????</a></li>
                    <li><a href="">?????????? ????????????</a></li>
                    <li><a href="">???? ???????? </a></li>
                    <li><a href="{{route('services')}}"> ?????????????? </a></li> --}}
                    @endforeach
                </ul>
            </li>
            <li class="first">????????????????
                <ul>
                    <li><a href="{{route('reports_page')}}">???????????????? ??????????????</a></li>
                    <li><a href="{{route('reports_page')}}">?????????????? ??????????????</a></li>

                </ul>
            </li>
            <li class="first">???????? ????????????
                <ul>
                    <li><a href="{{route('location_page')}}"> ???????????????? ??????????????</a></li>
                </ul>
            </li>
            <li class="first">?????????? ????????
                <ul>
                    <li><a > 967 1 503888 : ??</a></li>
                    <li><a > 967 1 435400 : ??</a></li>
                    <li><a >967 1 435400 : ??</a></li>
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
                <a ><img src="{{ asset('images/google_play_white.png') }}" alt=""></a>
                <a ><img src="{{ asset('images/google_play_white.png') }}" alt=""></a>
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
