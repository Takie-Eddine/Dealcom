{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dealcome || Sign up</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/logo/Asset 3.png')}}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/sal.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/base.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/dealcom/css/dealcome-signup.rtl.css')}}">


</head>


<body>
    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="{{route('index')}}" class="site-logo"><img src="{{asset('frontend/assets/dealcom/images/logos/logo-light.png')}}"
                            alt="logo" class="w-75"></a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <p>هل لديك حساب ؟</p>
                        <a href="{{route('login')}}" class="axil-btn second-bg-color sign-up-btn">تسجيل الدخول</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image login-bg-image">
                    <h3 class="title text-white">لدينا افضل المنتجات</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">تسجيل حساب جديد</h3>
                        <p class="b2 mb--55">قم بتسجيل حساب للاستمرار</p>
                        <form class="singin-form">

                            <span class="mb-4 d-block">نوع المستخدم</span>
                            <div class="isotope-button mb-3">
                                <div class="isotope-button filter-button-group mb-3 extra-service-filter w-100">

                                    <button class="extra-service-btn is-checked w-40">
                                        <span class="filter-text">مستورد</span></button>
                                    <button class="extra-service-btn w-40">
                                        <span class="filter-text">مزود خدمه</span></button>

                                </div>

                            </div>

                            <div class="row mb-sm-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم الاول</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم الاخير</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>اسم المستخدم</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>كلمة المرور</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn second-bg-color submit-btn w-100">التالي</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{asset('frontend/assets/js/vendor/modernizr.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('frontend/assets/js/vendor/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('frontend/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/js.cookie.js')}}"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="{{asset('frontend/assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/sal.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/counterup.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/waypoints.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('frontend/assets/js/rtl-main.js')}}"></script>

</body>

</html>
