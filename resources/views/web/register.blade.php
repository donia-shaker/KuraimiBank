<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-semi-dark" data-assets-path="../../assets/" data-template="vertical-menu-template-semi-dark">

  
<!-- auth-register-basic.html , Sat, 26 Mar 2022 16:52:00 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-semi-dark.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
<link rel="stylesheet" href="../../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css">
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

</head>

<body>


    <!-- Content -->

        <!-- show message -->
        @if (session()->has('success'))
            <div class="alert bg_color message_animation" id="message">
                {{ session()->get('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger message_animation" id="message">
                {{ session()->get('error') }}
            </div>
        @endif
        <!-- End show message -->

        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">

                    <!-- Register Card -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-2 p-4 pb-5 text-center">انشاء حساب  🚀</h4>
                            <form id="formAuthentication" class="mb-3" action="{{ route('save_user') }}"
                                method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">ادخل لاسم</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter your name" autofocus>
                                    @error('name')
                                        <span class="help-block text-danger">* {{ $message }} </span>
                                    @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                    </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">ادخل الايميل</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Enter your email">
                                            @error('email')
                                                <span class="help-block text-danger">* {{ $message }} </span>
                                            @enderror
                                            <div class="col-md-12 mb-2 my-2 m-auto">
                                            </div>
                                            <div class="mb-3 form-password-toggle">
                                                <label class="form-label" for="password">ادخل كلمة المرور</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" class="form-control"
                                                        name="password"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                        aria-describedby="password" />
                                                    <span class="input-group-text cursor-pointer"><i
                                                            class="bx bx-hide"></i></span>
                                                    @error('password')
                                                        <span class="help-block text-danger">* {{ $message }} </span>
                                                    @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                                    </div>
                                                </div>
                                                <div class="mb-3 form-password-toggle">
                                                    <label class="form-label" for="password">قم بتاكيد كلمة المرور</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="password" id="confirmPass" class="form-control"
                                                            name="confirmPass"
                                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                            aria-describedby="confirm password" />
                                                        <span class="input-group-text cursor-pointer"><i
                                                                class="bx bx-hide"></i></span>
                                                    </div>
                                                    @error('confirmPass')
                                                        <span class="help-block text-danger">* {{ $message }} </span>
                                                    @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary d-grid w-100">
                                                        انشاء حساب
                                                    </button>
                            </form>

                            <p class="text-center">
                                <span>لديك حساب بالفعل؟</span>
                                <a href="{{ route('login') }}">
                                    <span>تسجيل الدخول</span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- Register Card -->
                </div>
            </div>
        </div>

        <!-- / Content -->
        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../../assets/vendor/libs/popper/popper.js"></script>
        <script src="../../assets/vendor/js/bootstrap.js"></script>
        <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
        <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
        <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>

        <script src="../../assets/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
        <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
        <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

        <!-- Main JS -->
        <script src="../../assets/js/main.js"></script>

        <!-- Page JS -->
        <script src="../../assets/js/pages-auth.js"></script>

</body>


<!-- auth-register-basic.html , Sat, 26 Mar 2022 16:52:00 GMT -->

</html>
