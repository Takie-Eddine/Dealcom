@extends('welcome')


@section('title', 'Categories')

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
    <link rel="stylesheet" href="{{asset('frontend/assets/dealcom/css/dealcome-product-list.rtl.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
@endpush



@section('content')

<main class="main-wrapper mt-5 mb-5">

    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area" data-aos="" data-aos-offset="300" data-aos-easing="ease-in-sine"
        data-aos-duration="1100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="{{route('index')}}">{{__('master.home')}}</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">{{__('master.products')}}</li>
                        </ul>
                        <h1 class="title"> {{__('master.browsing')}}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            {{-- <img src="{{asset('frontend/assets/images/product/product-45.png')}}" alt="Image"> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <!-- Start Shop Area  -->
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3" data-aos="" data-aos-easing="ease-out-cubic"
                    data-aos-duration="2000">
                    <div class="axil-shop-sidebar">
                        <div class="d-lg-none">
                            <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="toggle-list product-categories active">
                            <h6 class="title">{{__('master.categories')}}</h6>
                            <div class="shop-submenu">
                                <ul>
                                    @forelse ($categories as $category)
                                        <li>
                                            <div class="form-check ps-0 custom-form-check">
                                                <input type="checkbox" class="checkbox_animated check-it" id="ct{{$category->id}}" name="categories"  value="{{$category->id}}" onchange="filterProductsByCategory(this)">
                                                <label class="form-check-label">{{$category->name}}</label>
                                            </div>
                                        </li>
                                    @empty

                                    @endforelse
                                    {{-- <li class="current-cat"><a href="#">أزياء</a></li>
                                    <li><a href="#">مستحضرات تجميل</a></li>
                                    <li><a href="#">أثاث</a></li>
                                    <li><a href="#">الاجهزة</a></li>
                                    <li><a href="#">العاب</a></li>
                                    <li><a href="#">طبي</a></li>
                                    <li><a href="#">بناء</a></li>
                                    <li><a href="#">مواد التنظيف</a></li> --}}
                                </ul>
                            </div>
                        </div>

                        <a href="" class="axil-btn btn-bg-primary">اعادة الكل</a>
                    </div>
                    <!-- End .axil-shop-sidebar -->
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12" data-aos="" data-aos-easing="ease-out-cubic"
                            data-aos-duration="2000">
                            <div class="axil-shop-top mb--40">
                                <div
                                    class="category-select align-items-center justify-content-lg-end justify-content-between">
                                    <!-- Start Single Select  -->
                                    <select class="single-select" name="size" id="pagesize">
                                        <option value="15" {{$size == 15 ? 'selected':''}}>15 Products Per Page</option>
                                        <option value="30" {{$size == 30 ? 'selected':''}}>30 Products Per Page</option>
                                        <option value="50" {{$size == 50 ? 'selected':''}}>50 Products Per Page</option>
                                        <option value="100" {{$size == 100 ? 'selected':''}}>100 Products Per Page</option>
                                    </select>
                                    <select class="single-select" name="order" id="orderby">
                                        <option value="-1" {{$order == -1 ? 'selected':''}}>Default</option>
                                        <option value="1" {{$order == 1 ? 'selected':''}}>ترتيب حسب الاحدث</option>
                                        <option value="2" {{$order == 2 ? 'selected':''}}>ترتيب حسب الاقدم</option>
                                        <option value="3" {{$order == 3 ? 'selected':''}}>ترتيب حسب الاسم</option>
                                        {{-- <option>ترتيب حسب السعر</option> --}}
                                    </select>
                                    <div style="border:2px solid; color:#CBD3D9;width: auto; margin: 10px;padding-right: 43px;"  >
                                        <input  type="text" name="search" value="" >
                                    </div>
                                    <!-- End Single Select  -->
                                </div>
                                <div class="d-lg-none">
                                    <button class="product-filter-mobile filter-toggle"><i class="fas fa-filter"></i>بحث</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .row -->
                    <div class="row row--15" data-aos="" data-aos-offset="300"
                        data-aos-easing="ease-in-sine" data-aos-duration="1000">
                        @forelse ($products as $product)
                        <!-- Start of single product -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="axil-product product-style-one mb--30">
                                    <div class="thumbnail">
                                        <a href="{{route('product.show',$product->slug)}}">
                                            <img src="{{$product->image_url}}"
                                                alt="Product Images" style="width:300px;  height:300px;">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="select-option"><a href="{{route('product.show',$product->slug)}}">اطلب المنتج </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="{{route('product.show',$product->slug)}}">{{$product->name}}</a>
                                            </h5>
                                            <div class="product-price-variant">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- End of single product -->
                        @empty

                        @endforelse
                    </div>

                    <div class="text-center pt--20">
                        {{$products->withQueryString()->links()}}
                        {{-- <a href="#" class="axil-btn btn-bg-lighter btn-load-more">تحميل المزيد</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Shop Area  -->


</main>
<form id="frmFilter" method="GET">
    <input type="hidden" name="page" id="page" value="{{$page}}">
    <input type="hidden" name="size" id="size" value="{{$size}}">
    <input type="hidden" name="order" id="order" value="{{$order}}">
    {{-- <input type="hidden" name="categories" id="categories" value="{{$q_categories}}"> --}}

</form>
@endsection


@push('script')
    <script>
        $('#pagesize').on("change",function(){
            $("#size").val($("#pagesize option:selected").val());
            $('#frmFilter').submit();
        });
        $('#orderby').on("change",function(){
            $("#order").val($("#orderby option:selected").val());
            $('#frmFilter').submit();
        });

        function filterProductsByCategory(brand){
            var categories = "";
            $("input[name='categories']:checked").each(function(){
                if(categories=="")
                {
                    categories += this.value;
                }
                else{
                    categories += "," + this.value;
                }
            });
            $("#categories").val(categories);
            $("#frmFilter").submit();
        }
    </script>

@endpush
