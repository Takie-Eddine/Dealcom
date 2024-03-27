@extends('admin.auth.layouts.auth_layouts')

@section('title','Forgot Password')


@push('style')

@endpush

@section('content')

<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <div class="w-lg-500px p-10">
                    <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" data-kt-redirect-url="" action="{{route('admin.password.email')}}" method="POST">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark fw-bolder mb-3">{{__('master.forgot password')}}</h1>
                            <div class="text-gray-500 fw-semibold fs-6">{{__('master.Enter your email to reset your password')}}</div>
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
                        <div class="fv-row mb-8">
                            <input type="text" placeholder="{{__('master.email')}}" name="email" value="{{old('email')}}" autocomplete="off" class="form-control bg-transparent" />
                        </div>
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button type="submit"  class="btn btn-primary me-4">
                                <span class="indicator-label">{{__('master.submit')}}</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <a href="{{route('admin.login')}}" class="btn btn-light">{{__('master.cancel')}}</a>
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
<script src="{{asset('assets/js/custom/authentication/reset-password/reset-password.js')}}"></script>
@endpush
