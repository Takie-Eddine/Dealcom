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
    <link rel="stylesheet" href="{{asset('frontend/assets/dealcom/css/dealcom-product-details.rtl.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

@endpush



@section('content')

    <main class="main-wrapper mt-5 mb-5">

        <!-- Start Shop Area  -->
        <div class="axil-single-product-area bg-color-white" data-aos="fade-left" data-aos-offset="300"
            data-aos-easing="ease-in-sine" data-aos-duration="1000">
            <div class="single-product-thumb axil-section-gap pb--20 pb_sm--0 ">
                <div class="container">
                    <div class="row row--50">
                        <div class="col-lg-6 mb--40">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div
                                        class="product-large-thumbnail-2 single-product-thumbnail axil-product slick-layout-wrapper--15 axil-slick-arrow arrow-both-side-3">
                                        <div class="thumbnail">
                                            <img src="{{$product->image_url}}" alt="Product Images">
                                        </div>
                                        @forelse ($product->images as $image)
                                            <div class="thumbnail">
                                                <img src="{{$image->image_url}}" alt="Product Images">
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div
                                        class="small-thumb-wrapper product-small-thumb-2 small-thumb-style-two small-thumb-style-three">
                                            @forelse ($product->images as $image)
                                                <div class="small-thumb-img ">
                                                    <img src="{{$image->_image_url}}"
                                                        alt="samll-thumb">
                                                </div>
                                            @empty
                                            @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title">{{$product->name}}</h2>
                                    <h4 class="text-muted">{{$product->category->name}} </h4>
                                    @if ($product->price)
                                        <span class="price-amount main-color">اسعار تبدأ من 20$</span>
                                    @endif
                                    <div class="product-rating">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>

                                    </div>
                                    <div class="company-name mb-2">
                                        <span class="main-color me-5">{{$product->brand->name}}</span>
                                    </div>

                                    <p class="description text-dark">{!!$product->description!!}</p>

                                    <div class="product-variations-wrapper">
                                        @forelse ($product->variants as $variant)
                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">{{$variant}}</h6>
                                                <div class="color-variant-wrapper">
                                                    <ul class="color-variant mt--0">
                                                        <li class="color-extra-01 active"><span><span
                                                                    class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-02"><span><span class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-03"><span><span class="color"></span></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Product Variation  -->
                                        @empty

                                        @endforelse


                                        {{-- <!-- Start Product Variation  -->
                                        <div class="product-variation product-size-variation">
                                            <h6 class="title">الحجم:</h6>
                                            <ul class="range-variant">
                                                <li>xs</li>
                                                <li>s</li>
                                                <li>m</li>
                                                <li>l</li>
                                                <li>xl</li>
                                            </ul>
                                        </div>
                                        <!-- End Product Variation  --> --}}

                                    </div>

                                    <!-- Start Product Action Wrapper  -->
                                    <div class="product-action-wrapper d-flex-center">
                                        <!-- Start Quentity Action  -->
                                        <div class="pro-qty mr--20"><input type="text" value="1"></div>
                                        <!-- End Quentity Action  -->

                                        <!-- Start Product Action  -->
                                        <ul class="product-action d-flex-center mb--0">
                                            <li class="add-to-cart"><a href="cart.html"
                                                    class="axil-btn btn-bg-primary">اضف للسلة</a></li>
                                            <li class="wishlist"><a href="wishlist.html"
                                                    class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <!-- End Product Action  -->

                                    </div>
                                    <!-- End Product Action Wrapper  -->


                                    <div class="product-desc-wrapper pt--80 pt_sm--60 mt-md-4">
                                        <div class="row mb-5">
                                            <div class="col-md-6">
                                                <h4 class="primary-color mb--40 desc-heading">تواصل مع الشركة</h4>
                                                <h4 class="primary-color mb--40 desc-heading fw-light">مثال على الاسم
                                                </h4>
                                                <div class="product-rating">
                                                    <div class="star-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <div class="bradcrumb-thumb">
                                                    <img src="assets/images/product/product-45.png"
                                                        class="rounded-circle" alt="Image">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 mb-sm-3">
                                                <button class="btn-lg btn-primary bg-second-color">اتصال</button>
                                            </div>
                                            <div class="col-md-4 mb-sm-3">
                                                <button class="btn-lg btn-outline-danger main-color-outline-btn">ارسال
                                                    رسالة</button>
                                            </div>
                                            <div class="col-md-4 mb-sm-3">
                                                <button class="btn-lg btn-primary bg-second-color">مشاركة</button>
                                            </div>
                                        </div>

                                        <!-- End .pro-des-features -->
                                    </div>
                                    <!-- End .product-desc-wrapper -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .single-product-thumb -->

        </div>
        <!-- End Shop Area  -->


        <!-- Start Simlair Product Area  -->
        <div id="similar-products" class="axil-product-area bg-color-white mb-md-5 " data-aos="flip-left"
            data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <div class="container">
                <div class="section-title-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="title">المنتجات المشابهة</h2>
                        </div>
                        <!-- <div class="col-md-6 text-end">
                            <h2 class="title">المزيد</h2>
                        </div> -->
                    </div>

                </div>
                <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
        <!-- End Simlair Product Area  -->

        <!-- Start Most Orderd Product Area  -->
        <div id="most-orderd-products" class="axil-product-area bg-color-white mb-md-5 " data-aos="flip-right"
            data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <div class="container">
                <div class="section-title-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="title">المنتجات الاكثر طلبا</h2>
                        </div>
                        <!-- <div class="col-md-6 text-end">
                            <h2 class="title">المزيد</h2>
                        </div> -->
                    </div>

                </div>
                <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
        <!-- End  Most oreded Product Area  -->
        <!-- Start Most Orderd Product Area  -->
        <div id="could-like-products" class="axil-product-area bg-color-white " data-aos="flip-left"
            data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <div class="container">
                <div class="section-title-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="title">منتجات قد تعجبك</h2>
                        </div>
                        <!-- <div class="col-md-6 text-end">
                            <h2 class="title">المزيد</h2>
                        </div> -->
                    </div>

                </div>
                <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
                    <div class="slick-single-layout">
                        <div class="slider-product-custom axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="single-product-7.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/nft/product-15.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="single-product-7.html">شراء
                                                المنتج</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-7.html">سيارة</a>

                                    </h5>
                                    <div class="product-rating">
                                        <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>

                                        <a class="d-block" href="single-product-7.html" style="color: #3ec0c2;
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
        <!-- End  Most oreded Product Area  -->


    </main>

@endsection


@push('script')



@endpush