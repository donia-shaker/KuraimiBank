@extends('web.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('scss/location/location.css') }}" />
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="text">
                <h1 class="h-1">الفروع وماكينات الصرافة</h1>
                <p>خدماتنا قريبة منك ومتاحة في أكثر من
                    ٦٠٠ نقطة حول الجمهورية اليمنية</p>
            </div>
            <div class="images">
                <img src="{{ asset('images/Al-_Kurimi_3 f2.png') }}" alt="" class="back">
                <img src="{{ asset('images/Al-_Kurimi_3 5 f.png') }}" alt="">
            </div>
        </div>
    </main>

    {{-- Start search Section --}}
    <section class="search">
        <div class="container">
            <div class="main ">
                <div class="form">
                    <form action="">
                        <div class="input_group">
                            <label for="country">الدولة</label>
                            <select name="" id="country">
                                <option value="yemen">اليمن</option>
                            </select>
                        </div>

                        <div class="input_group">
                            <label for="city">المدينة</label>
                            <select name="" id="city">
                                <option value="sanaa">صنعاء</option>
                            </select>
                        </div>

                        <div class="input_group">
                            <label for="type">نوع الموقع
                            </label>
                            <select name="" id="type">
                                <option value="">فرع</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-3">تنفيذ الطلب</button>
                    </form>
                </div>
                <h2 class="h-2">الفروع وصراف الي في اليمن - صنعاء
                </h2>
            </div>
            <div class="location">
                <div class="box">
                    <div class="info">
                        <h3 class="name">شارع الاصبحي
                        </h3>
                        <img src="{{asset('images/map3.PNG')}}" alt="">
                    </div>
                    <p>شارع الاصبحي _ جوار معهد البريطاني
                    </p>
                    <p>اليمن صنعاء
                    </p>
                    <p>777 777 777
                    </p>
                </div>
                <div class="box">
                    <div class="info">
                        <h3 class="name">شارع الاصبحي
                        </h3>
                        <img src="{{asset('images/map3.PNG')}}" alt="">
                    </div>
                    <p>شارع الاصبحي _ جوار معهد البريطاني
                    </p>
                    <p>اليمن صنعاء
                    </p>
                    <p>777 777 777
                    </p>
                </div>
                <div class="box">
                    <div class="info">
                        <h3 class="name">شارع الاصبحي
                        </h3>
                        <img src="{{asset('images/map3.PNG')}}" alt="">
                    </div>
                    <p>شارع الاصبحي _ جوار معهد البريطاني
                    </p>
                    <p>اليمن صنعاء
                    </p>
                    <p>777 777 777
                    </p>
                </div>

                <div class="box">
                    <div class="info">
                        <h3 class="name">شارع الاصبحي
                        </h3>
                        <img src="{{asset('images/map3.PNG')}}" alt="">
                    </div>
                    <p>شارع الاصبحي _ جوار معهد البريطاني
                    </p>
                    <p>اليمن صنعاء
                    </p>
                    <p>777 777 777
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- End search Section --}}
@endsection
@section('javascript')
@endsection
