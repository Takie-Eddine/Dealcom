@extends('user.dashboard.layouts.admin')


@section('title', 'Add Complaint')


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
                            <a href="{{route('index')}}" class="text-muted text-hover-primary">{{__('master.home')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('complaints')}}" class="text-muted text-hover-primary">{{__('master.complaints')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.add complaint')}}</li>
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
                        <div class="card-title fs-3 fw-bold">{{__('master.add complaint')}}</div>
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
                    <form class="form" action="{{route('complaints.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body p-9">
                                <div class="row mb-8">
                                    <!--begin::Label-->
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">
                                        <span class="required">{{__('master.complaint type')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-9 fv-row">
                                        <select id="complaintType" name="type" aria-label="Select a complaint type" data-control="select2" data-placeholder="{{__('master.complaint type')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                            <option value="">{{__('master.select complaint type')}}</option>
                                            <option value="product"  @selected('product' == old('type'))>{{__('master.product complaint')}}</option>
                                            <option value="request"  @selected('request' == old('type'))>{{__('master.request complaint')}}</option>
                                            <option value="other"  @selected('other' == old('type'))>{{__('master.other')}}</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                            <!--begin::Row-->
                                <div id="otherInput" class="row mb-8" style="display:none;">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3"><span class="required">{{__('master.title')}}</span></div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="other" value="{{old('other')}}" placeholder="{{__('master.title')}}" />
                                    </div>
                                </div>
                                <div id="productCodeInput" class="row mb-8" style="display:none;">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3"><span class="required">{{__('master.product')}}</span></div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="product_code" value="{{old('product_code')}}" placeholder="{{__('master.code')}}" />
                                    </div>
                                </div>
                                <div id="requestInput" class="row mb-8" style="display:none;">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3"><span class="required">{{__('master.request')}}</span></div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="request" value="{{old('request')}}" placeholder="{{__('master.request')}}" />
                                    </div>
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
<script>
$(document).ready(function() {
    $('#complaintType').change(function() {
        var selectedOption = $(this).val();

        // Hide all input fields
        $('#productCodeInput').hide();
        $('#requestInput').hide();
        $('#otherInput').hide();

        // Show input field based on selected option
        if(selectedOption === 'product') {
            $('#productCodeInput').show();
            $('#requestInput').remove();
            $('#otherInput').remove();
            $('#complaintType').prop('disabled', true);
        } else if(selectedOption === 'request') {
            $('#requestInput').show();
            $('#productCodeInput').remove();
            $('#otherInput').remove();
            $('#complaintType').prop('disabled', true);
        } else if(selectedOption === 'other') {
            $('#otherInput').show();
            $('#productCodeInput').remove();
            $('#requestInput').remove();
            $('#complaintType').prop('disabled', true);
        }
    });
});
</script>
@endpush
