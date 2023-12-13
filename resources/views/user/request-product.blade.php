@extends('welcome')


@section('title', 'Request Product')

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
<link rel="stylesheet" href="{{asset('frontend/assets/dealcom/css/dealcome-request-product.rtl.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
@endpush



@section('content')
    <main class="main-wrapper mt-5 mb-5">


        <!-- Start About Area  -->
        <div class="axil-about-area about-style-2">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-lg-5 order-lg-2">
                        <div class="about-thumbnail">
                            <!-- <img src="https://via.placeholder.com/400x300" alt="about"> -->
                            <a href="#" class="images-preview images-preview06">
                                <img src="https://picsum.photos/400/300?image=684">
                                <img src="https://picsum.photos/400/300?image=676">
                                <img src="https://picsum.photos/400/300?image=664">
                                <img src="https://picsum.photos/400/300?image=565">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 order-lg-1">
                        <div class="about-content content-left">
                            <h4 class="title">وصف المنصه</h4>
                            <p class="lead text-dark">إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد العربي</p>
                            <button class="btn btn-primary w-25 p-3 "
                                style="background-color: #3ec0c2;font-size: 1.3em;">سجل الان</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- End About Area  -->


        <div class="section-spreator mt-5">
            <div class="container ">
                <div class="row pt-3">
                    <div class="col-md-6">
                        <h3>الشركات الممولة</h3>
                    </div>
                    -->
                </div>
            </div>
        </div>


        <div class="service-area mt-5">
            <div class="container">
                <div class="row ">

                    <div class="col-6 col-md-3">
                        <div class="service-box">

                            <img src="https://via.placeholder.com/300x200" alt="Service">

                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="service-box">

                            <img src="https://via.placeholder.com/300x200" alt="Service">

                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="service-box">

                            <img src="https://via.placeholder.com/300x200" alt="Service">

                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="service-box">

                            <img src="https://via.placeholder.com/300x200" alt="Service">

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="section-spreator mt-5">
            <div class="container ">
                <div class="row pt-3">
                    <div class="col-md-6">
                        <h3>طلب منتج</h3>
                    </div>
                    -->
                </div>
            </div>
        </div>


        <!-- Start About Area  -->
        <div class="axil-about-area about-style-2 mb-md-5">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-lg-5 order-lg-2">
                        <div class="about-thumbnail">
                            <!-- <img src="https://via.placeholder.com/300x250" alt="about"> -->
                            <a href="#" class="images-preview images-preview06">
                                <img src="https://picsum.photos/400/300?image=684">
                                <img src="https://picsum.photos/400/300?image=676">
                                <img src="https://picsum.photos/400/300?image=664">
                                <img src="https://picsum.photos/400/300?image=565">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 order-lg-1">
                        <div class="about-content content-left">
                            <h4 class="title">ديلكوم</h4>
                            <p class="lead text-dark">لدينا اكثر من 1000 علامة تجارية تسهل عليك عملك</p>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- End About Area  -->



        <!-- Start My Account Area  -->
        <div class="axil-dashboard-area mt-md-5" style="margin-top: 7em !important; ">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="axil-dashboard-author">
                        <div class="media">
                            <!-- <div class="thumbnail">
                                <img src="./assets/images/product/author1.png" alt="Hello Annie">
                            </div> -->
                            <div class="media-body">
                                <h2 class="title mb-md-2">لم تحصل على منتجك؟</h2>
                                <span class="joining-date"> قم بتعئبة الاستبانه و احصل على عروض أسعار مميزة</span>
                            </div>
                        </div>
                    </div>


                    <div class="container py-4 mb-md-5 form-div" style="background-color: #eee;">
                        <p class="lead text-dark fs-3 mb-4">اذا لم يكن لديك حساب املاء الحقول /لدي حساب <a
                                class="second-link" href="{{route('login')}}">سجل دخولك
                                هنا</a>
                        </p>
                        <form class="row g-2 justify-content-center">
                            <div class="col-4">
                                <label for="inputName" class="visually-hidden">الاسم</label>
                                <input type="text" class="form-control" id="inputName" placeholder="الاسم">
                            </div>
                            <div class="col-4">
                                <label for="inputEmail" class="visually-hidden">البريد الالكتروني</label>
                                <input type="text" class="form-control" id="inputEmail" placeholder="البريد الالكتروني">
                            </div>
                            <div class="col-4">
                                <label for="inputPassword" class="visually-hidden">كلمة المرور</label>
                                <input type="password" class="form-control" id="inputPassword"
                                    placeholder="كلمة المرور">
                            </div>
                            <div class="row">
                                <div class="col-4 mt-md-3">
                                    <button type="submit" class="btn btn-primary btn-lg mb-2 second-bg-color">
                                        <span class="fs-4">سجل الان</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>



                    <div class="container py-4 mb-md-5 form-div" style="background-color: #dff8ed;">
                        <p class="lead text-dark fs-3 mb-4">تفاصيل المنتج</p>
                        <form>
                            <div class="row g-2 justify-content-center mb-md-4">
                                <div class="col-4">
                                    <label for="inputName" class="visually-hidden">الاسم</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="الاسم">
                                </div>
                                <div class="col-4">
                                    <label for="inputEmail" class="visually-hidden">التصنيف</label>
                                    <input type="text" class="form-control" id="inputEmail" placeholder="التصنيف">
                                </div>
                                <div class="col-4">
                                    <label for="inputPassword" class="visually-hidden">الكمية </label>
                                    <input type="text" class="form-control" id="inputPassword" placeholder="الكمية">
                                </div>

                            </div>
                            <div class="row g-2 justify-content-center mb-md-4">
                                <div class="col-4">
                                    <label for="inputName" class="visually-hidden">وحدة القياس</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="وحدة القياس">
                                </div>
                                <div class="col-4">
                                    <label for="inputEmail" class="visually-hidden">بلد الشحن</label>
                                    <input type="text" class="form-control" id="inputEmail" placeholder="بلد الشحن">
                                </div>
                                <div class="col-4">
                                    <label for="inputPassword" class="visually-hidden">طريقة الشحن </label>
                                    <input type="text" class="form-control" id="inputPassword"
                                        placeholder="طريقة الشحن">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="exampleFormControlTextarea1" class="visually-hidden">الوصف</label>
                                    <textarea class="form-control" rows="8" placeholder="الوصف"></textarea>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-4 mt-md-3">
                                    <button type="submit" class="btn btn-primary btn-lg mb-2 second-bg-color py-3">
                                        <span class="fs-4">احصل على عرض السعر</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>




    </main>
@endsection


@push('script')


@endpush
