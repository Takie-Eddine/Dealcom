@extends('admin.auth.layouts.auth_layouts')

@section('title','Login')


@push('style')

@endpush

@section('content')

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" novalidate="novalidate" id="" data-kt-redirect-url="" action="{{route('admin.login')}}" method="POST">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-dark fw-bolder mb-3">{{__('master.sign in')}}</h1>
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
                                <input type="text" placeholder="{{__('master.email')}}" value="{{old('email')}}" name="email" autocomplete="off" class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="{{__('master.password')}}" value="{{old('password')}}" name="password" autocomplete="off" class="form-control bg-transparent" />
                            </div>
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <a href="{{ route('admin.password.request') }}" class="link-primary">{{__('master.forgot password')}}</a>
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" id="" class="btn btn-primary">
                                    <span class="indicator-label">{{__('master.sign in')}}</span>
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
<script src="{{asset('assets/js/custom/authentication/sign-in/general.js/')}}"></script>
@endpush
