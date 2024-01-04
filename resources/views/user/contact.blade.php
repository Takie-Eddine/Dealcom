@extends('welcome')


@section('title', 'Contact Us')

@push('style')
<link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/slick.cs')}}s">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/sal.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/base.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{asset('frontend/assets/scss/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/dealcom/css/dealcom-styles.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/dealcom/css/dealcom-contact.rtl.css')}}">

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
                            <h1 class="text-white text-center"></h1>
                            <!-- <p class="section-breadcrumb text-center">الرئيسية>> من نحن</p> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->


        <!-- Start Contact Area  -->
        <div class="axil-contact-page-area axil-section-gap">
            <div class="container">
                <div class="axil-contact-page">
                    <div class="row row--30">
                        <div class="col-lg-8">
                            <div class="contact-form">
                                <h3 class="title mb--50">لنحصل على فرصة للتعرف اليك</h3>
                                <!-- <p>If you’ve got great products your making or looking to work with us then drop us a line.</p> -->
                                {{-- <form id="contact-form" class="axil-contact-form">
                                    <div class="row row--10">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-name">الاسم الكامل <span>*</span></label>
                                                <input type="text" name="contact-name" id="contact-name">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-email">البريد الالكتروني <span>*</span></label>
                                                <input type="email" name="contact-email" id="contact-email">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-phone">رقم الهاتف <span>*</span></label>
                                                <input type="text" name="contact-phone" id="contact-phone">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-message">الرسالة</label>
                                                <textarea name="contact-message" id="contact-message" cols="1"
                                                    rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb--0">
                                                <button name="submit" type="submit" id="submit"
                                                    class="axil-btn second-bg-color">ارسال</button>
                                            </div>
                                        </div>
                                    </div>
                                </form> --}}
                                <script data-b24-form="inline/80/npkjxv" data-skip-moving="true">
                                    (function(w,d,u){
                                    var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                                    var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
                                    })(window,document,'https://cdn.bitrix24.com/b18545041/crm/form/loader_80.js');
                                </script>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="contact-location mb--40">
                                <h4 class="title mb--20">معلومات التواصل</h4>
                                <span class="address mb--20">Dumlupinar Cad. 44/1 Third Floor, Office No. 10 Zafer Mah. Bahcelievler, Istanbul, Turkey
                                </span>
                                <!-- <span class="phone">Phone: +123 456 7890</span>
                                <span class="email">Email: Hello@etrade.com</span>
                            </div> -->
                                <div class="contact-career mb--40">
                                    <h4 class="title mb--20">البريد الالكتروني</h4>
                                    <span class="email">info@dealcom.com.tr</span>

                                </div>
                                <div class="opening-hour">
                                    <h4 class="title mb--20">رقم الهاتف</h4>
                                    <span class="phone">00905448688822 </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Contact Area  -->
        </div>



    </main>

@endsection


@push('script')



@endpush
