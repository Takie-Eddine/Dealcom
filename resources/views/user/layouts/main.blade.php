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
                                @forelse ($vedio_top as $vedio_top)
                                    @if ($vedio_top->locale == app()->getLocale())
                                        <div class="main-slider-content">
                                            <h2 class="fw-bold"> {{$vedio_top->title ?? ''}}</h2>
                                            <p class="lead text-dark"> {{$vedio_top->sub_title ?? ''}} </p>
                                        </div>


                                        <div class="main-slider-thumb">
                                            <div class="video-banner">
                                                @if ($vedio_top)
                                                    <img src="{{$vedio_top->image_url}}" alt="Product">
                                                @endif

                                                <div class="popup-video-icon">
                                                    <a href="{{$vedio_top->link ?? ''}}"
                                                        class="popup-youtube video-icon">
                                                        <i class="fas fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                @empty
                                @endforelse
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
                    @php $first = true; @endphp
                    @forelse ($sliders as $slider)
                        @if ($slider->position == 'top' && app()->getLocale() == $slider->locale)
                            <div class="carousel-item{{ $first ? ' active' : '' }}">
                                <img src="{{$slider->image_url}}" class="d-block w-100" alt="...">
                            </div>
                            @php $first = false; @endphp
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
    <div class="section-spreator mt-5"  data-aos-easing="ease-out-cubic"
        data-aos-duration="2000">
        <div class="container ">
            <div class="row pt-3">
                <div class="">
                    <h3 style="text-align:center">{{__('master.categories')}}</h3>
                </div>
                <div class="col-md-6 text-end">
                    {{-- <a href="{{route('product')}}">عرض الكل</a> --}}
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
                                    <button class="is-checked"><span class="filter-text">{{__('master.all')}}</span></button>
                                @forelse ($categories as $category)
                                    <button  data-filter=".{{$category}}">
                                        <span class="filter-text">
                                            @if ($category->slug == 'apparel')
                                                <img src="{{asset('assets/logo/clothes.jpg')}}" alt="">
                                            @endif
                                            @if ($category->slug == 'furniture')
                                                <img src="{{asset('assets/logo/fourniture.jpg')}}" alt="">
                                            @endif
                                            @if ($category->slug == 'food')
                                                <img src="{{asset('assets/logo/food.jpg')}}" alt="">
                                            @endif
                                            @if ($category->slug == 'machines')
                                                <img src="{{asset('assets/logo/equipment.jpg')}}" alt="">
                                            @endif
                                            {{$category->name}}
                                        </span>
                                    </button>
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
                                            <a href="{{route('product.show',$product->slug)}}">
                                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{$product->image_url}}" style="width:200px;  height:200px;" width="350" height="350" alt="Product Images">
                                            </a>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <li class="select-option"><a href="{{route('product.show',$product->slug)}}">{{__('master.request product')}} </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title"><a href="{{route('product.show',$product->slug)}}">{{$product->name}}</a>

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


    <div class="section-spreator mt-5"  data-aos-easing="ease-out-cubic"
        data-aos-duration="2000">
        <div class="container ">
            <div class="row d-flex flex-column align-items-center">
                <div class="col-md-4 py-5">
                    <h3>{{__('master.not found')}}<span style="color: #3ec0c2;">{{__('master.your product')}}</span> {{__('master.here')}}</h3>
                    <a href="{{route('category')}}" class="btn btn-primary w-50 p-3 "
                        style="margin-right: 20%;background-color: #3ec0c2;font-size: 1.3em;"> {{__('master.products')}}
                        </a>

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
                        @if ($content_top)
                            <img src="{{$content_top->image_url}}" alt="about">
                        @endif
                    </div>
                </div>
                <div class="col-lg-7 order-lg-1">
                    <div class="about-content content-left">
                        <h4 class="title">{{$content_top->title ?? ''}}</h4>
                        @if ($content_top)
                        <div class="how-to-sell">
                            {!!$content_top->sub_title!!}
                        </div>

                        @endif
                        @if ($content_center)
                            <a href="{{route('login')}}" class="btn btn-primary w-25 p-3 "
                            style="background-color: #3ec0c2;font-size: 1.3em;">{{__('master.subscribe')}}
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area  -->


    <div class="section-spreator mt-5"  data-aos-easing="ease-out-cubic"
        data-aos-duration="2000">
        <div class="container ">
            <div class="row pt-3">
                <div class="">
                    <h3 style="text-align:center">{{__('master.services')}}</h3>
                </div>
                <div class="col-md-6 text-end">
                    {{-- <a href="#">عرض الكل</a> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="service-area mt-5" data-aos="fade-up" data-aos-anchor-placement="top-center"
        data-aos-easing="ease-out-cubic" data-aos-duration="1000">
        <div class="container">
            <div class="row ">
                @forelse ($content_center as $content)
                    <div class="col-6 col-md-4">
                        <div class="service-box">
                            <div class="icon">
                                <img src="{{$content->image_url}}" alt="Service">
                            </div>
                            <h6 class="title">{{$content->title}}</h6>
                        </div>
                    </div>
                @empty
                @endforelse
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
                            @forelse ($vedio_bottom as $vedio_bottom)
                                @if ($vedio_bottom->locale == app()->getLocale())
                                    @if ($vedio_bottom)
                                        <img src="{{$vedio_bottom->image_url}}" alt="Images">
                                    @endif
                                    <div class="popup-video-icon">
                                        <a href="{{$vedio_bottom->link ?? ''}}"
                                            class="popup-youtube video-icon">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    </div>
                                @endif
                            @empty
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Banner Area  -->



    <div class="section-spreator mt-5"  data-aos-easing="ease-out-cubic"
        data-aos-duration="2000">
        <div class="container ">
            <div class="row pt-3">
                <div class="">
                    <h3 style="text-align:center">{{__('master.customer review')}}</h3>
                </div>
                <div class="col-md-6 text-end">
                    {{-- <a href="#">عرض الكل</a> --}}
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
                        {{-- <div class="product-isotope-heading">

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

                        </div> --}}
                        <div class="row service-grid ">
                            @forelse ($content_bottom as $content)
                                <div class="col-md-3 service-grid-item shipping">
                                    <div class="service-box how-to-sell">
                                        <div class="icon">
                                            {{-- <img src="./{{asset('frontend/assets/images/icons/choose.png')}}" alt="Service"> --}}
                                        </div>
                                        <h6 class="title">{{$content->title}}</h6>
                                        <p>{!!$content->sub_title!!}</p>
                                    </div>
                                </div>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Support Services Area  -->

</main>


@endsection


@push('script')

@endpush
