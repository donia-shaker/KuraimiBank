@extends('web.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('scss/reports/reports.css') }}" />
@endsection
@section('content')
    <main>
        <div class="overlay"></div>
        <div class="container">
            <div class="text">
                <span>رئيسية/شركائنا</span>
            </div>
        </div>
    </main>

    {{-- Start Report Section --}}
    <section class="reports">
        <div class="container">
            <div class="main">
                <h2 class="h-2">التقارير المالية</h2>
                <div class="all-reports">
                    <a href="">
                    <div class="content">
                        <div class="box">
                            <p class="befor"> التقارير المالي <span>2018</span></p>
                            <p class="hover">استعراض
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                            </p>
                            <div class="pdf">
                                <h3 class="h-3">2018</h3>
                                <p class="text"> التقارير المالية لسنة <span>2018</span></p>

                            </div>
                        </div>
                    </div>
                </a>

                <a href="">
                    <div class="content">
                        <div class="box">
                            <p class="befor"> التقارير المالي <span>2018</span></p>
                            <p class="hover">استعراض
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                            </p>
                            <div class="pdf">
                                <h3 class="h-3">2018</h3>
                                <p class="text"> التقارير المالية لسنة <span>2018</span></p>

                            </div>
                        </div>
                    </div>
                </a>

                <a href="">
                    <div class="content">
                        <div class="box">
                            <p class="befor"> التقارير المالي <span>2018</span></p>
                            <p class="hover">استعراض
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                            </p>
                            <div class="pdf">
                                <h3 class="h-3">2018</h3>
                                <p class="text"> التقارير المالية لسنة <span>2018</span></p>

                            </div>
                        </div>
                    </div>
                </a>
                    
                <a href="">
                    <div class="content">
                        <div class="box">
                            <p class="befor"> التقارير المالي <span>2018</span></p>
                            <p class="hover">استعراض
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                            </p>
                            <div class="pdf">
                                <h3 class="h-3">2018</h3>
                                <p class="text"> التقارير المالية لسنة <span>2018</span></p>

                            </div>
                        </div>
                    </div>
                </a>

                <a href="">
                    <div class="content">
                        <div class="box">
                            <p class="befor"> التقارير المالي <span>2018</span></p>
                            <p class="hover">استعراض
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                            </p>
                            <div class="pdf">
                                <h3 class="h-3">2018</h3>
                                <p class="text"> التقارير المالية لسنة <span>2018</span></p>

                            </div>
                        </div>
                    </div>
                </a>

                <a href="">
                    <div class="content">
                        <div class="box">
                            <p class="befor"> التقارير المالي <span>2018</span></p>
                            <p class="hover">استعراض
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                                <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                        class="fa-solid fa-chevron-left"></i></span>
                            </p>
                            <div class="pdf">
                                <h3 class="h-3">2018</h3>
                                <p class="text"> التقارير المالية لسنة <span>2018</span></p>

                            </div>
                        </div>
                    </div>
                </a>

                </div>
            </div>
        </div>
    </section>
    {{-- End Report Section --}}

    {{-- Start Social --}}
    <x-social></x-social>
    {{-- End Social --}}
@endsection
@section('javascript')
@endsection
