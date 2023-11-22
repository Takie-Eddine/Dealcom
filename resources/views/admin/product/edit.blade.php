@extends('admin.layouts.admin')


@section('title', 'Edit Product')


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
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
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
                        <li class="breadcrumb-item text-muted">{{__('master.edit product')}}</li>
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
                <!--begin::Form-->
                <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="" action="{{route('admin.product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{__('master.thumbnail')}}</h2>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <!--begin::Image input placeholder-->
                                @if ($product->image_url)
                                    <style>.image-input-placeholder { background-image: url('{{$product->image_url}}'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('{{$product->image_url}}'); }</style>
                                @else
                                    <style>.image-input-placeholder { background-image: url('{{asset("assets/media/svg/files/blank-image.svg")}}'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('{{asset("assets/media/svg/files/blank-image-dark.svg")}}'); }</style>
                                @endif
                                <!--end::Image input placeholder-->
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-150px h-150px"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
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
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">{{__('master.allowed')}}</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Thumbnail settings-->
                        <!--begin::Status-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="required card-title">
                                    <h2>{{__('master.status')}}</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    @if ($product->status == 'active')
                                        <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                    @endif
                                    @if ($product->status == 'draft')
                                        <div class="rounded-circle bg-warning w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                    @endif
                                    @if ($product->status == 'archived')
                                        <div class="rounded-circle bg-danger w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                    @endif

                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <select name="status" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                                    <option></option>
                                    <option value="active" {{$product->status == 'active' ? 'selected' : null}}>{{__('master.active')}}</option>
                                    <option value="draft" {{$product->status == 'draft' ? 'selected' : null}}>{{__('master.draft')}}</option>
                                    <option value="archived" {{$product->status == 'archived' ? 'selected' : null}}>{{__('master.archived')}}</option>
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">{{__('master.set the product status')}}</div>
                                <!--end::Description-->
                                <!--begin::Datepicker-->
                                <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Status-->
                        <!--begin::Category & tags-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{__('master.product details')}}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <!--begin::Label-->
                                <label class="required form-label">{{__('master.categories')}}</label>
                                <!--end::Label-->
                                <!--begin::Select2-->
                                <select name="category" class="form-select mb-2" data-control="select2" data-placeholder="{{__('master.select category')}}" data-allow-clear="true" >
                                    <option></option>
                                    @forelse ($categories as $category)
                                    <option value="{{$category->id }}" @selected($product->category_id == $category->id)>{{$category->name }}</option>
                                    @empty
                                    @endforelse

                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7 mb-7">{{__('master.add product to a category')}}</div>
                                <!--end::Description-->
                                <!--end::Input group-->
                                <!--begin::Button-->
                                <a href="{{route('admin.category.create')}}" class="btn btn-light-primary btn-sm mb-10">
                                <i class="ki-duotone ki-plus fs-2"></i>{{__('master.create new category')}}</a>
                                <!--end::Button-->
                                <!--begin::Input group-->
                                <!--begin::Label-->
                                <label class="form-label d-block">{{__('master.tags')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="kt_tagify_1" name="tags" class="form-control mb-2" value="{{$product->tags->pluck('name')}}" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">{{__('master.add tags to a product')}}</div>
                                <!--end::Description-->
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Category & tags-->
                        <!--begin::Weekly sales-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{__('master.supplier')}}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select store template-->
                                <label for="kt_ecommerce_add_product_store_template" class="required form-label">{{__('master.add supplier to a product')}}</label>
                                <!--end::Select store template-->
                                <!--begin::Select2-->
                                <select name="supplier" class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="{{__('master.select supplier')}}" id="">
                                    <option></option>
                                    @forelse ($suppliers as $supplier)
                                        <option value="{{$supplier->id }}" @selected($product->supplier_id == $supplier->id)>{{$supplier->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Weekly sales-->
                        <!--begin::Template settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{__('master.brand')}}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select store template-->
                                <label for="kt_ecommerce_add_product_store_template" class="required form-label">{{__('master.add brand to a product')}}</label>
                                <!--end::Select store template-->
                                <!--begin::Select2-->
                                <select name="brand" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="{{__('master.select brand')}}" id="kt_ecommerce_add_product_store_template">
                                    <option></option>
                                    @forelse ($brands as $brand)
                                        <option value="{{$brand->id }}" @selected($product->brand_id == $brand->id)>{{$brand->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{__('master.featured')}}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select store template-->
                                <label for="kt_ecommerce_add_product_store_template" class="required form-label">{{__('master.add featured to a product')}}</label>
                                <!--end::Select store template-->
                                <!--begin::Select2-->
                                <select name="featured" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="">
                                    <option></option>
                                    <option value="0" @selected($product->featured == 0)>{{__('master.not featured')}}</option>
                                    <option value="1" @selected($product->featured == 1)>{{__('master.featured')}}</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{__('master.approve')}}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select store template-->
                                <label for="kt_ecommerce_add_product_store_template" class="required form-label">{{__('master.approve product')}}</label>
                                <!--end::Select store template-->
                                <!--begin::Select2-->
                                <select name="approved" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="">
                                    <option></option>
                                    <option value="0" @selected($product->approved == 0)>{{__('master.not approved')}}</option>
                                    <option value="1" @selected($product->approved == 1)>{{__('master.approved')}}</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Template settings-->
                    </div>
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">{{__('master.general')}}</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">{{__('master.advanced')}}</a>
                            </li>
                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{__('master.general')}}</h2>
                                            </div>
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
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            @forelse (LaravelLocalization::getSupportedLocales() as $localeCode => $properties )
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">{{__('master.product name')}} ({{$localeCode}})</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="product_{{$localeCode}}" class="form-control mb-2" placeholder="{{__('master.product name')}}" value="{{$product->getTranslation('name',$localeCode,false)}}" />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">{{__('master.a product name is required and recommended to be unique')}}</div>
                                                    <!--end::Description-->
                                                </div>
                                            @empty
                                            @endforelse
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            @forelse (LaravelLocalization::getSupportedLocales() as $localeCode => $properties )
                                                <div>
                                                    <!--begin::Label-->
                                                    <label class="required form-label">{{__('master.description')}} ({{$localeCode}})</label>
                                                    <!--end::Label-->
                                                    <textarea name="description_{{$localeCode}}" class="kt_docs_ckeditor_classic{{$localeCode}}" placeholder="{{__('master.type your text')}}">
                                                        {!!$product->getTranslation('description',$localeCode,false)!!}
                                                    </textarea>
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">{{__('master.set a description to the product for better visibility')}}</div>
                                                    <!--end::Description-->
                                                </div>
                                            @empty
                                            @endforelse
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                    <!--begin::Media-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="required card-title">
                                                <h2>{{__('master.media')}}</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="row g-10">
                                                @forelse ($product->images as $image)
                                                    <div class="col-md-4">
                                                        <div class="card-xl-stretch me-md-6">
                                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{asset('assets/images/product_images/'.$image->name)}}">
                                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{asset("assets/images/product_images/".$image->name)}}')"></div>
                                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                                    <i class="ki-duotone ki-eye fs-2x text-white">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </div>
                                                            </a>
                                                            <div class="mt-5">
                                                                <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base"></a>
                                                                <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3"></div>
                                                                <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                                                    <span class="">
                                                                    <span class="fs-6 fw-semibold text-gray-400"></span></span>

                                                                    <a href="{{route('admin.product.deleteimage',$image->id)}}" class="">
                                                                        <i class="ki-outline ki-trash text-danger fs-2x">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                        </i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>
                                            <br>
                                            <div class="separator separator-dashed mb-9"></div>
                                            <div class="fv-row mb-2">
                                                <!--begin::Dropzone-->
                                                <div class="fv-row">
                                                    <!--begin::Dropzone-->
                                                    <div class="dropzone" id="kt_dropzonejs_example_1">
                                                        <!--begin::Message-->
                                                        <div class="dz-message needsclick">
                                                            <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>

                                                            <!--begin::Info-->
                                                            <div class="ms-4">
                                                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">{{__('master.drop files here or click to upload.')}}</h3>
                                                                <span class="fs-7 fw-semibold text-gray-400">{{__('master.upload up to 10 files')}}</span>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                    </div>
                                                    <!--end::Dropzone-->
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">{{__('master.set the product media gallery')}}</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Media-->
                                    <!--begin::Pricing-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{__('master.pricing')}}</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            {{-- <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Base Price</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="price" class="form-control mb-2" placeholder="Product price" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Set the product price.</div>
                                                <!--end::Description-->
                                            </div> --}}
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-semibold mb-2">{{__('master.price type')}}
                                                </label>
                                                <!--End::Label-->
                                                <!--begin::Row-->
                                                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
                                                            <!--begin::Radio-->
                                                            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                <input class="form-check-input" type="radio" name="price_type" value="on_demande" @if ($product->price_type == "on_demande") checked @endif />
                                                            </span>
                                                            <!--end::Radio-->
                                                            <!--begin::Info-->
                                                            <span class="ms-5">
                                                                <span class="fs-4 fw-bold text-gray-800 d-block">{{__('master.on demande')}}</span>
                                                            </span>
                                                            <!--end::Info-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                                            <!--begin::Radio-->
                                                            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                <input class="form-check-input" type="radio" name="price_type" value="price_list" @if ($product->price_type == "price_list") checked @endif/>
                                                            </span>
                                                            <!--end::Radio-->
                                                            <!--begin::Info-->
                                                            <span class="ms-5">
                                                                <span class="fs-4 fw-bold text-gray-800 d-block">{{__('master.price list')}}</span>
                                                            </span>
                                                            <!--end::Info-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Tax-->

                                                <div class="mb-10 fv-row">
                                                <label class=" form-label">{{__('master.base price')}}</label>
                                                <input type="text" name="price" class="form-control mb-2" placeholder="{{__('master.base price')}}" value="{{$product->price}}" />
                                                <div class="text-muted fs-7">{{__('master.set the product price')}}</div>
                                                </div>

                                            <!--end:Tax-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Pricing-->
                                </div>
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::Inventory-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{__('master.inventory')}}</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">{{__('master.sku')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="sku" class="form-control mb-2" placeholder="{{__('master.sku')}}" value="{{$product->sku}}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">{{__('master.enter the product sku')}}</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            {{-- <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">{{__('master.code')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="code" class="form-control mb-2" placeholder="{{__('master.code')}}" value="{{old('code')}}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">{{__('master.enter the product code number')}}</div>
                                                <!--end::Description-->
                                            </div> --}}
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class=" form-label">{{__('master.minimum quantity')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div class="d-flex gap-3">
                                                    <input type="number" name="quantity" class="form-control mb-2" placeholder="{{__('master.minimum quantity')}}" value="{{$product->quantity}}" />

                                                </div>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">{{__('master.enter the product quantity')}}</div>
                                                <!--end::Description-->
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class=" form-label">{{__('master.other terms')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="terms" class="form-control mb-2" placeholder="{{__('master.other terms')}}" value="{{$product->terms}}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">{{__('master.enter the product terms')}}</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Inventory-->
                                    <!--begin::Variations-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{__('master.variations')}}</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class=""  data-kt-ecommerce-catalog-add-product="auto-options">
                                                <!--begin::Label-->
                                                <label class="form-label">{{__('master.add product variations')}}</label>
                                                <!--begin::Repeater-->
                                                <div id="kt_docs_repeater_nested">
                                                    <!--begin::Form group-->
                                                    <div class="form-group">
                                                        <div data-repeater-list="options">
                                                            @forelse ($product->variants as $item)
                                                                <div data-repeater-item>
                                                                    <div class="form-group row mb-5">
                                                                        <div class="col-md-4">
                                                                            <label class="form-label">{{__('master.select option')}}</label>
                                                                            <select name="attributes" data-kt-repeater="select2" class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="{{__('master.select option')}}" id="">
                                                                                <option></option>
                                                                                @forelse ($attributes as $attribute)
                                                                                    <option value="{{$attribute->id}}" @selected($item->id == $attribute->id)>{{$attribute->name}}</option>
                                                                                @empty
                                                                                @endforelse
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="inner-repeater">
                                                                                <div data-repeater-list="variants" class="mb-5">
                                                                                    <div data-repeater-item>
                                                                                        @forelse ($product->attributes as $attribute)
                                                                                        @if ($attribute->attribute_id == $item->id)
                                                                                            <label class="form-label">{{__('master.variant')}}</label>
                                                                                            <div class="input-group pb-3">
                                                                                                <input type="text" class="form-control" name="variant" placeholder="{{__('master.variant')}}" value="{{$attribute->value}}" />
                                                                                                <button class="border border-secondary btn btn-icon btn-flex btn-light-danger" data-repeater-delete type="button">
                                                                                                    <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        @endif
                                                                                        @empty
                                                                                            <label class="form-label">{{__('master.variant')}}</label>
                                                                                            <div class="input-group pb-3">
                                                                                                <input type="text" class="form-control" name="variant" placeholder="{{__('master.variant')}}" value="{{old('variant')}}" />
                                                                                                <button class="border border-secondary btn btn-icon btn-flex btn-light-danger" data-repeater-delete type="button">
                                                                                                    <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        @endforelse

                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn btn-sm btn-flex btn-light-primary" data-repeater-create type="button">
                                                                                    <i class="ki-duotone ki-plus fs-5"></i>
                                                                                    {{__('master.add')}}
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-flex btn-light-danger mt-3 mt-md-9">
                                                                                <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                                                {{__('master.delete')}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div data-repeater-item>
                                                                    <div class="form-group row mb-5">
                                                                        <div class="col-md-4">
                                                                            <label class="form-label">{{__('master.select option')}}</label>
                                                                            <select name="attributes" data-kt-repeater="select2" class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="{{__('master.select option')}}" id="">
                                                                                <option></option>
                                                                                @forelse ($attributes as $attribute)
                                                                                    <option value="{{$attribute->id}}" @selected(old('attributes') == $attribute->id)>{{$attribute->name}}</option>
                                                                                @empty
                                                                                @endforelse
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="inner-repeater">
                                                                                <div data-repeater-list="variants" class="mb-5">
                                                                                    <div data-repeater-item>
                                                                                        <label class="form-label">{{__('master.variant')}}</label>
                                                                                        <div class="input-group pb-3">
                                                                                            <input type="text" class="form-control" name="variant" placeholder="{{__('master.variant')}}" value="{{old('variant')}}" />
                                                                                            <button class="border border-secondary btn btn-icon btn-flex btn-light-danger" data-repeater-delete type="button">
                                                                                                <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn btn-sm btn-flex btn-light-primary" data-repeater-create type="button">
                                                                                    <i class="ki-duotone ki-plus fs-5"></i>
                                                                                    {{__('master.add')}}
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-flex btn-light-danger mt-3 mt-md-9">
                                                                                <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                                                {{__('master.delete')}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                    <!--end::Form group-->

                                                    <!--begin::Form group-->
                                                    <div class="form-group">
                                                        <a href="javascript:;" data-repeater-create class="btn btn-flex btn-light-primary">
                                                            <i class="ki-duotone ki-plus fs-3"></i>
                                                            {{__('master.add')}}
                                                        </a>
                                                    </div>
                                                    <!--end::Form group-->
                                                </div>
                                                <!--end::Repeater-->
                                                <!--end::Repeater-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Variations-->
                                    <!--begin::Shipping-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{__('master.shipping')}}</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Input-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class=" form-label">{{__('master.delivery time')}}</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <div class="d-flex gap-3">
                                                        <input type="number" name="delivery" class="form-control mb-2" placeholder="{{__('master.delivery')}}" value="{{old('delivery')}}" />

                                                    </div>
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">{{__('master.enter the product delivery time')}}</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Shipping-->
                                </div>
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{route('admin.product')}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="" class="btn btn-primary">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

</div>

@endsection


@push('script')

    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('.kt_docs_ckeditor_classicar'))
        .then(editor => {
            // console.log(editor);
        })
        .catch(error => {
            // console.error(error);
        });
    </script>
        <script>
            ClassicEditor
            .create(document.querySelector('.kt_docs_ckeditor_classicen'))
            .then(editor => {
                // console.log(editor);
            })
            .catch(error => {
                // console.error(error);
            });
        </script>
    <script>
        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
             // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            headers: {
                    'X-CSRF-TOKEN':
                        "{{ csrf_token() }}"
                }

                ,
            url: "{{ route('admin.product.store_image') }}",
            success:
                function (file, response) {
                    $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
                    myDropzone[file.name] = response.name
                }
                ,
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = myDropzone[file.name]
                }
                $('form').find('input[name="images[]"][value="' + name + '"]').remove()
            }
            ,
        });
    </script>
    <script>
        var input1 = document.querySelector("#kt_tagify_1");
        new Tagify(input1, {
            whitelist : [],
            dropdown : {
                classname     : "color-blue",
                enabled       : 0,              // show the dropdown immediately on focus
                position      : "text",         // place the dropdown near the typed text
                closeOnSelect : false,          // keep the dropdown open after selecting a suggestion
                highlightFirst: true
            }
        });

    </script>
    <script>
        $('#kt_docs_repeater_nested').repeater({
                repeaters: [{
                    selector: '.inner-repeater',
                    show: function () {
                        $(this).slideDown();
                        $(this).find('[data-kt-repeater="select2"]').select2();
                    },

                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                }],

                show: function () {
                    $(this).slideDown();
                    $(this).find('[data-kt-repeater="select2"]').select2();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }
        });
    </script>

@endpush
