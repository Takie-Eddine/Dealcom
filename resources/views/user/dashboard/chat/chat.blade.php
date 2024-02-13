@extends('user.dashboard.layouts.admin')


@section('title', 'Chat')


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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{__('master.chat')}}</h1>
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
                            <li class="breadcrumb-item text-muted">{{__('master.chat')}}</li>
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
                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
                            <!--begin::Contacts-->
                            <div class="card card-flush">
                                <!--begin::Card header-->
                                <div class="card-header pt-7" id="kt_chat_contacts_header">
                                    <!--begin::Form-->
                                    <form class="w-100 position-relative" autocomplete="off">
                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <!--end::Icon-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid px-13" name="search" value="" placeholder="Search by username or email..." />
                                        <!--end::Input-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-5" id="kt_chat_contacts_body">
                                    <!--begin::List-->
                                    <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_toolbar, #kt_app_toolbar, #kt_footer, #kt_app_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px">
                                        @forelse ($chats as $chat)
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-4">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-45px symbol-circle">
                                                        <img class="symbol-label bg-light-danger text-danger fs-6 fw-bolder" src="{{$chat->participants[0]->admin->profile->image_url}}" alt="">
                                                        <div class="symbol-badge bg-success start-100 top-100 border-4 h-8px w-8px ms-n2 mt-n2"></div>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5">
                                                        <a href="{{route('admin.chat',$chat->id)}}" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{$chat->participants[0]->name}}</a>
                                                        <div class="fw-semibold text-muted">{{Str::words($chat->lastMessage->body,20)}}</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Lat seen-->
                                                <div class="d-flex flex-column align-items-end ms-2">
                                                    <span class="text-muted fs-7 mb-1">{{$chat->lastMessage->created_at->longAbsoluteDiffForHumans()}}</span>
                                                    {{-- <span class="badge badge-sm badge-circle badge-light-success">6</span> --}}
                                                </div>
                                                <!--end::Lat seen-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="separator separator-dashed d-none"></div>
                                            <!--end::Separator-->
                                        @empty
                                        @endforelse
                                    </div>
                                    <!--end::List-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Contacts-->
                        </div>
                        <!--end::Sidebar-->
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                            <!--begin::Messenger-->
                            <div class="card" id="kt_chat_messenger">
                                <!--begin::Card header-->
                                <div class="card-header" id="kt_chat_messenger_header">
                                    <!--begin::Title-->
                                    <div class="card-title">
                                        <!--begin::User-->
                                        <div class="d-flex justify-content-center flex-column me-3">
                                            <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian Cox</a>
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
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body" id="kt_chat_messenger_body">
                                    <!--begin::Messages-->
                                    <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px">
                                        @forelse ($messages as $message)
                                            <!--begin::Message(in)-->
                                            <div class="d-flex  @if ($message->tallker_id == Auth::user()->tallker->id) justify-content-end  @else justify-content-start @endif mb-10">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column align-items-start">
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center mb-2">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            @if ($message->tallker_id != Auth::user()->tallker->id)
                                                                <img alt="Pic" src="{{$message->user->admin->profile->image_url}}" />
                                                            @else
                                                                <img alt="Pic" src="{{Auth::user()->profile->image_url}}" />
                                                            @endif

                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Details-->
                                                        <div class="ms-3">
                                                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">{{$message->user->name}}</a>
                                                            <span class="text-muted fs-7 mb-1">{{$message->created_at->longAbsoluteDiffForHumans()}}</span>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Text-->
                                                    <div class="p-5 rounded @if ($message->tallker_id == Auth::user()->tallker->id) bg-light-primary  @else bg-light-info @endif  text-dark fw-semibold mw-lg-400px @if ($message->tallker_id == Auth::user()->tallker->id) text-end  @else text-start @endif " data-kt-element="message-text">{{$message->body}}</div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Message(in)-->
                                        @empty

                                        @endforelse

                                    </div>
                                    <!--end::Messages-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Card footer-->
                                <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                                    <form class="chat-form" method="POST" action="{{route('api.messages.store')}}">
                                        @csrf
                                        <input type="hidden" name="conversation_id" value="{{$activeChat->id}}">
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-flush mb-3" name="message" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
                                        <!--end::Input-->
                                        <!--begin:Toolbar-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Actions-->
                                            <div class="d-flex align-items-center me-2">
                                                <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
                                                    <i class="ki-duotone ki-exit-up fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                            <!--begin::Send-->
                                            <button class="btn btn-primary" type="submit" data-kt-element="send">Send</button>
                                            <!--end::Send-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </form>
                                </div>
                                <!--end::Card footer-->
                            </div>
                            <!--end::Messenger-->
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
    <script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
	<script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
	<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
    <script src="{{asset('assets/js/messenger.js')}}"></script>

@endpush
