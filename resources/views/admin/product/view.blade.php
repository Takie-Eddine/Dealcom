@extends('admin.layouts.admin')


@section('title', 'View Product')


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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{__('master.product')}}</h1>
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
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.product')}}" class="text-muted text-hover-primary">{{__('master.products')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.view product')}}</li>
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
                <!--begin::Home card-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-lg-20">
                        <!--begin::Section-->
                        <div class="mb-17">
                            <!--begin::Title-->
                            <h3 class="text-dark mb-7">{{$product->name}}</h3>
                            <!--end::Title-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed mb-9"></div>
                            <!--end::Separator-->
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <!--begin::Feature post-->
                                    <div class="h-100 d-flex flex-column justify-content-between pe-lg-6 mb-lg-0 mb-10">
                                        <!--begin::Video-->
                                        <div class="mb-3">
                                            <img class="embed-responsive-item card-rounded h-275px w-100" src="{{$product->image_url}}" allowfullscreen="allowfullscreen">
                                        </div>
                                        <!--end::Video-->
                                        <!--begin::Body-->
                                        <div class="mb-5">
                                            <!--begin::Title-->
                                            <a href="#" class="fs-2 text-dark fw-bold text-hover-primary text-dark lh-base">{{$product->name}}
                                                @if ($product->status == 'active')
                                                    <a href="{{route('admin.product.activate',$product->id)}}"><span class="badge badge-light-success fw-bold my-2">{{$product->status}}</span></a>
                                                @endif

                                                @if ($product->status == 'draft')
                                                    <a href="{{route('admin.product.activate',$product->id)}}"><span class="badge badge-light-warning fw-bold my-2">{{$product->status}}</span></a>
                                                @endif

                                                @if ($product->status == 'archived')
                                                    <a href="{{route('admin.product.activate',$product->id)}}"><span class="badge badge-light-danger fw-bold my-2">{{$product->status}}</span></a>
                                                @endif

                                                @if ($product->approved == 0)
                                                    <a href="{{route('admin.product.approve',$product->id)}}"><span class="badge badge-light-danger fw-bold my-2">{{__('master.not approved')}}</span></a>
                                                @else
                                                    <a href="{{route('admin.product.approve',$product->id)}}"><span class="badge badge-light-success fw-bold my-2">{{__('master.approved')}}</span></a>
                                                @endif

                                                @if ($product->featured == 0)
                                                    <a href="{{route('admin.product.feature',$product->id)}}"><span class="badge badge-light-danger fw-bold my-2">{{__('master.not featured')}}</span></a>
                                                @else
                                                    <a href="{{route('admin.product.feature',$product->id)}}"><span class="badge badge-light-success fw-bold my-2">{{__('master.featured')}}</span></a>
                                                @endif
                                                <br /><h6>{{$product->code}}</h6>
                                            </a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-semibold fs-5 text-gray-600 text-dark mt-4">{!!$product->description!!}</div>
                                            <div class="fs-5 fw-bold">
                                                <a href="{{route('admin.category.show',$product->category->id)}}" class="text-gray-700 text-hover-primary">{{__('master.category')}} </a>
                                                <span class="text-muted">{{$product->category->name}}</span>
                                            </div>
                                            <div class="fs-5 fw-bold">
                                                <a  class="text-gray-700 text-hover-primary">{{__('master.base price')}} </a>
                                                <span class="text-muted">{{$product->price?? '0'}}$</span>
                                            </div>
                                            <div class="fs-5 fw-bold">
                                                <a  class="text-gray-700 text-hover-primary">{{__('master.sku')}} </a>
                                                <span class="text-muted">{{$product->sku}}</span>
                                            </div>
                                            <div class="fs-5 fw-bold">
                                                <a  class="text-gray-700 text-hover-primary">{{__('master.minimum quantity')}} </a>
                                                <span class="text-muted">{{$product->quantity ?? '__'}}</span>
                                            </div>
                                            <div class="fs-5 fw-bold">
                                                <a  class="text-gray-700 text-hover-primary">{{__('master.other terms')}} </a>
                                                <span class="text-muted">{{$product->terms ?? '__'}}</span>
                                            </div>
                                            <div class="fs-5 fw-bold">
                                                <a  class="text-gray-700 text-hover-primary">{{__('master.delivery')}} </a>
                                                <span class="text-muted">{{$product->delivery ?? '__'}}</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Body-->
                                        <!--begin::Footer-->
                                        {{-- <div class="d-flex flex-stack flex-wrap">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center pe-2">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle me-3">
                                                    <img alt="" src="assets/media/avatars/300-9.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Text-->
                                                <div class="fs-5 fw-bold">
                                                    <a href="../../demo1/dist/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">David Morgan</a>
                                                    <span class="text-muted">on Apr 27 2021</span>
                                                </div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Label-->
                                            <span class="badge badge-light-primary fw-bold my-2">TUTORIALS</span>
                                            <!--end::Label-->
                                        </div> --}}
                                        <!--end::Footer-->
                                    </div>
                                    <!--end::Feature post-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 justify-content-between d-flex flex-column">
                                    <!--begin::Post-->
                                    <div class="ps-lg-6 mb-16 mt-md-0 mt-17">
                                        <!--begin::Body-->
                                        <div class="mb-6">
                                            <!--begin::Title-->
                                            <a href="{{route('admin.supplier.show',$product->supplier->id)}}" class="fw-bold text-dark mb-4 fs-2 lh-base text-hover-primary">{{$product->supplier->name}}
                                                @if ($product->supplier->status == 'active')
                                                    <span class="badge badge-light-success fw-bold my-2">{{$product->supplier->status}}</span>
                                                @endif
                                                @if ($product->supplier->status == 'inactive')
                                                    <span class="badge badge-light-warning fw-bold my-2">{{$product->supplier->status}}</span>
                                                @endif
                                                @if ($product->supplier->status == 'archived')
                                                    <span class="badge badge-light-danger fw-bold my-2">{{$product->supplier->status}}</span>
                                                @endif
                                            </a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-semibold fs-5 mt-4 text-gray-600 text-dark">{!!$product->supplier->description!!}</div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Body-->
                                        <!--begin::Footer-->
                                        <div class="d-flex flex-stack flex-wrap">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center pe-2">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-60px symbol me-3">
                                                    <img src="{{$product->supplier->image_url}}" class="" alt="" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Text-->
                                                {{-- <div class="fs-5 fw-bold">
                                                    <a href="../../demo1/dist/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">Jane Miller</a>
                                                    <span class="text-muted">on Apr 27 2021</span>
                                                </div> --}}
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Label-->
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Footer-->
                                    </div>
                                    <!--end::Post-->
                                    <!--begin::Post-->
                                    <div class="ps-lg-6 mb-16">
                                        <!--begin::Body-->
                                        <div class="mb-6">
                                            <!--begin::Title-->
                                            <a href="{{route('admin.brand.show',$product->brand->id)}}" class="fw-bold text-dark mb-4 fs-2 lh-base text-hover-primary">{{$product->brand->name}}
                                            @if ($product->brand->status == 'active')
                                                <span class="badge badge-light-success fw-bold my-2">{{$product->brand->status}}</span>
                                            @endif
                                            @if ($product->brand->status == 'inactive')
                                                <span class="badge badge-light-warning fw-bold my-2">{{$product->brand->status}}</span>
                                            @endif
                                            @if ($product->brand->status == 'archived')
                                                <span class="badge badge-light-danger fw-bold my-2">{{$product->brand->status}}</span>
                                            @endif
                                            </a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-semibold fs-5 mt-4 text-gray-600 text-dark">{!!$product->brand->description!!}</div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Body-->
                                        <!--begin::Footer-->
                                        <div class="d-flex flex-stack flex-wrap">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center pe-2">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-60px symbol me-3">
                                                    <img src="{{$product->brand->image_url}}" class="" alt="" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Text-->
                                                {{-- <div class="fs-5 fw-bold">
                                                    <a href="../../demo1/dist/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">Cris Morgan</a>
                                                    <span class="text-muted">on Mar 14 2021</span>
                                                </div> --}}
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Label-->
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Footer-->
                                    </div>
                                    <!--end::Post-->
                                    <!--begin::Post-->
                                    <div class="ps-lg-6">
                                        <!--begin::Body-->
                                        {{-- <div class="mb-6">
                                            <!--begin::Title-->
                                            <a href="#" class="fw-bold text-dark mb-4 fs-2 lh-base text-hover-primary">React Admin Theme - How To Get Started Tutorial. Create best applications</a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-semibold fs-5 mt-4 text-gray-600 text-dark">We’ve been focused on making the from v4 to v5 but we’ve also not been afraid to step away been focused</div>
                                            <!--end::Text-->
                                        </div> --}}
                                        <!--end::Body-->
                                        <!--begin::Footer-->
                                        <div class="d-flex flex-stack flex-wrap">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center pe-2">
                                                @forelse ($product->variants as $variant)
                                                    <div class="fs-5 fw-bold">
                                                        <a  class="text-gray-700 text-hover-primary">{{$variant->name}}</a>
                                                        @forelse ($product->attributes as $attribute)
                                                            <span class="text-muted">{{$attribute->value}},</span>
                                                        @empty

                                                        @endforelse
                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Label-->
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Footer-->
                                    </div>
                                    <!--end::Post-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--begin::Row-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Section-->

                        <!--end::Section-->
                        <!--begin::Section-->

                        <!--end::Section-->
                        <!--begin::latest instagram-->
                        <div class="">
                            <!--begin::Section-->
                            <div class="m-0">
                                <!--begin::Content-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Title-->
                                    <h3 class="text-dark">{{__('master.media')}}</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed border-gray-300 mb-9 mt-5"></div>
                                <!--end::Separator-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Row-->
                            <div class="row g-10 row-cols-2 row-cols-lg-5">
                                <!--begin::Col-->
                                @forelse ($product->images as $image)
                                    <div class="col">
                                        <!--begin::Overlay-->
                                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{asset('assets/images/product_images/'.$image->name)}}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{asset("assets/images/product_images/".$image->name)}}')"></div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                    </div>
                                @empty

                                @endforelse

                                <!--end::Col-->
                            </div>
                            <!--begin::Row-->
                        </div>
                        <!--end::latest instagram-->
                        <div class="">
                            <!--begin::Section-->
                            <div class="m-0">
                                <!--begin::Content-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Title-->
                                    <h3 class="text-dark"></h3>
                                    <!--end::Title-->
                                    <!--begin::Link-->
                                    <div >
                                        <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-light-primary">{{__('master.edit')}}</a>
                                        <a href="{{route('admin.product.delete',$product->id)}}" class="btn btn-light-danger">{{__('master.delete')}}</a>
                                    </div>
                                    <!--end::Link-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Separator-->
                                <!--end::Separator-->
                            </div>
                            <!--end::Section-->
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Home card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>

@endsection


@push('script')
    <script src="{{asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
	<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@endpush
