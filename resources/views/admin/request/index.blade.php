@extends('admin.layouts.admin')


@section('title', 'Request Product')


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
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.request')}}</li>
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
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <form action="{{URL::current()}}" method="GET">
                                {{-- <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" name="keyword" value="{{ old('keyword', request()->input('keyword')) }}"  data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="{{__('master.search request')}}" />
                                </div> --}}
                            </form>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--begin::Filter-->
                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-filter fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>{{__('master.filter')}}
                                </button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-4 text-dark fw-bold">{{__('master.filter option')}}</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Separator-->
                                    <!--begin::Content-->
                                    <form action="{{URL::current()}}" method="GET">
                                        <div class="px-7 py-5">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fs-5 fw-semibold mb-3">{{__('master.status')}} :</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="status" class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="{{__('master.select status')}}" data-allow-clear="true" data-kt-customer-table-filter="month" data-dropdown-parent="#kt-toolbar-filter">
                                                    <option></option>
                                                    <option value="approved" {{ old('status', request()->input('status')) == 'approved' ? 'selected' : '' }}>{{__('master.approved')}}</option>
                                                    <option value="pending" {{ old('status', request()->input('status')) == 'pending' ? 'selected' : '' }}>{{__('master.pending')}}</option>
                                                    <option value="canceled" {{ old('status', request()->input('status')) == 'canceled' ? 'selected' : '' }}>{{__('master.canceled')}}</option>
                                                    <option value="ordered" {{ old('status', request()->input('status')) == 'ordered' ? 'selected' : '' }}>{{__('master.ordered')}}</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">{{__('master.reset')}}</button>
                                                <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">{{__('master.apply')}}</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                    </form>
                                    <!--end::Content-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Filter-->
                                <!--begin::Export-->
                                {{-- <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                                <i class="ki-duotone ki-exit-up fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Export</button> --}}
                                <!--end::Export-->
                                <!--begin::Add user-->
                                {{-- <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                    <a  class="btn btn-primary"  href="{{route('request.create')}}"><i class="ki-duotone ki-plus fs-2"></i>{{__('master.add request')}}</a>
                                </div> --}}
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            {{-- <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                                <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div> --}}
                            <!--end::Group actions-->
                            <!--begin::Modal - Adjust Balance-->
                            {{-- <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bold">Export Users</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                <i class="ki-duotone ki-cross fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <!--begin::Form-->
                                            <form id="kt_modal_export_users_form" class="form" action="#">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                        <option></option>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Analyst">Analyst</option>
                                                        <option value="Developer">Developer</option>
                                                        <option value="Support">Support</option>
                                                        <option value="Trial">Trial</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                        <option></option>
                                                        <option value="excel">Excel</option>
                                                        <option value="pdf">PDF</option>
                                                        <option value="cvs">CVS</option>
                                                        <option value="zip">ZIP</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="text-center">
                                                    <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div> --}}
                            <!--end::Modal - New Card-->

                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="table_id">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">ID</th>
                                    <th class="min-w-125px">User</th>
                                    <th class="min-w-125px">Product</th>
                                    <th class="min-w-125px">Status</th>
                                    <th class="min-w-125px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @forelse ($requests as $request)
                                    <tr>
                                        <td>
                                            <a href="{{route('admin.request.show', $request->id)}}" class="text-gray-800 text-hover-primary mb-1">{{$request->id}}</a>
                                        </td>
                                        <td>
                                            {{$request->user->name}}
                                        </td>
                                        <td class="">
                                            <div class="d-flex flex-column">
                                                @if ($request->product_id)
                                                    <a href="{{route('admin.product.show', $request->product_id)}}" class="text-gray-800 text-hover-primary mb-1">{{$request->product->name ?? 'Private-Label'}}</a>
                                                @else
                                                    <a href="" class="text-gray-800 text-hover-primary mb-1">Private-Label</a>
                                                @endif
                                            </div>
                                        </td>
                                        <td >
                                            @if ($request->status == 'approved')
                                                <span class="badge py-3 px-4 fs-7 badge-light-success">{{$request->status}}</span>
                                            @endif
                                            @if ($request->status == 'pending')
                                                <span class="badge py-3 px-4 fs-7 badge-light-warning">{{$request->status}}</span>
                                            @endif
                                            @if ($request->status == 'canceled')
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">{{$request->status}}</span>
                                            @endif
                                            @if ($request->status == 'ordered')
                                                <span class="badge py-3 px-4 fs-7 badge-light-info">{{$request->status}}</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{route('admin.request.edit',$request->id)}}" class="menu-link px-3">Edit</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{route('admin.request.send',$request->id)}}" class="menu-link px-3">Send</a>
                                                </div>
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                    </tr>
                                @empty

                                @endforelse

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12">
                                        <div class="float-right">
                                            {{$requests->withQueryString()->links()}}
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
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
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/user-management/users/list/table.js')}}"></script>
	<script src="{{asset('assets/js/custom/apps/user-management/users/list/export-users.js')}}"></script>
	<script src="{{asset('assets/js/custom/apps/user-management/users/list/add.js')}}"></script>

@endpush
