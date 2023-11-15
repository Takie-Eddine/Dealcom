@extends('admin.layouts.admin')


@section('title', 'PriceList')


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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"> {{__('master.price list')}}</h1>
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
                            <a href="{{route('admin.price-list')}}" class="text-muted text-hover-primary">{{__('master.price lists')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.add price list')}}</li>
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
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                        <!--begin::Form-->
                        <form class="form" action="{{route('admin.price-list.store')}}" method="POST" enctype="multipart/form-data" id="kt_subscriptions_create_new">
                            @csrf
                            <!--begin::Card-->
                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2 class="fw-bold">{{__('master.add price list')}}</h2>
                                    </div>

                                    <!--begin::Card title-->
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
                                <div class="card-body pt-0">
                                    <div class="d-flex flex-column mb-15 fv-row">
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">{{__('master.supplier')}} </span>
                                            </label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="supplier" class="form-select mb-2" data-control="select2" onchange="console.log($(this).val())" data-placeholder="{{__('master.select supplier')}}" data-allow-clear="true" >
                                                    <option></option>
                                                    @forelse ($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}"  @selected( (old('supplier')) == $supplier->id ) > {{$supplier->name}} </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{__('master.upload file')}}</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="file" name="file" id="price_list" class="form-control form-control-lg form-control-solid" placeholder="Please select a file"  />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <a href="{{route('admin.price-list')}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="" class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Card-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>

@endsection


@push('script')

{{-- <script>
    $(function(){
        $("#price_list").fileinput({
            theme:'fas',
            maxFilesize: 1,
            maxFileCount: 10,
            allowedFileTypes:['application/pdf,.doc,.docx,.xls,.xlsx,.csv,.tsv,.ppt,.pptx,.pages,.odt,.rtf'],
            showCancel :true ,
            showRemove: false,
            showUpload: false,
            overwriteInitial:false,
        })
    });
</script> --}}
@endpush
