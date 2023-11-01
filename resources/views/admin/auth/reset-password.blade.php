@extends('admin.auth.layouts.auth_layouts')

@section('title','New Password')


@push('style')

@endpush

@section('content')

<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <div class="w-lg-500px p-10">
                    <form class="form w-100" novalidate="novalidate" id="kt_new_password_form" data-action="{{ route('admin.password.store') }}" action="{{ route('admin.password.store') }}" method="POST">
                        <div class="text-center mb-10">
                            <h1 class="text-dark fw-bolder mb-3">{{__('master.setup new password')}}</h1>
                            <div class="text-gray-500 fw-semibold fs-6">{{__('master.have you already reset the password')}}
                            <a href="{{route('admin.login')}}" class="link-primary fw-bold">{{__('master.sign in')}}</a></div>
                        </div>
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="fv-row mb-8">
                            <input type="email" placeholder="{{__('master.email')}}" name="email" value="{{old('email', $request->email)}}" required autofocus autocomplete="username" class="form-control bg-transparent" />
                        </div>

                        <div class="fv-row mb-8" data-kt-password-meter="true">
                            <div class="mb-1">
                                <div class="position-relative mb-3">
                                    <input class="form-control bg-transparent" type="password" placeholder="{{__('master.password')}}" name="password" value="{{old('email', $request->email)}}" required autofocus autocomplete="username" class="form-control bg-transparent"/>
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                        <i class="ki-duotone ki-eye-slash fs-2"></i>
                                        <i class="ki-duotone ki-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                            </div>
                            <div class="text-muted">{{__('master.use 8 or more characters with a mix of letters, numbers & symbols')}}</div>
                        </div>
                        <div class="fv-row mb-8">
                            <input type="password" placeholder="{{__('master.repeat password')}}" name="password_confirmation" required autocomplete="new-password" class="form-control bg-transparent" />
                        </div>
                        {{-- <div class="fv-row mb-8">
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                <span class="form-check-label fw-semibold text-gray-700 fs-6 ms-1">I Agree &
                                <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                            </label>
                        </div> --}}
                        <div class="d-grid mb-10">
                            <button type="submit" id="" class="btn btn-primary">
                                <span class="indicator-label">{{__('master.submit')}}</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @include('admin.auth.layouts.languages')
        </div>
        @include('admin.auth.layouts.footer')
    </div>
</div>

@endsection


@push('script')
<script src="{{asset('assets/js/custom/authentication/reset-password/new-password.js')}}"></script>
@endpush
