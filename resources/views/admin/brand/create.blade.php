@extends('admin.layouts.admin')


@section('title', 'Add Brand')


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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{__('master.brand')}}</h1>
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
                            <a href="{{route('admin.brand')}}" class="text-muted text-hover-primary">{{__('master.brands')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.add brand')}}</li>
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
                        <div class="card-title fs-3 fw-bold">{{__('master.add brand')}}</div>
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
                    <form class="form" action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body p-9">
                            <!--begin::Row-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('master.logo')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset("assets/media/svg/avatars/blank.svg")}}')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('{{asset("assets/media/svg/brand-logos/volicity-9.svg")}}')"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
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
                                    <div class="fs-6 fw-semibold mt-2 mb-3"><span class="required">{{__('master.code')}}</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" name="code" value="{{old('code')}}" placeholder="{{__('master.code')}}" />
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('master.description')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <textarea name="description" class="form-control form-control-solid h-100px" placeholder="{{__('master.description')}}">{{old('description')}}</textarea>
                                </div>
                                <!--begin::Col-->
                            </div>
                            <!--end::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3"><span class="required">{{__('master.contact phone')}}</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" name="phone" class="form-control form-control-solid" placeholder="{{__('master.contact phone')}}" value="{{old('phone')}}"/>
                                </div>
                                <!--begin::Col-->
                            </div>

                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('master.contact phone')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" name="office_phone" class="form-control form-control-solid" placeholder="{{__('master.contact phone')}}" value="{{old('office_phone')}}" />
                                </div>
                                <!--begin::Col-->
                            </div>

                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3"><span class="required">{{__('master.email')}}</span></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="email" name="email" class="form-control form-control-solid" placeholder="{{__('master.email')}}" value="{{old('email')}}" />
                                </div>
                                <!--begin::Col-->
                            </div>

                            <div class="row mb-8">
                                <!--begin::Label-->
                                <div class="col-xl-3">
                                    <label class="fs-6 fw-semibold mt-2 mb-3">
                                        <span class="required">{{__('master.country')}}</span>
                                    </label>
                                </div>

                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="{{__('master.select country')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="">{{__('master.select country')}}</option>
                                        @foreach ($countries as $country => $value)
                                            <option value="{{$country}}"  @selected($country == old('country'))>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-8">
                                <!--begin::Label-->
                                <div class="col-xl-3">
                                    <label class="fs-6 fw-semibold mt-2 mb-3">{{__('master.city')}} </label>

                                </div>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" name="city" class="form-control form-control-lg form-control-solid" placeholder="{{__('master.city')}}" value="{{old('city')}}" />
                                </div>
                                <!--end::Col-->
                            </div>

                            <div class="row mb-8">
                                <!--begin::Label-->
                                <div class="col-xl-3">
                                    <label class="fs-6 fw-semibold mt-2 mb-3">{{__('master.postal code')}} </label>

                                </div>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" name="postal_code" class="form-control form-control-lg form-control-solid" placeholder="{{__('master.postal code')}}" value="{{old('postal_code')}}" />
                                </div>
                                <!--end::Col-->
                            </div>

                            <div class="row mb-8">
                                <!--begin::Label-->
                                <div class="col-xl-3">
                                    <label class="fs-6 fw-semibold mt-2 mb-3"><span class="required">{{__('master.address')}} </span></label>
                                </div>

                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" name="address" class="form-control form-control-lg form-control-solid" placeholder="{{__('master.address')}}" value="{{old('address')}}" />
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
