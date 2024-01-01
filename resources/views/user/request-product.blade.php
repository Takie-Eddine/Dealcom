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
