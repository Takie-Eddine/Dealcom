@extends('welcome')


@section('title', 'About Us')

@push('style')

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
    <link rel="stylesheet" href="{{asset('frontend/assets/dealcom/css/dealcome-about.rtl.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
@endpush



@section('content')

    <main class="main-wrapper mb-5">

        <!-- Start Slider Area -->
        <div class="axil-main-slider-area main-slider-style-7 bg_image--8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="main-slider-content">
                            <h1 class="text-white text-center">ما هي ديلكوم ؟</h1>
                            <p class="section-breadcrumb text-center">الرئيسية>> من نحن</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->


        <!-- Start About Area  -->
        <div class="axil-about-area about-style-2" data-aos="fade-up" data-aos-anchor-placement="top-center"
            data-aos-easing="ease-out-cubic" data-aos-duration="1000">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-lg-5 order-lg-2">
                        <div class="about-thumbnail">
                            <a href="#" class="images-preview images-preview06">
                                <img src="https://via.placeholder.com/400x300">
                                <img src="https://via.placeholder.com/400x300">
                                <img src="https://via.placeholder.com/400x300">
                                <img src="https://via.placeholder.com/400x300">
                            </a>
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
                        <h3>رحلة الصفقة</h3>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-section mt-md-5">
            <div class="container">

                <div class="row mt-5 mb-5">
                    <div class="col-md-4">
                        <div class='card'>
                            <div class='info'>
                                <h1 class='title'>رحلة الصفقة</h1>


                                <p class='description'> كنت تحتاج عدد كبر من الفقرات يتيح لك مولد النص العربى </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class='card'>
                            <div class='info'>
                                <h1 class='title'>رحلة الصفقة</h1>


                                <p class='description'> كنت تحتاج عدد كبر من الفقرات يتيح لك مولد النص العربى </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class='card'>
                            <div class='info'>
                                <h1 class='title'>رحلة الصفقة</h1>


                                <p class='description'> كنت تحتاج عدد كبر من الفقرات يتيح لك مولد النص العربى </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  mb-5">
                    <div class="col-md-4">
                        <div class='card'>
                            <div class='info'>
                                <h1 class='title'>رحلة الصفقة</h1>


                                <p class='description'> كنت تحتاج عدد كبر من الفقرات يتيح لك مولد النص العربى </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class='card'>
                            <div class='info'>
                                <h1 class='title'>رحلة الصفقة</h1>


                                <p class='description'> كنت تحتاج عدد كبر من الفقرات يتيح لك مولد النص العربى </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class='card'>
                            <div class='info'>
                                <h1 class='title'>رحلة الصفقة</h1>


                                <p class='description'> كنت تحتاج عدد كبر من الفقرات يتيح لك مولد النص العربى </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>

@endsection


@push('script')



@endpush
