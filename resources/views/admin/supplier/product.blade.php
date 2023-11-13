@extends('admin.layouts.admin')


@section('title', 'Product Supplier')


@push('style')
<link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{__('master.supplier')}}</h1>
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
                            <a href="{{route('admin.supplier')}}" class="text-muted text-hover-primary">{{__('master.suppliers')}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.view supplier')}}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->

                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Navbar-->
                @include('admin.supplier.header')
                <!--end::Navbar-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="table_id">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">ID</th>
                                    <th class="min-w-125px">Name</th>
                                    <th class="min-w-125px">Code</th>
                                    <th class="min-w-125px">Status</th>
                                    <th class="min-w-125px">Price List</th>
                                    <th class="min-w-125px">Approved</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">


                                @forelse ($supplier->products as $product)
                                    <tr>
                                        <td>
                                            {{$product->id}}
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="{{route('admin.product.show',$product->id)}}">
                                                    <div class="symbol-label">
                                                        @if ($product->image_url)
                                                            <img src="{{$product->image_url}}" alt="{{$product->name}}" class="w-100" />
                                                        @else
                                                            <img src="{{asset('assets/media/svg/files/blank-image.svg')}}" alt="{{$product->name}}" class="w-100" />
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::User details-->
                                            <div class="d-flex flex-column">
                                                <a href="{{route('admin.product.show',$product->id)}}" class="text-gray-800 text-hover-primary mb-1">{{$product->name}}</a>

                                            </div>
                                            <!--begin::User details-->
                                        </td>
                                        <td>{{$product->code}}</td>
                                        <td >
                                            @if ($product->status == 'active')
                                                <span class="badge py-3 px-4 fs-7 badge-light-success">{{$product->status}}</span>
                                            @endif
                                            @if ($product->status == 'draft')
                                                <span class="badge py-3 px-4 fs-7 badge-light-warning">{{$product->status}}</span>
                                            @endif
                                            @if ($product->status == 'archived')
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">{{$product->status}}</span>
                                            @endif
                                        </td>
                                        <td>{{$product->price_type}}</td>
                                        @if ($product->approved == 0)
                                            <td><span class="badge py-3 px-4 fs-7 badge-light-danger">{{__('master.not approved')}}</span></td>
                                        @else
                                            <td><span class="badge py-3 px-4 fs-7 badge-light-success">{{__('master.approved')}}</span></td>
                                        @endif
                                    </tr>
                                @empty

                                @endforelse

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12">
                                        <div class="float-right">
                                            {{-- {{$supplier->products->withQueryString()->links()}} --}}
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>

@endsection


@push('script')
    <script src="{{asset('assets/js/custom/pages/user-profile/general.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/user-management/users/list/table.js')}}"></script>
	<script src="{{asset('assets/js/custom/apps/user-management/users/list/export-users.js')}}"></script>
	<script src="{{asset('assets/js/custom/apps/user-management/users/list/add.js')}}"></script>

@endpush
