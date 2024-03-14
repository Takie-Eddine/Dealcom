@extends('welcome')


@section('title', 'Private Label')

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
                                <h2 class="title mb-md-2">{{__('master.get product')}} </h2>
                                <span class="joining-date">{{__('master.fill out')}}</span>
                            </div>
                        </div>
                    </div>

                    @guest
                        <div class="container py-4 mb-md-5 form-div" style="background-color: #eee;">
                            <p class="lead text-dark fs-3 mb-4">{{__('master.no account')}} <a
                                    class="second-link" href="{{route('register')}}">{{__('master.register here')}} </a>
                            </p>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <h5>Error Occured!</h5>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="row g-2 justify-content-center" action="{{route('login')}}" method="POST" >
                                @csrf
                                <div class="col-6">
                                    <label for="inputEmail" class="visually-hidden">{{__('master.email')}} </label>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" id="inputEmail" placeholder="{{__('master.email')}}">
                                </div>
                                <div class="col-6">
                                    <label for="inputPassword" class="visually-hidden"> {{__('master.password')}}</label>
                                    <input type="password" class="form-control" name="password"  id="inputPassword" placeholder=" {{__('master.password')}}">
                                </div>
                                <div class="row">
                                    <div class="col-4 mt-md-3">
                                        <button type="submit" class="btn btn-primary btn-lg mb-2 second-bg-color">
                                            <span class="fs-4">{{__('master.login')}} </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endguest




                    <div class="container py-4 mb-md-5 form-div" style="background-color: #dff8ed;">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h5>Error Occured!</h5>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <p class="lead text-dark fs-3 mb-4">{{__('master.product details')}} </p>
                        <form action="{{route('private.store')}}" method="POST">
                            @csrf
                            <div class="row g-2 justify-content-center mb-md-4">
                                <div class="col-6">
                                    <label for="inputPassword" class="visually-hidden">{{__('master.quantity')}} </label>
                                    <input type="number" name="quantity" value="{{old('quantity')}}" class="form-control" min="1" id="inputPassword" placeholder="{{__('master.quantity')}}*">
                                </div>
                                <div class="col-6">
                                    <label for="inputName" class="visually-hidden">{{__('master.unit')}} </label>
                                    <select name="unit" aria-label="Select a shipping method" data-control="select2" data-placeholder="{{__('master.unit')}}*" class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="">{{__('master.unit')}}*</option>
                                        <option value="piece"  @selected('piece' == old('unit'))>{{__('master.piece')}}</option>
                                        <option value="box"  @selected('box' == old('unit'))>{{__('master.box')}}</option>
                                        <option value="container"  @selected('container' == old('unit'))>{{__('master.container')}}</option>
                                        <option value="dozen"  @selected('dozen' == old('unit'))>{{__('master.dozen')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-2 justify-content-center mb-md-4">
                                <div class="col-6">
                                    <label for="inputEmail" class="visually-hidden">{{__('master.country')}}* </label>
                                    <select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="{{__('master.select country')}}*" class="form-select form-select-solid form-select-lg fw-semibold">
                                    @foreach ($countries as $country => $value)
                                        <option value="{{$country}}"  @selected($country == old('country'))>{{$value}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="inputPassword" class="visually-hidden">{{__('master.shipping method')}} </label>
                                    <select name="shipping method" aria-label="Select a shipping method" data-control="select2" data-placeholder="{{__('master.select shipping method')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="">{{__('master.select shipping method')}}*</option>
                                        <option value="sea freight"  @selected('sea freight' == old('shipping method'))>{{__('master.sea freight')}}</option>
                                        <option value="air freight"  @selected('air freight' == old('shipping method'))>{{__('master.air freight')}}</option>
                                        <option value="land freight"  @selected('land freight' == old('shipping method'))>{{__('master.land freight')}}</option>
                                    </select>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="exampleFormControlTextarea1" class="visually-hidden required">{{__('master.description')}}</label>
                                    <textarea name="description" class="form-control" rows="8" placeholder="{{__('master.description')}}*">{{old('description')}}</textarea>

                                </div>
                            </div>


                            <div class="row">
                                @auth
                                    <div class="col-4 mt-md-3">
                                        <button type="submit" class="btn btn-primary btn-lg mb-2 second-bg-color py-3">
                                            <span class="fs-4">{{__('master.get a quote')}} </span>
                                        </button>
                                    </div>
                                @endauth
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>

        <!-- Start About Area  -->
        @if ($content_top)
            <div class="axil-about-area about-style-2">
                <div class="container">

                    <div class="row align-items-center">
                        <div class="col-lg-5 order-lg-2">
                            <div class="about-thumbnail">
                                <!-- <img src="https://via.placeholder.com/400x300" alt="about"> -->
                                <img src="{{$content_top->image_url}}">
                            </div>
                        </div>
                        <div class="col-lg-7 order-lg-1">
                            <div class="about-content content-left">
                                <h4 class="title"> {{$content_top->title}}</h4>
                                <div class="how-to-sell">{!!$content_top->sub_title!!}</div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        @endif

        <!-- End About Area  -->




        <div class="section-spreator mt-5">
            <div class="container ">
                <div class="row pt-3">
                    <div class="col-md-6">
                        <h3>{{__('master.company sponsoring')}} </h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="service-area mt-5">
            <div class="container">
                <div class="row ">
                    @forelse ($brands as $brand)
                        <div class="col-6 col-md-2">
                            <div class="service-box">
                                <img src="{{$brand->image_url}}" alt="Service">
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>

        <div class="section-spreator mt-5">
            <div class="container ">
                <div class="row pt-3">
                    <div class="col-md-6">
                        <h3>{{__('master.request')}}</h3>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start About Area  -->
        @if ($content_center)
            <div class="axil-about-area about-style-2 mb-md-5">
                <div class="container">

                    <div class="row align-items-center">
                        <div class="col-lg-5 order-lg-2">
                            <div class="about-thumbnail">
                                    <img src="{{$content_center->image_url}}">
                            </div>
                        </div>
                        <div class="col-lg-7 order-lg-1">
                            <div class="about-content content-left">
                                <h4 class="title">{{$content_center->title}}</h4>
                                <div class="how-to-sell">{!!$content_center->sub_title!!}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif

        <!-- End About Area  -->








    </main>
@endsection


@push('script')


@endpush
