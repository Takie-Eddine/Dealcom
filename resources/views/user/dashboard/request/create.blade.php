@extends('user.dashboard.layouts.admin')


@section('title', 'Add Request')


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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{__('master.request')}}</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('index')}}" class="text-muted text-hover-primary">{{__('master.home')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('request')}}" class="text-muted text-hover-primary">{{__('master.request')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.add request')}}</li>
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
                        <div class="card-title fs-3 fw-bold">{{__('master.add request')}}</div>
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
                    <form class="form" action="{{route('request.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body p-9">
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
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3"><span class="">{{__('master.category')}}</span></div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="category" value="{{old('category')}}" placeholder="{{__('master.category')}}" />
                                    </div>
                                </div>
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3"><span class="required">{{__('master.quantity')}}</span></div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <input type="number" class="form-control form-control-solid" min="0" name="quantity" value="{{old('quantity')}}" placeholder="{{__('master.quantity')}}" />
                                    </div>
                                </div>
                                <div class="row mb-8">
                                    <!--begin::Label-->
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">
                                        <span class="required">{{__('master.unit')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <select name="unit" aria-label="Select a Unit" data-control="select2" data-placeholder="{{__('master.select Unit')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                            <option value="">{{__('master.select Unit')}}</option>
                                            @foreach ($attributes as $attribute)
                                                <option value="{{$attribute->name}}"  @selected($attribute->name == old('unit'))>{{$attribute->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-8">
                                    <!--begin::Label-->
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">
                                        <span class="required">{{__('master.country')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-9 fv-row">
                                        <select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="{{__('master.select country')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                            <option value="">{{__('master.select country')}}</option>
                                            @foreach ($countries as $country => $value)
                                                <option value="{{$country}}"  @selected($country == old('country'))>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-8">
                                    <!--begin::Label-->
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">
                                        <span class="required">{{__('master.shipping method')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-9 fv-row">
                                        <select name="shipping method" aria-label="Select a shipping method" data-control="select2" data-placeholder="{{__('master.select shipping method')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                            <option value="">{{__('master.select shipping method')}}</option>
                                            <option value="sea freight"  @selected('sea freight' == old('shipping method'))>{{__('master.sea freight')}}</option>
                                            <option value="air freight"  @selected('air freight' == old('shipping method'))>{{__('master.air freight')}}</option>
                                            <option value="land freight"  @selected('land freight' == old('shipping method'))>{{__('master.land freight')}}</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3"><span class="required">{{__('master.description')}}</span></div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <textarea name="description" class="form-control form-control-solid" id="" cols="30" rows="10" placeholder="{{__('master.description')}}">{{old('description')}}</textarea>
                                    </div>
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
