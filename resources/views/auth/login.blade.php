<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dealcome || Sign In</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/logo/logo.png')}}">

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
    <link rel="stylesheet" href="{{asset('frontend/assets/dealcom/css/dealcom-login.rtl.css')}}">


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
                        <p>هل انت مستخدم جديد؟</p>
                        <a href="{{route('register')}}" class="axil-btn second-bg-color sign-up-btn">حساب جديد</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6 ">
                <div class="axil-signin-banner bg_image login-bg-image">
                    <h3 class="title text-white">لدينا افضل المنتجات</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">تسجيل الدخول</h3>
                        <p class="b2 mb--55">قم بتسجيل الدخول للاستمرار</p>
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

                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <input type="email" class="form-control" name="email" value="annie@example.com">
                            </div>
                            <div class="form-group">
                                <label>كلمة المرور</label>
                                <input type="password" class="form-control" name="password" value="123456789">
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn second-bg-color submit-btn">تسجيل الدخول</button>
                                <a href="forgot-password.html" class="forgot-btn">هل نسيت كلمة المرور ؟</a>
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


{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
