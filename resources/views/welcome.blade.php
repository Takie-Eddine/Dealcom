<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}" direction="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}" dir="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}" style="direction: {{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{asset('frontend/assets/scss/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/dealcom/css/dealcom-styles.rtl.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>


<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    <header class="header axil-header header-style-5 dealcom-header ">

        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="{{route('index')}}" class="logo logo-dark">
                            <img src="{{asset('frontend/assets/dealcom/images/logos/logo-light.png')}}" class="w-50" alt="Site Logo">
                        </a>
                        <a href="{{route('index')}}" class="logo logo-light">
                            <img src="{{asset('frontend/assets/dealcom/images/logos/logo-dark.png')}}" class="w-50" alt="Site Logo">
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav ">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="{{route('index')}}" class="logo">
                                    <img src="{{asset('frontend/assets/images/logo/logo.png')}}" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu me-5">

                                <li><a class="me-5 active" href="{{route('index')}}">الرئيسية</a></li>
                                <li><a href="contact.html">الفئات</a></li>
                                <li><a href="contact.html">مقالات</a></li>
                                <li><a href="contact.html">حول ديلكوم</a></li>
                                <li><a href="contact.html">تواصل معنا</a></li>
                                <li class="menu-item-has-children d-lg-none">
                                    <a href="#">اللغة</a>
                                    <ul class="axil-submenu">
                                        <li><a href="index-1.html">العربية</a></li>
                                        <li><a href="index-2.html">English</a></li>

                                    </ul>
                                </li>

                            </ul>


                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action d-flex ">
                        <!-- <ul class="action-list me-5">
                            <li class="my-account d-none d-lg-inline-block">
                                <a href="javascript:void(0)" class=" language-button btn btn-light">
                                    اللغة
                                </a>
                                <div class="my-account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="#">العربية</a>
                                        </li>
                                        <li>
                                            <a href="#">English</a>
                                        </li>
                                    </ul>

                                </div>
                            </li>

                            <li style="margin: 0;" class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler text-white">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul> -->

                        <div class="auth ms-2 d-none d-lg-inline-block">
                            <a id="loginButton" href="#" style="color: #3ec0c2;" class="m-5">دخول</a>
                            <!-- <a href="#" class="btn-lg btn-danger text-white me-3"
                                style="background-color: #3ec0c2;">دخول</a> -->

                        </div>

                        <div class="dropdown">
                            <button style="background-color: #3ec0c2;color: white;" class="dropdown-toggle"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                اللغة
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">العربية</a></li>
                                <li><a class="dropdown-item" href="#">English</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Spanish</a></li> -->
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
    <!-- End Header -->


    <main class="main-wrapper mt-5 mb-5">
        <!-- Start Slider Area -->
        <div class="axil-main-slider-area main-slider-style-2 mb-5" data-aos="fade-left" data-aos-offset="300"
            data-aos-easing="ease-in-sine" data-aos-duration="1100">
            <div class="slider">
                <div class="row row--20 justify-content-center">
                    <div class="col-lg-11">
                        <div class="slider-box-wrap">
                            <div class="slider-activation-one axil-slick-dots">
                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <h2 class="fw-bold">ديلكوم</h2>
                                        <p class="lead text-dark">منصة متاجر للتجارة الإلكترونية ، ابدأ تجارتك
                                            الإلكترونية و أمتلك
                                            موقع و تطبيق متجر الكتروني خاص بك</p>
                                    </div>
                                    <div class="main-slider-thumb">
                                        <img src="https://via.placeholder.com/500x300" alt="Product">
                                    </div>
                                </div>
                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <h2 class="fw-bold"> سلايد التاني ديلكوم</h2>
                                        <p class="lead text-dark">منصة متاجر للتجارة الإلكترونية ، ابدأ تجارتك
                                            الإلكترونية و أمتلك
                                            موقع و تطبيق متجر الكتروني خاص بك</p>
                                    </div>


                                    <div class="main-slider-thumb">
                                        <div class="video-banner">
                                            <img src="https://via.placeholder.com/500x300" alt="Product">
                                            <div class="popup-video-icon">
                                                <a href="https://www.youtube.com/watch?v=FkUn86bH34M"
                                                    class="popup-youtube video-icon">
                                                    <i class="fas fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <h2 class="fw-bold"> سلايد ثالث ديلكوم</h2>
                                        <p class="lead text-dark">منصة متاجر للتجارة الإلكترونية ، ابدأ تجارتك
                                            الإلكترونية و أمتلك
                                            موقع و تطبيق متجر الكتروني خاص بك</p>
                                    </div>
                                    <div class="main-slider-thumb">
                                        <img src="https://via.placeholder.com/500x300" alt="Product">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End Slider Area -->

        <!-- Start Ads slider Area -->
        <section id="Ads Area mb-5" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"
            data-aos-duration="1200">
            <div class="container">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/800x200" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x200" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x200" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </section>

        <!-- Ends Ads slider Area -->

        <!-- Start Categories Section -->
        <div class="section-spreator mt-5" data-aos="flip-left" data-aos-easing="ease-out-cubic"
            data-aos-duration="2000">
            <div class="container ">
                <div class="row pt-3">
                    <div class="col-md-6">
                        <h3>التصنيفات</h3>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="#">عرض الكل</a>
                    </div>
                </div>
            </div>
        </div>


        <section id="category" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"
            data-aos-duration="1000">
            <!-- <div class="container border-shadow">
                <div class="row justify-content-around">
                    <div class="col-md-2 py-3 ">
                        <a href="#" class="fw-lighter fs-2"><i class="bi bi-star"></i>ملابس</a>

                    </div>

                    <div class="col-md-2 py-3 ">
                        <a href="#" class="fw-lighter fs-2"><i class="bi bi-star"></i>ملابس</a>

                    </div>

                    <div class="col-md-2 py-3 ">
                        <a href="#" class="fw-lighter fs-2"><i class="bi bi-star"></i>ملابس</a>

                    </div>

                    <div class="col-md-2 py-3 ">
                        <a href="#" class="fw-lighter fs-2"><i class="bi bi-star"></i>ملابس</a>

                    </div>

                    <div class="col-md-2 py-3 ">
                        <a href="#" class="fw-lighter fs-2"><i class="bi bi-star"></i>ملابس</a>

                    </div>



                </div>
                <div class="row justify-content-around">
                    <div class="col-md-2 py-3 ">
                        <a href="#" class="fw-lighter fs-2"><i class="bi bi-star"></i>ملابس</a>

                    </div>

                    <div class="col-md-2 py-3 ">
                        <a href="#" class="fw-lighter fs-2"><i class="bi bi-star"></i>ملابس</a>

                    </div>

                    <div class="col-md-2 py-3 ">
                        <a href="#" class="fw-lighter fs-2"><i class="bi bi-star"></i>ملابس</a>

                    </div>

                    <div class="col-md-2 py-3 ">
                        <a href="#" class="fw-lighter fs-2"><i class="bi bi-star"></i>ملابس</a>

                    </div>

                    <div class="col-md-2 py-3 ">
                        <a href="#" class="fw-lighter fs-2"><i class="bi bi-star"></i>ملابس</a>

                    </div>



                </div>


            </div> -->

            <div class="axil-product-area bg-color-white axil-section-gap pb--0">
                <div class="container">
                    <div class="product-area pb--20">
                        <div class="axil-isotope-wrapper">
                            <div class="product-isotope-heading">

                                <div class="isotope-button mb-3">
                                    <button data-filter="*" class="is-checked"><span
                                            class="filter-text">الكل</span></button>

                                    <button data-filter=".clothes" class=""><span class="filter-text"><i
                                                class="bi bi-star"></i> ملابس</span></button>
                                    <button data-filter=".cars"><span class="filter-text"> <i class="bi bi-star"></i>
                                            سيارات</span></button>
                                    <button data-filter=".phones"><span class="filter-text"><i class="bi bi-star"></i>
                                            هواتف</span></button>
                                    <button data-filter=".machine"><span class="filter-text"><i class="bi bi-star"></i>
                                            اجهزة</span></button>
                                </div>

                            </div>
                            <div class="row row--15 isotope-list">

                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30 product cars">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="product-details.html">
                                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                    src="{{asset('frontend/assets/images/product/nft/product-15.png')}}" alt="Product Images">
                                            </a>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <li class="select-option"><a href="product-details.html">شراء
                                                            المنتج</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title"><a href="product-details.html">سيارة</a>

                                                </h5>
                                                <div class="product-rating">
                                                    <span class="icon">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </span>

                                                    <a class="d-block" href="product-details.html" style="color: #3ec0c2;
                                                        ">اسم الشركة</a>

                                                    <p class="product-text">هذا النص هو مثال لنص يمكن أن يستبدل
                                                        في
                                                        نفس
                                                        المساحة، لقد تم توليد
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30 product phones">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="product-details.html">
                                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                    src="{{asset('frontend/assets/images/product/nft/product-15.png')}}" alt="Product Images">
                                            </a>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <li class="select-option"><a href="product-details.html">شراء
                                                            المنتج</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title"><a href="product-details.html">هاتف سامسونج</a>

                                                </h5>
                                                <div class="product-rating">
                                                    <span class="icon">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </span>

                                                    <a class="d-block" href="product-details.html" style="color: #3ec0c2;
                                                        ">اسم الشركة</a>

                                                    <p class="product-text">هذا النص هو مثال لنص يمكن أن يستبدل
                                                        في
                                                        نفس
                                                        المساحة، لقد تم توليد
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30 product machine">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="product-details.html">
                                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                    src="{{asset('frontend/assets/images/product/nft/product-15.png')}}" alt="Product Images">
                                            </a>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <li class="select-option"><a href="product-details.html">شراء
                                                            المنتج</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title"><a href="product-details.html">لابتوب</a>

                                                </h5>
                                                <div class="product-rating">
                                                    <span class="icon">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </span>

                                                    <a class="d-block" href="product-details.html" style="color: #3ec0c2;
                                                        ">اسم الشركة</a>

                                                    <p class="product-text">هذا النص هو مثال لنص يمكن أن يستبدل
                                                        في
                                                        نفس
                                                        المساحة، لقد تم توليد
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30 product clothes">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="product-details.html">
                                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                    src="{{asset('frontend/assets/images/product/nft/product-15.png')}}" alt="Product Images">
                                            </a>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <li class="select-option"><a href="product-details.html">شراء
                                                            المنتج</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title"><a href="product-details.html">بلوزه</a>

                                                </h5>
                                                <div class="product-rating">
                                                    <span class="icon">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </span>

                                                    <a class="d-block" href="product-details.html" style="color: #3ec0c2;
                                                        ">اسم الشركة</a>

                                                    <p class="product-text">هذا النص هو مثال لنص يمكن أن يستبدل
                                                        في
                                                        نفس
                                                        المساحة، لقد تم توليد
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="section-spreator mt-5" data-aos="flip-left" data-aos-easing="ease-out-cubic"
            data-aos-duration="2000">
            <div class="container ">
                <div class="row d-flex flex-column align-items-center">
                    <div class="col-md-4 py-5">
                        <h3>لم تستطع ايجاد <span style="color: #3ec0c2;">منتجك</span> هنا ؟</h3>
                        <a href="product-list.html" class="btn btn-primary w-50 p-3 "
                            style="margin-right: 20%;background-color: #3ec0c2;font-size: 1.3em;">طلب عرض
                            الاسعار</a>

                    </div>





                </div>

                <!-- <div class="row justify-content-center ">
                    <div class="col-md-2">
                        <button class="btn btn-primary">طلب عرض الاسعار</button>
                    </div>

                </div> -->
            </div>
        </div>

        <!-- End Categories Section -->

        <!-- Start About Area  -->
        <div class="axil-about-area about-style-2" data-aos="fade-up" data-aos-anchor-placement="top-center"
            data-aos-easing="ease-out-cubic" data-aos-duration="1000">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-lg-5 order-lg-2">
                        <div class="about-thumbnail">
                            <img src="{{asset('frontend/assets/images/about/about-03.png')}}" alt="about">
                        </div>
                    </div>
                    <div class="col-lg-7 order-lg-1">
                        <div class="about-content content-left">
                            <h4 class="title">لماذا نحن ؟</h4>
                            <p class="lead text-dark">إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى
                                زيادة عدد
                                الفقرات كما
                                تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على
                                وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                                ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد
                                النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه
                                التصميم فيظهر بشكل لا يليق.</p>
                            <button class="btn btn-primary w-25 p-3 "
                                style="background-color: #3ec0c2;font-size: 1.3em;">اشترك
                                الان</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Area  -->


        <div class="section-spreator mt-5" data-aos="flip-left" data-aos-easing="ease-out-cubic"
            data-aos-duration="2000">
            <div class="container ">
                <div class="row pt-3">
                    <div class="col-md-6">
                        <h3>الخدمات</h3>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="#">عرض الكل</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="service-area mt-5" data-aos="fade-up" data-aos-anchor-placement="top-center"
            data-aos-easing="ease-out-cubic" data-aos-duration="1000">
            <div class="container">
                <div class="row ">

                    <div class="col-6 col-md-4">
                        <div class="service-box">
                            <div class="icon">
                                <img src="./{{asset('frontend/assets/images/icons/service1.png')}}" alt="Service">
                            </div>
                            <h6 class="title">اسم الخدمة</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="service-box">
                            <div class="icon">
                                <img src="./{{asset('frontend/assets/images/icons/service2.png')}}" alt="Service">
                            </div>
                            <h6 class="title">اسم الخدمة</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="service-box">
                            <div class="icon">
                                <img src="./{{asset('frontend/assets/images/icons/service3.png')}}" alt="Service">
                            </div>
                            <h6 class="title">اسم الخدمة</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="service-box">
                            <div class="icon">
                                <img src="./{{asset('frontend/assets/images/icons/service4.png')}}" alt="Service">
                            </div>
                            <h6 class="title">اسم الخدمة</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="service-box">
                            <div class="icon">
                                <img src="./{{asset('frontend/assets/images/icons/service5.png')}}" alt="Service">
                            </div>
                            <h6 class="title">اسم الخدمة</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="service-box">
                            <div class="icon">
                                <img src="./{{asset('frontend/assets/images/icons/service5.png')}}" alt="Service">
                            </div>
                            <h6 class="title">اسم الخدمة</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Video Banner Area  -->
        <div class="video-banner-area mt-5" data-aos="fade-up" data-aos-anchor-placement="top-center"
            data-aos-easing="ease-out-cubic" data-aos-duration="1000">
            <div class="container">
                <div class="product-area pb--80">
                    <!-- <div class="section-title-wrapper section-title-center">
                        <h2 class="title">Meet The Greater</h2>
                        <span class="title-highlighter highlighter-primary"><i class="far fa-film-alt"></i> Video</span>
                    </div> -->
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="video-banner">
                                <img src="{{asset('frontend/assets/images/bg/bg-image-7.jpg')}}" alt="Images">
                                <div class="popup-video-icon">
                                    <a href="https://www.youtube.com/watch?v=FkUn86bH34M"
                                        class="popup-youtube video-icon">
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Banner Area  -->



        <div class="section-spreator mt-5" data-aos="flip-left" data-aos-easing="ease-out-cubic"
            data-aos-duration="2000">
            <div class="container ">
                <div class="row pt-3">
                    <div class="col-md-6">
                        <h3>الخدمات المساندة</h3>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="#">عرض الكل</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start Support Service Area  -->

        <section id="support-service">

            <div class="axil-product-area bg-color-white axil-section-gap pb--0">
                <div class="container">
                    <div class="product-area pb--20">
                        <div class="axil-isotope-wrapper">
                            <div class="product-isotope-heading">

                                <div class="isotope-button mb-3">
                                    <div class="isotope-button filter-button-group mb-3 extra-service-filter">


                                        <button data-filter=".shipping" class="extra-service-btn">
                                            <span class="filter-text"> شركات
                                                الشحن</span></button>
                                        <button data-filter=".transfer" class="extra-service-btn">
                                            <span class="filter-text">
                                                شركات تحويل الاموال</span></button>

                                    </div>

                                </div>

                            </div>
                            <div class="row service-grid ">

                                <div class="col-md-3 service-grid-item shipping">
                                    <div class="service-box how-to-sell">
                                        <div class="icon">
                                            <img src="./{{asset('frontend/assets/images/icons/choose.png')}}" alt="Service">
                                        </div>
                                        <!-- <h6 class="title">Choose Your Favourite</h6> -->
                                        <p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود
                                            تيمبور
                                            أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد .</p>
                                    </div>
                                </div>
                                <div class="col-md-3 service-grid-item shipping">
                                    <div class="service-box how-to-sell">
                                        <div class="icon">
                                            <img src="./{{asset('frontend/assets/images/icons/protection.png')}}" alt="Service">
                                        </div>
                                        <!-- <h6 class="title">Verify NFTs</h6> -->
                                        <p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود
                                            تيمبور
                                            أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد .</p>
                                    </div>
                                </div>
                                <div class="col-md-3 service-grid-item transfer">
                                    <div class="service-box how-to-sell">
                                        <div class="icon">
                                            <img src="./{{asset('frontend/assets/images/icons/purchasing.png')}}" alt="Service">
                                        </div>
                                        <!-- <h6 class="title">Purchase NFTS</h6> -->
                                        <p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود
                                            تيمبور
                                            أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد .</p>
                                    </div>
                                </div>
                                <div class="col-md-3 service-grid-item transfer">
                                    <div class="service-box how-to-sell">
                                        <div class="icon">
                                            <img src="./{{asset('frontend/assets/images/icons/dancing.png')}}" alt="Service">
                                        </div>
                                        <!-- <h6 class="title">Enjoy!</h6> -->
                                        <p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود
                                            تيمبور
                                            أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد .</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Support Services Area  -->

    </main>

    <!-- Start Footer Area  -->
    <footer class="axil-footer-area footer-style-1 footer-dark">
        <!-- Start Footer Top Area  -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- Start Single Widget  -->
                    <div class="col-md-3 col-sm-4">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">بيع/شراء</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="about-us.html">الخطط</a></li>
                                    <li><a href="about-us.html">كيف تبيع</a></li>
                                    <li><a href="blog.html">كيف اشتري</a></li>
                                    <li><a href="shop-sidebar.html">فئات</a></li>
                                    <li><a href="contact.html">مقاطع فيديو/شهادات</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-md-3 col-sm-4">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">خدمات</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="about-us.html">خدمات الشحن</a></li>
                                    <li><a href="about-us.html">خدمات تحويل الاموال</a></li>
                                    <li><a href="blog.html">ترجمة</a></li>
                                    <li><a href="shop-sidebar.html">معارض تجارية</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-md-3 col-sm-4">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">حول ديلكوم</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="my-account.html">معلومات الشركة</a></li>
                                    <li><a href="sign-up.html">لماذا ديلكوم</a></li>
                                    <li><a href="cart.html">خدمات</a></li>
                                    <li><a href="wishlist.html">المدونات</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-md-3 col-sm-4">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">خدمة العملاء</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="privacy-policy.html">التعليمات</a></li>
                                    <li><a href="terms-of-service.html">سياسات</a></li>
                                    <li><a href="#">اتصل بنا</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                </div>
            </div>
        </div>
        <!-- End Footer Top Area  -->
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center justify-content-center">

                    <div class=" col-12 col-md-6">
                        <div class="copyright-right d-flex flex-wrap align-items-center">
                            <ul class="payment-icons-bottom quick-link">
                                <li><img src="{{asset('frontend/assets/images/icons/cart/cart-1.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('frontend/assets/images/icons/cart/cart-2.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('frontend/assets/images/icons/cart/cart-3.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('frontend/assets/images/icons/cart/cart-6.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('frontend/assets/images/icons/cart/cart-5.png')}}" alt="paypal cart"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
    </footer>
    <!-- End Footer Area  -->

    <!-- Product Quick View Modal Start -->
    <div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="single-product-thumb">
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div
                                            class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                            <div class="thumbnail">
                                                <img src="{{asset('frontend/assets/images/product/product-big-01.png')}}"
                                                    alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{asset('frontend/assets/images/product/product-big-01.png')}}"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="{{asset('frontend/assets/images/product/product-big-02.png')}}"
                                                    alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{asset('frontend/assets/images/product/product-big-02.png')}}"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="{{asset('frontend/assets/images/product/product-big-03.png')}}"
                                                    alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{asset('frontend/assets/images/product/product-big-03.png')}}"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 order-lg-1">
                                        <div class="product-small-thumb small-thumb-wrapper">
                                            <div class="small-thumb-img">
                                                <img src="{{asset('frontend/assets/images/product/product-thumb/thumb-08.png')}}"
                                                    alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="{{asset('frontend/assets/images/product/product-thumb/thumb-07.png')}}"
                                                    alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="{{asset('frontend/assets/images/product/product-thumb/thumb-09.png')}}"
                                                    alt="thumb image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mb--40">
                                <div class="single-product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <img src="{{asset('frontend/assets/images/icons/rate.png')}}" alt="Rate Images">
                                            </div>
                                            <div class="review-link">
                                                <a href="#">(<span>1</span> customer reviews)</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">Serif Coffee Table</h3>
                                        <span class="price-amount">$155.00 - $255.00</span>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>In stock</li>
                                            <li><i class="fal fa-check"></i>Free delivery available</li>
                                            <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                                        </ul>
                                        <p class="description">In ornare lorem ut est dapibus, ut tincidunt nisi
                                            pretium. Integer ante est, elementum eget magna. Pellentesque sagittis
                                            dictum libero, eu dignissim tellus.</p>

                                        <div class="product-variations-wrapper">

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Colors:</h6>
                                                <div class="color-variant-wrapper">
                                                    <ul class="color-variant mt--0">
                                                        <li class="color-extra-01 active"><span><span
                                                                    class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-02"><span><span
                                                                    class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-03"><span><span
                                                                    class="color"></span></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Product Variation  -->

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Size:</h6>
                                                <ul class="range-variant">
                                                    <li>xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <!-- End Product Variation  -->

                                        </div>

                                        <!-- Start Product Action Wrapper  -->
                                        <div class="product-action-wrapper d-flex-center">
                                            <!-- Start Quentity Action  -->
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                            <!-- End Quentity Action  -->

                                            <!-- Start Product Action  -->
                                            <ul class="product-action d-flex-center mb--0">
                                                <li class="add-to-cart"><a href="cart.html"
                                                        class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html"
                                                        class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a>
                                                </li>
                                            </ul>
                                            <!-- End Product Action  -->

                                        </div>
                                        <!-- End Product Action Wrapper  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Quick View Modal End -->

    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form action="#">
                    <div class="input-group">
                        <input type="search" class="form-control" name="prod-search" id="prod-search"
                            placeholder="Write Something....">
                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title">24 Result Found</h6>
                    <a href="shop.html" class="view-all">View All</a>
                </div>
                <div class="psearch-results">
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="./{{asset('frontend/assets/images/product/electric/product-09.png')}}" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="./{{asset('frontend/assets/images/product/electric/product-09.png')}}" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Search Modal End -->




    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title">Cart review</h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-body">
                <ul class="cart-item-list">
                    <li class="cart-item">
                        <div class="item-img">
                            <a href="single-product.html"><img src="{{asset('frontend/assets/images/product/electric/product-01.png')}}"
                                    alt="Commodo Blown Lamp"></a>
                            <button class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(64)</span>
                            </div>
                            <h3 class="item-title"><a href="single-product-3.html">Wireless PS Handler</a></h3>
                            <div class="item-price"><span class="currency-symbol">$</span>155.00</div>
                            <div class="pro-qty item-quantity">
                                <input type="number" class="quantity-input" value="15">
                            </div>
                        </div>
                    </li>
                    <li class="cart-item">
                        <div class="item-img">
                            <a href="single-product-2.html"><img src="{{asset('frontend/assets/images/product/electric/product-02.png')}}"
                                    alt="Commodo Blown Lamp"></a>
                            <button class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(4)</span>
                            </div>
                            <h3 class="item-title"><a href="single-product-2.html">Gradient Light Keyboard</a></h3>
                            <div class="item-price"><span class="currency-symbol">$</span>255.00</div>
                            <div class="pro-qty item-quantity">
                                <input type="number" class="quantity-input" value="5">
                            </div>
                        </div>
                    </li>
                    <li class="cart-item">
                        <div class="item-img">
                            <a href="single-product-3.html"><img src="{{asset('frontend/assets/images/product/electric/product-03.png')}}"
                                    alt="Commodo Blown Lamp"></a>
                            <button class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(6)</span>
                            </div>
                            <h3 class="item-title"><a href="single-product.html">HD CC Camera</a></h3>
                            <div class="item-price"><span class="currency-symbol">$</span>200.00</div>
                            <div class="pro-qty item-quantity">
                                <input type="number" class="quantity-input" value="100">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="cart-footer">
                <h3 class="cart-subtotal">
                    <span class="subtotal-title">Subtotal:</span>
                    <span class="subtotal-amount">$610.00</span>
                </h3>
                <div class="group-btn">
                    <a href="cart.html" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
                    <a href="checkout.html" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
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
    <!-- <script src="{{asset('frontend/assets/js/vendor/jquery.style.switcher.js')}}"></script> -->
    <script src="{{asset('frontend/assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/sal.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/counterup.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/waypoints.min.js')}}"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- Main JS -->
    <script src="{{asset('frontend/assets/js/rtl-main.js')}}"></script>
    <!-- <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script> -->

    <script>
        // init Isotope
        var $grid = $('.service-grid').isotope({
            // options
            itemSelector: '.service-grid-item',
            // layoutMode: 'fitRows'
        });
        // filter items on button click
        $('.filter-button-group').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
        });

    </script>

</body>

</html>
