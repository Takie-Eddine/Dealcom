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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.6/dist/css/uikit.min.css" />
<link rel="stylesheet" href="{{asset('frontend/assets/scss/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/dealcom/css/dealcom-styles.rtl.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/dealcom/css/dealcome-categories.rtl.css')}}">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
@endpush



@section('content')
<main class="main-wrapper mb-5">



    <!-- Slider -->
    <div class="uk-container categories-container mt--70 mb--60">
        <div id="fade-slider">
            <div >

                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                    <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-2@s uk-grid">
                        @forelse ($categories as $category)
                            <li>
                                <a href="{{route('product',$category->slug)}}">
                                    <div class="uk-card uk-card-default clothing-card uk-margin-left uk-margin-right">
                                        <div class="uk-card-media-top uk-margin-top">
                                            <img class="uk-align-center" src="{{$category->image_url}}" alt="" >
                                        </div>
                                        <div class="uk-card-body">
                                            <h3 class="uk-card-title">{{$category->name}}</h3>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty

                        @endforelse

                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                        uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                        uk-slider-item="next"></a>

                </div>

                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

            </div>
        </div>
    </div>

    <!-- End slider -->

    @forelse ($categories as $category)
        <!-- Start Category Item  -->
        <div class="axil-about-area " data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-lg-5 order-lg-2">
                        <div class="about-thumbnail">
                            <a href="#" class="images-preview images-preview06">
                                @if ($category->slug == 'apparel')
                                    <img src="{{$products_1[0]->image_url}}">
                                    <img src="{{$products_1[1]->image_url}}">
                                    <img src="{{$products_1[2]->image_url}}">
                                    <img src="{{$products_1[3]->image_url}}">
                                @endif
                                @if ($category->slug == 'furniture-decor')
                                    <img src="{{$products_2[0]->image_url}}">
                                    <img src="{{$products_2[1]->image_url}}">
                                    <img src="{{$products_2[2]->image_url}}">
                                    <img src="{{$products_2[3]->image_url}}">
                                @endif
                                @if ($category->slug == 'food')
                                    <img src="{{$products_3[0]->image_url}}">
                                    <img src="{{$products_3[1]->image_url}}">
                                    <img src="{{$products_3[2]->image_url}}">
                                    <img src="{{$products_3[3]->image_url}}">
                                @endif
                                @if ($category->slug == 'machines')
                                    <img src="{{$products_4[0]->image_url}}">
                                    <img src="{{$products_4[1]->image_url}}">
                                    <img src="{{$products_4[2]->image_url}}">
                                    <img src="{{$products_4[3]->image_url}}">
                                @endif

                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 order-lg-1">
                        <div class="about-content content-left mb--100">

                            <h4 class="title second-color">{{$category->name}}</h4>

                            @forelse ($category->children as $child)
                                @if ($loop->first || $loop->iteration % 2 == 1)
                                    <div class="uk-child-width-expand@s uk-grid-divider mt--50" uk-grid>
                                @endif
                                @if ($child->products->count()>=0)
                                    <div>
                                        <h4>
                                            <a href="{{route('product',$child->slug)}}">
                                                {{$child->name}}
                                            </a>
                                        </h4>
                                        <ul class="uk-list">
                                            @forelse ($child->children as $_child)
                                                @if ($_child->products->count()>=1 )
                                                    <li>
                                                        <a href="{{route('product',$_child->slug)}}">
                                                            {{$_child->name}}
                                                        </a>
                                                    </li>
                                                @endif
                                            @empty
                                            @endforelse
                                        </ul>
                                    </div>
                                @endif
                                @if ($loop->last || $loop->iteration % 2 == 0)
                                    </div>
                                @endif
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <hr class="text-dark">
        </div>
        <!-- End Category Item  -->
    @empty

    @endforelse





</main>

@endsection


@push('script')
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.6/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.6/dist/js/uikit-icons.min.js"></script>
@endpush
