<div class="card mb-6 mb-xl-9">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
            <!--begin::Image-->
            <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                <img class="mw-50px mw-lg-75px" src="{{$supplier->image_url}}" alt="{{$supplier->name}}" />
            </div>
            <!--end::Image-->
            <!--begin::Wrapper-->
            <div class="flex-grow-1">
                <!--begin::Head-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::Details-->
                    <div class="d-flex flex-column">
                        <!--begin::Status-->
                        <div class="d-flex align-items-center mb-1">
                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">{{$supplier->name}}</a>
                            @if ($supplier->status == 'active')
                                <span class="badge badge-light-success me-auto">{{$supplier->status}}</span>
                            @endif
                            @if ($supplier->status == 'inactive')
                                <span class="badge badge-light-warning me-auto">{{$supplier->status}}</span>
                            @endif
                            @if ($supplier->status == 'archived')
                                <span class="badge badge-light-danger me-auto">{{$supplier->status}}</span>
                            @endif

                        </div>
                        <!--end::Status-->
                        <!--begin::Description-->
                        <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">{{$supplier->description}}</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Actions-->
                    <div class="d-flex mb-4">
                        <!--end::Menu-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Head-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap justify-content-start">
                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap">
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{$supplier->products->count()}}</div>
                            </div>
                            <!--end::Number-->
                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">{{__('master.products')}}</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="0">0</div>
                            </div>
                            <!--end::Number-->
                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">{{__('master.products requested')}}</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="0" data-kt-countup-prefix="">0</div>
                            </div>
                            <!--end::Number-->
                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">{{__('master.orders')}}</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                    </div>
                </div>
                <!--end::Info-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Details-->
        <div class="separator"></div>
        <!--begin::Nav-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <!--begin::Nav item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary py-5 me-6 {{request()->routeIs('admin.supplier.show') ? 'active' : ''}}" href="{{route('admin.supplier.show',$supplier->id)}}">{{__('master.overview')}}</a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary py-5 me-6 {{request()->routeIs('admin.supplier.product') ? 'active' : ''}}" href="{{route('admin.supplier.product',$supplier->id)}}">{{__('master.products')}}</a>
            </li>
            <!--end::Nav item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary py-5 me-6 {{request()->routeIs('admin.supplier.price-list') ? 'active' : ''}}" href="{{route('admin.supplier.price-list',$supplier->id)}}">{{__('master.price list')}}</a>
            </li>
        </ul>
        <!--end::Nav-->
    </div>
</div>
