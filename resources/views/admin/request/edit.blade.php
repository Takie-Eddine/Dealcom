@extends('admin.layouts.admin')


@section('title', 'Edit Request')


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
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">{{__('master.home')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.request')}}" class="text-muted text-hover-primary">{{__('master.request')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.edit request')}}</li>
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
                        <div class="card-title fs-3 fw-bold">{{__('master.edit request')}}</div>
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
                    <form class="form" action="{{route('admin.request.update',$request->id)}}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="product_id" value="{{$request->product_id}}">
                        <!--begin::Card body-->
                        <div class="card-body p-9">
                            <!--begin::Row-->
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3"><span class="">{{__('master.name')}}</span></div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <input type="text" class="form-control form-control-solid" name="name" @if ($request->product)
                                            value="{{$request->product->name}}"
                                        @else
                                            value="{{old('name')}}"
                                        @endif  placeholder="{{__('master.name')}}" />
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
                                        <input type="text" class="form-control form-control-solid" name="category" value="{{$request->details->category}}" placeholder="{{__('master.category')}}" />
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
                                        <input type="number" class="form-control form-control-solid" min="0" name="quantity" value="{{$request->details->quantity}}" placeholder="{{__('master.quantity')}}" />
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
                                            <option value="piece"  @selected('piece' == $request->details->unit)>{{__('master.piece')}}</option>
                                            <option value="box"  @selected('box' == $request->details->unit)>{{__('master.box')}}</option>
                                            <option value="container"  @selected('container' == $request->details->unit)>{{__('master.container')}}</option>
                                            <option value="dozen"  @selected('dozen' == $request->details->unit)>{{__('master.dozen')}}</option>
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
                                                <option value="{{$country}}"  @selected($country == $request->details->country)>{{$value}}</option>
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
                                    <div class="col-lg-9 fv-row">
                                        <select name="shipping method" aria-label="Select a shipping method" data-control="select2" data-placeholder="{{__('master.select shipping method')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                            <option value="">{{__('master.select shipping method')}}</option>
                                            <option value="sea freight"  @selected('sea freight' == $request->details->shipping_type)>{{__('master.sea freight')}}</option>
                                            <option value="air freight"  @selected('air freight' == $request->details->shipping_type)>{{__('master.air freight')}}</option>
                                            <option value="land freight"  @selected('land freight' == $request->details->shipping_type)>{{__('master.land freight')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-8">
                                    <!--begin::Label-->
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">
                                        <span class="required">{{__('master.status')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-9 fv-row">
                                        <select name="status" aria-label="Select a status" data-control="select2" data-placeholder="{{__('master.select status')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                            <option value="">{{__('master.select status')}}</option>
                                            <option value="approved" {{ old('status', $request->status) == 'approved' ? 'selected' : '' }}>{{__('master.approved')}}</option>
                                                    <option value="pending" {{ old('status', $request->status) == 'pending' ? 'selected' : '' }}>{{__('master.pending')}}</option>
                                                    <option value="canceled" {{ old('status', $request->status) == 'canceled' ? 'selected' : '' }}>{{__('master.canceled')}}</option>
                                                    <option value="ordered" {{ old('status', $request->status) == 'ordered' ? 'selected' : '' }}>{{__('master.ordered')}}</option>
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
                                        <textarea name="description" class="form-control form-control-solid" id="" cols="30" rows="10" placeholder="{{__('master.description')}}">{{$request->details->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3"><span class="">{{__('master.offer')}}</span></div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <input type="file" class="form-control form-control-solid" name="offer"  placeholder="{{__('master.offer')}}" />
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
