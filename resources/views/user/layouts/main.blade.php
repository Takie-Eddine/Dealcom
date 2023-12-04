@extends('welcome')


@section('title', 'Dealcom')

@push('style')

@endpush

@section('content')

<main class="main-wrapper mt-5 mb-5">
    <!-- Start Slider Area -->
    <div class="axil-main-slider-area main-slider-style-2 mb-5" data-aos="fade-left" data-aos-offset="300"
        data-aos-easing="ease-in-sine" data-aos-duration="1100">
        <div class="slider">
            <div class="row row--20 justify-content-center">
                <div class="col-lg-11">
                    <div class="slider-box-wrap">
                        <div class="slider-activation-one axil-slick-dots">
                            {{-- <div class="single-slide slick-slide">
                                <div class="main-slider-content">
                                    <h2 class="fw-bold">ديلكوم</h2>
                                    <p class="lead text-dark">منصة متاجر للتجارة الإلكترونية ، ابدأ تجارتك
                                        الإلكترونية و أمتلك
                                        موقع و تطبيق متجر الكتروني خاص بك</p>
                                </div>
                                <div class="main-slider-thumb">
                                    <img src="https://via.placeholder.com/500x300" alt="Product">
                                </div>
                            </div> --}}
                            <div class="single-slide slick-slide">
                                <div class="main-slider-content">
                                    <h2 class="fw-bold"> {{$vedio->title ?? ''}}</h2>
                                    <p class="lead text-dark"> {{$vedio->sub_title ?? ''}} </p>
                                </div>


                                <div class="main-slider-thumb">
                                    <div class="video-banner">
                                        @if ($vedio)
                                            <img src="{{$vedio->image_url}}" alt="Product">
                                        @endif

                                        <div class="popup-video-icon">
                                            <a href="{{$vedio->link ?? ''}}"
                                                class="popup-youtube video-icon">
                                                <i class="fas fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="single-slide slick-slide">
                                <div class="main-slider-content">
                                    <h2 class="fw-bold"> سلايد ثالث ديلكوم</h2>
                                    <p class="lead text-dark">منصة متاجر للتجارة الإلكترونية ، ابدأ تجارتك
                                            الإلكترونية و أمتلك
                                            موقع و تطبيق متجر الكتروني خاص بك</p>
                                </div>
                                <div class="">
                                    <img src="" alt="Product">
                                </div>
                            </div> --}}


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
                    @forelse ($sliders as $slider)
                        @if ($slider->position == 'center')
                            <div class="carousel-item active">
                                <img src="{{$slider->image_url}}" class="d-block w-100" alt="...">
                            </div>
                        @endif

                    @empty

                    @endforelse

                    {{-- <div class="carousel-item">
                        <img src="https://via.placeholder.com/800x200" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/800x200" class="d-block w-100" alt="...">
                    </div> --}}
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
                    <a href="{{route('product')}}">عرض الكل</a>
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
                                @forelse ($categories as $category)
                                    <button data-filter=".all" class=""><span class="filter-text"><i class="bi bi-star"></i>{{$category->name}}</span></button>
                                @empty

                                @endforelse
                                {{-- <button data-filter=".clothes" class=""><span class="filter-text"><i
                                            class="bi bi-star"></i> ملابس</span></button>
                                <button data-filter=".cars"><span class="filter-text"> <i class="bi bi-star"></i>
                                        سيارات</span></button>
                                <button data-filter=".phones"><span class="filter-text"><i class="bi bi-star"></i>
                                        هواتف</span></button>
                                <button data-filter=".machine"><span class="filter-text"><i class="bi bi-star"></i>
                                        اجهزة</span></button> --}}
                            </div>

                        </div>
                        <div class="row row--15 isotope-list">
                            @forelse ($products as $product)
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30 product all">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="product-details.html">
                                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                                    src="{{$product->image_url}}" width="630" height="630" alt="Product Images">
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
                                                <h5 class="title"><a href="product-details.html">{{$product->name}}</a>

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
                                                        ">{{$product->brand->name}}</a>

                                                    <p class="product-text"{{$product->description}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty

                            @endforelse

                            {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30 product phones">
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
                            </div> --}}


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
                        @if ($content)
                            <img src="{{$content->image_url}}" alt="about">
                        @endif
                    </div>
                </div>
                <div class="col-lg-7 order-lg-1">
                    <div class="about-content content-left">
                        <h4 class="title">{{$content->title ?? ''}}</h4>
                        <p class="lead text-dark">{!!($content->sub_title ?? '')!!}</p>
                        @if ($content)
                            <a href="{{route('login')}}" class="btn btn-primary w-25 p-3 "
                            style="background-color: #3ec0c2;font-size: 1.3em;">اشترك
                            الان</a>
                        @endif

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



    {{-- <div class="section-spreator mt-5" data-aos="flip-left" data-aos-easing="ease-out-cubic"
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
    </div> --}}


    <!-- Start Support Service Area  -->

    {{-- <section id="support-service">

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
    </section> --}}
    <!-- End Support Services Area  -->

</main>

@endsection


@push('script')



@endpush
