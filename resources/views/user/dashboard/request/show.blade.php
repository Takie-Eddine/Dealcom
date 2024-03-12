@extends('user.dashboard.layouts.admin')


@section('title', 'View Request')


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
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{__('master.view request')}}</li>
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
                <!--begin::Order details page-->
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-lg-n2 me-auto">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="">{{__('master.request')}}</a>
                            </li>
                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Button-->
                        <a href="{{route('request')}}" class="btn btn-icon btn-light btn-sm ms-auto me-lg-n7">
                            <i class="ki-duotone ki-left fs-2"></i>
                        </a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <!--end::Button-->
                    </div>
                    <!--begin::Order summary-->
                    <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                        <!--begin::Order details-->
                        <div class="card card-flush py-4 flex-row-fluid">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__('master.request details')}} (#{{$modelrequest->id}})</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                        <tbody class="fw-semibold text-gray-600">
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-calendar fs-2 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>{{__('master.date request')}}</div>
                                                </td>
                                                <td class="fw-bold text-end">{{$modelrequest->created_at->format('Y-m-d')}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-wallet fs-2 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>{{__('master.status')}} </div>
                                                </td>
                                                <td class="fw-bold text-end">{{$modelrequest->status}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-truck fs-2 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>{{__('master.shipping method')}}</div>
                                                </td>
                                                <td class="fw-bold text-end">{{$modelrequest->details->shipping_type}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-geolocation fs-2 me-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    {{__('master.country')}}</div>
                                                </td>
                                                <td class="fw-bold text-end">{{$modelrequest->details->country}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Order details-->
                        <!--begin::Documents-->
                        @if ($modelrequest->admin_id)
                            <div class="card card-flush py-4 flex-row-fluid">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{__('master.admin')}}</h2>
                                    </div>
                                    <div class="card-title">
                                        <h2>
                                            <button class="btn btn-sm btn-light btn-active-light-primary" data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_chat">
                                                <i class="ki-duotone ki-message-text-2 fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>{{__('master.chat')}}
                                            </button>
                                        </h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                            <tbody class="fw-semibold text-gray-600">
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <i class="ki-duotone ki-profile-circle fs-2 me-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>{{__('master.admin')}}
                                                        </div>
                                                    </td>
                                                    <td class="fw-bold text-end">
                                                        <a href="" class="text-gray-600 text-hover-primary">{{$modelrequest->admin->name}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                            <i class="ki-duotone ki-calendar fs-2 me-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>{{__('master.approval date')}}</div>
                                                    </td>
                                                    <td class="fw-bold text-end">
                                                        <a href="#" class="text-gray-600 text-hover-primary">{{$modelrequest->updated_at->format('Y-m-d')}}</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                        @endif

                        <!--end::Documents-->
                    </div>
                    <!--end::Order summary-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" role="tab-panel">
                            <!--begin::Orders-->
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                {{-- <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                                    <!--begin::Payment address-->
                                    <div class="card card-flush py-4 flex-row-fluid position-relative">
                                        <!--begin::Background-->
                                        <div class="position-absolute top-0 end-0 bottom-0 opacity-10 d-flex align-items-center me-5">
                                            <i class="ki-solid ki-two-credit-cart" style="font-size: 14em"></i>
                                        </div>
                                        <!--end::Background-->
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Billing Address</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">Unit 1/23 Hastings Road,
                                        <br />Melbourne 3000,
                                        <br />Victoria,
                                        <br />Australia.</div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Payment address-->
                                    <!--begin::Shipping address-->
                                    <div class="card card-flush py-4 flex-row-fluid position-relative">
                                        <!--begin::Background-->
                                        <div class="position-absolute top-0 end-0 bottom-0 opacity-10 d-flex align-items-center me-5">
                                            <i class="ki-solid ki-delivery" style="font-size: 13em"></i>
                                        </div>
                                        <!--end::Background-->
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Shipping Address</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">Unit 1/23 Hastings Road,
                                        <br />Melbourne 3000,
                                        <br />Victoria,
                                        <br />Australia.</div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Shipping address-->
                                </div> --}}
                                <!--begin::Product List-->
                                <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{__('master.request')}} #{{$modelrequest->id}}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                <thead>
                                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="min-w-175px">Product</th>
                                                        <th class="min-w-100px text-end">Code</th>
                                                        <th class="min-w-70px text-end">Qty</th>
                                                        <th class="min-w-100px text-end">Unit</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                    <tr>
                                                        <td>
                                                            @if ($modelrequest->product_id)
                                                                <div class="d-flex align-items-center">
                                                                    <!--begin::Thumbnail-->
                                                                    <a href="" class="symbol symbol-50px">
                                                                        <span class="symbol-label" style="background-image:url({{$modelrequest->product->image_url}});"></span>
                                                                    </a>
                                                                    <!--end::Thumbnail-->
                                                                    <!--begin::Title-->
                                                                    <div class="ms-5">
                                                                        <a href="" class="fw-bold text-gray-600 text-hover-primary">{{$modelrequest->product->name}}</a>
                                                                    </div>
                                                                    <!--end::Title-->
                                                                </div>
                                                            @else
                                                                <div class="d-flex align-items-center">
                                                                    <!--begin::Thumbnail-->
                                                                    {{-- <a href="{{route('admin.product.show',$modelrequest->product_id)}}" class="symbol symbol-50px">
                                                                        <span class="symbol-label" style="background-image:url({{$modelrequest->product->image_url}});"></span>
                                                                    </a> --}}
                                                                    <!--end::Thumbnail-->
                                                                    <!--begin::Title-->
                                                                    <div class="ms-5">
                                                                        <a href="" class="fw-bold text-gray-600 text-hover-primary">{{$modelrequest->product->name ?? 'Private-Label'}}</a>
                                                                    </div>
                                                                    <!--end::Title-->
                                                                </div>
                                                            @endif

                                                        </td>
                                                        <td class="text-end"><a href="" class="symbol symbol-50px">{{$modelrequest->product->code ?? '__'}}</a></td>
                                                        <td class="text-end">{{$modelrequest->details->quantity}}</td>
                                                        <td class="text-end">{{$modelrequest->details->unit}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-end">Description</td>
                                                        <td class="text-end">{{$modelrequest->details->description}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Product List-->
                            </div>
                            <!--end::Orders-->
                        </div>
                        <!--end::Tab pane-->
                        <div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
                            <!--begin::Messenger-->
                            <div class="card w-100 border-0 rounded-0" id="kt_drawer_chat_messenger">
                                <!--begin::Card header-->
                                <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                                    <!--begin::Title-->
                                    <div class="card-title">
                                        <!--begin::User-->
                                        <div class="d-flex justify-content-center flex-column me-3">
                                            <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{$modelrequest->user->name}}</a>
                                            <!--begin::Info-->
                                            <div class="mb-0 lh-1">
                                                <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                                <span class="fs-7 fw-semibold text-muted">Active</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Close-->
                                        <div class="btn btn-sm btn-icon btn-active-color-primary" id="kt_drawer_chat_close">
                                            <i class="ki-duotone ki-cross-square fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body" id="kt_drawer_chat_messenger_body">
                                    <!--begin::Messages-->
                                    <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer" data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
                                        <!--begin::Message(in)-->
                                        <div class="d-flex justify-content-start mb-10">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column align-items-start">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-3">
                                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                                        <span class="text-muted fs-7 mb-1">2 mins</span>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">How likely are you to recommend our company to your friends and family ?</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(in)-->
                                        <!--begin::Message(out)-->
                                        <div class="d-flex justify-content-end mb-10">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column align-items-end">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Details-->
                                                    <div class="me-3">
                                                        <span class="text-muted fs-7 mb-1">5 mins</span>
                                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                    </div>
                                                    <!--end::Details-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">Hey there, we’re just writing to let you know that you’ve been subscribed to a repository on GitHub.</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(out)-->
                                        <!--begin::Message(in)-->
                                        <div class="d-flex justify-content-start mb-10">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column align-items-start">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-3">
                                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                                        <span class="text-muted fs-7 mb-1">1 Hour</span>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">Ok, Understood!</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(in)-->
                                        <!--begin::Message(out)-->
                                        <div class="d-flex justify-content-end mb-10">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column align-items-end">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Details-->
                                                    <div class="me-3">
                                                        <span class="text-muted fs-7 mb-1">2 Hours</span>
                                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                    </div>
                                                    <!--end::Details-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">You’ll receive notifications for all issues, pull requests!</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(out)-->
                                        <!--begin::Message(in)-->
                                        <div class="d-flex justify-content-start mb-10">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column align-items-start">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-3">
                                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                                        <span class="text-muted fs-7 mb-1">3 Hours</span>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">You can unwatch this repository immediately by clicking here:
                                                <a href="https://keenthemes.com">Keenthemes.com</a></div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(in)-->
                                        <!--begin::Message(out)-->
                                        <div class="d-flex justify-content-end mb-10">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column align-items-end">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Details-->
                                                    <div class="me-3">
                                                        <span class="text-muted fs-7 mb-1">4 Hours</span>
                                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                    </div>
                                                    <!--end::Details-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">Most purchased Business courses during this sale!</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(out)-->
                                        <!--begin::Message(in)-->
                                        <div class="d-flex justify-content-start mb-10">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column align-items-start">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-3">
                                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                                        <span class="text-muted fs-7 mb-1">5 Hours</span>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">Company BBQ to celebrate the last quater achievements and goals. Food and drinks provided</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(in)-->
                                        <!--begin::Message(template for out)-->
                                        <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column align-items-end">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Details-->
                                                    <div class="me-3">
                                                        <span class="text-muted fs-7 mb-1">Just now</span>
                                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                    </div>
                                                    <!--end::Details-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text"></div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(template for out)-->
                                        <!--begin::Message(template for in)-->
                                        <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column align-items-start">
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-3">
                                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                                        <span class="text-muted fs-7 mb-1">Just now</span>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">Right before vacation season we have the next Big Deal for you.</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(template for in)-->
                                    </div>
                                    <!--end::Messages-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Card footer-->
                                <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                                    <!--begin::Input-->
                                    <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
                                    <!--end::Input-->
                                    <!--begin:Toolbar-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center me-2">
                                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
                                                <i class="ki-duotone ki-paper-clip fs-3"></i>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
                                                <i class="ki-duotone ki-cloud-add fs-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                        <!--begin::Send-->
                                        <button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
                                        <!--end::Send-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Card footer-->
                            </div>
                            <!--end::Messenger-->
                        </div>
                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Order details page-->
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
