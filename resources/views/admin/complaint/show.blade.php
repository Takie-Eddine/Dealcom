@extends('admin.layouts.admin')


@section('title', 'Show Complaint')


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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{__('master.complaint')}}</h1>
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
                            <a href="{{route('admin.complaints')}}" class="text-muted text-hover-primary">{{__('master.complaints')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.show complaint')}}</li>
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
                <!--begin::FAQ card-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-lg-15">
                        <!--begin::Classic content-->
                        <div class="mb-13">
                            <!--begin::Intro-->
                            <div class="mb-15">
                                <!--begin::Title-->
                                <h4 class="fs-2x text-gray-800 w-bolder mb-6">{{$complaint->user->name}}</h4>
                                <!--end::Title-->
                                @if ($complaint->product_id)
                                    <!--begin::Text-->
                                    <p class="fw-semibold fs-4 text-gray-600 mb-2">{{$complaint->product->code}}</p>
                                    <!--end::Text-->
                                @endif
                                @if ($complaint->request_id)
                                    <!--begin::Text-->
                                    <p class="fw-semibold fs-4 text-gray-600 mb-2">{{$complaint->request_id}}</p>
                                    <!--end::Text-->
                                @endif
                                @if ($complaint->title)
                                    <!--begin::Text-->
                                    <p class="fw-semibold fs-4 text-gray-600 mb-2">{{$complaint->title}}</p>
                                    <!--end::Text-->
                                @endif

                                <!--begin::Text-->
                                <p class="fw-semibold fs-4 text-gray-600 mb-2">{{$complaint->text}}</p>
                                <!--end::Text-->
                            </div>
                            <!--end::Intro-->
                            <!--begin::Row-->
                            <div class="row mb-12">
                                <!--begin::Col-->
                                <div class="col-md-12 pe-md-10 mb-10 mb-md-0">
                                    <!--begin::Title-->
                                    <h2 class="text-gray-800 fw-bold mb-4">{{__('master.answer')}}</h2>
                                    <!--end::Title-->
                                    <!--begin::Accordion-->
                                    <!--begin::Section-->
                                    <div class="m-0">
                                        <!--begin::Heading-->
                                        <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1">
                                            <!--begin::Icon-->
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <i class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <i class="ki-duotone ki-plus-square toggle-off fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <h4 class="text-gray-700 fw-bold cursor-pointer mb-0"></h4>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div id="kt_job_4_1" class="collapse show fs-6 ms-1">
                                            <!--begin::Text-->
                                            <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">{{$complaint->answer}}</div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Content-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed"></div>
                                        <!--end::Separator-->
                                    </div>
                                    <!--end::Section-->
                                    <!--end::Accordion-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Classic content-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::FAQ card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>
@endsection
@push('script')
<script src="{{asset('assets/js/custom/apps/projects/settings/settings.js')}}"></script>
@endpush
