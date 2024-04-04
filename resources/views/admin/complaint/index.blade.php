@extends('admin.layouts.admin')


@section('title', 'Complaints ')


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
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.complaints')}}</li>
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
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="table_id">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">User</th>
                                    <th class="min-w-125px">Product</th>
                                    <th class="min-w-125px">Request</th>
                                    <th class="min-w-125px">Title</th>
                                    <th class="min-w-125px">Complaint</th>
                                    <th class="min-w-125px">Answer</th>
                                    <th class="min-w-125px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @forelse ($complaints as $complaint)
                                    <tr>
                                        <td class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="{{route('admin.product.show',$complaint->id)}}">
                                                    <div class="symbol-label">
                                                        <img src="{{$complaint->user->profile->image_url}}" alt="{{$complaint->user->name}}" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::User details-->
                                            <div class="d-flex flex-column">
                                                <a href="{{route('admin.product.show',$complaint->id)}}" class="text-gray-800 text-hover-primary mb-1">{{$complaint->user->name}}</a>

                                            </div>
                                            <!--begin::User details-->
                                        </td>
                                        <td>
                                            <a href="{{route('admin.product.show',$complaint->product->id)}}" class="text-gray-800 text-hover-primary mb-1"> {{$complaint->product->code ?? '__'}}</a>
                                        </td>
                                        <td>
                                            @if ($complaint->request_id)
                                                <a href="{{route('admin.request.show',$complaint->request_id)}}" class="text-gray-800 text-hover-primary mb-1"> {{$complaint->request_id }}</a>
                                            @else
                                                __
                                            @endif
                                        </td>
                                        <td> {{$complaint->title ?? '__'}}</td>
                                        <td>
                                            <span class="fw-bold">{{\Illuminate\Support\Str::limit(strip_tags($complaint->text), 30)}}
                                                @if (strlen(strip_tags($complaint->text)) > 30)
                                                    <a href="{{route('admin.complaints.show',$complaint->id) }}" class="btn btn-active-light">{{__('master.read more')}}</a>
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{\Illuminate\Support\Str::limit(strip_tags($complaint->answer), 30)}}
                                                @if (strlen(strip_tags($complaint->answer)) > 30)
                                                    <a href="{{route('admin.complaints.show',$complaint->id) }}" class="btn btn-active-light">{{__('master.read more')}}</a>
                                                @endif
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                            @if (!$complaint->answer)
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{route('admin.complaints.answer',$complaint->id)}}" class="menu-link px-3">Answer</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                            @endif
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
                                            {{$complaints->withQueryString()->links()}}
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
