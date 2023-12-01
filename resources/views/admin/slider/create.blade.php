@extends('admin.layouts.admin')


@section('title', 'Add Slider')


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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{__('master.slider')}}</h1>
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
                            <a href="{{route('admin.slider')}}" class="text-muted text-hover-primary">{{__('master.slider')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.add slider')}}</li>
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
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title fs-3 fw-bold">{{__('master.add slider')}}</div>
                        <!--end::Card title-->
                    </div>
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
                    <!--end::Card header-->
                    <!--begin::Form-->
                    <form class="form" action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body p-9">
                            <!--begin::Row-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('master.slider')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <input type="file" class="form-control" name="image">
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">{{__('master.allowed')}}.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3"><span class="required">{{__('master.name')}}</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="name" value="{{old('name')}}" placeholder="{{__('master.name')}}" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3"><span class="">{{__('master.link')}}</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="link" value="{{old('link')}}" placeholder="{{__('master.link')}}" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <div class="row mb-8">
                                <!--begin::Label-->
                                <div class="col-xl-3">
                                    <label class="fs-6 fw-semibold mt-2 mb-3">
                                        <span class="required">{{__('master.page')}}</span>
                                    </label>
                                </div>

                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <select name="page" aria-label="Select a Page" data-control="select2" data-placeholder="{{__('master.select page')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="">{{__('master.select a page')}}</option>
                                        <option value="home" @selected('home' == old('page'))>{{__('master.home')}}</option>
                                        <option value="product" @selected('product' == old('page'))>{{__('master.product')}}</option>
                                        <option value="category" @selected('category' == old('page'))>{{__('master.category')}}</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-8">
                                <!--begin::Label-->
                                <div class="col-xl-3">
                                    <label class="fs-6 fw-semibold mt-2 mb-3">
                                        <span class="required">{{__('master.position')}}</span>
                                    </label>
                                </div>

                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <select name="position" aria-label="Select a Position" data-control="select2" data-placeholder="{{__('master.select position')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="">{{__('master.select position')}}</option>
                                        <option value="top" @selected('top' == old('position'))>{{__('master.top')}}</option>
                                        <option value="center" @selected('center' == old('position'))>{{__('master.center')}}</option>
                                        <option value="bottom" @selected('bottom' == old('position'))>{{__('master.bottom')}}</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-8">
                                <!--begin::Label-->
                                <div class="col-xl-3">
                                    <label class="fs-6 fw-semibold mt-2 mb-3">
                                        <span class="required">{{__('master.locale')}}</span>
                                    </label>
                                </div>

                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <select name="locale" aria-label="Select a Locale" data-control="select2" data-placeholder="{{__('master.select locale')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="" >{{__('master.select locale')}}</option>
                                        <option value="en" @selected('en' == old('locale'))>{{__('master.english')}}</option>
                                        <option value="ar" @selected('ar' == old('locale'))>{{__('master.arabic')}}</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-8">
                                <!--begin::Label-->
                                <div class="col-xl-3">
                                    <label class="fs-6 fw-semibold mt-2 mb-3">
                                        <span class="required">{{__('master.status')}}</span>
                                    </label>
                                </div>

                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <select name="status" aria-label="Select a Status" data-control="select2" data-placeholder="{{__('master.select status')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="">{{__('master.select status')}}</option>
                                        <option value="active" @selected('active' == old('status'))>{{__('master.active')}}</option>
                                        <option value="draft" @selected('draft' == old('status'))>{{__('master.draft')}}</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>

                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes</button>
                        </div>
                        <!--end::Card footer-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Card-->
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
