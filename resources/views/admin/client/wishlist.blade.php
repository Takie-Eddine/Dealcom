@extends('admin.layouts.admin')


@section('title', 'User')


@push('style')

@endpush

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{__('master.user')}}</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">{{__('master.home')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.clients')}}" class="text-muted text-hover-primary">{{__('master.users')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.wishlist')}}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->

            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Navbar-->
                @include('admin.client.header')
                <!--end::Navbar-->
                <!--begin::Toolbar-->
                <div class="d-flex flex-wrap flex-stack mb-6">
                    <!--begin::Title-->
                    <h3 class="fw-bold my-2">{{__('master.wishlist')}}
                    <span class="fs-6 text-gray-400 fw-semibold ms-1">({{$wishlist->count()}})</span></h3>
                    <!--end::Title-->
                    <!--begin::Controls-->
                    <div class="d-flex align-items-center my-2">

                    </div>
                    <!--end::Controls-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Row-->
                <div class="row g-6 g-xl-9">
                    @forelse ($wishlist as $wishlist)
                        <!--begin::Col-->
                        <div class="col-sm-6 col-xl-4">
                            <!--begin::Card-->
                            <div class="card h-100">
                                <!--begin::Card header-->
                                <div class="card-header flex-nowrap border-0 pt-9">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <!--begin::Icon-->
                                        <div class="symbol symbol-45px w-45px bg-light me-5">
                                            <img src="{{$wishlist->product->image_url}}" alt="image" class="p-3" />
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <a href="{{route('admin.product.show',$wishlist->product_id)}}" class="fs-4 fw-semibold text-hover-primary text-gray-600 m-0">{{$wishlist->product->name}}</a>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                    @empty
                    @endforelse
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

</div>

@endsection


@push('script')

<script src="{{asset('assets/js/custom/pages/user-profile/general.js')}}"></script>
<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/type.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/details.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/finance.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/complete.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/main.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
@endpush
