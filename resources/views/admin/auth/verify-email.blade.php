@extends('admin.auth.layouts.master')

@section('title','Verify Email')


@push('style')

@endpush

@section('content')

<div class="d-flex flex-column flex-root" id="kt_app_root">
    <style>body { background-image: url('{{asset("assets/media/auth/bg5.jpg")}}'); } [data-bs-theme="dark"] body { background-image: url('{{asset("assets/media/auth/bg5-dark.jpg")}}'); }</style>
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <div class="d-flex flex-column flex-center text-center p-10">
            <div class="card card-flush w-lg-650px py-5">
                <div class="card-body py-15 py-lg-20">
                    <div class="mb-14">
                        <a href="" class="">
                            <img alt="Logo" src="{{asset('assets/media/logos/custom-2.svg')}}" class="h-40px" />
                        </a>
                    </div>
                    <h1 class="fw-bolder text-gray-900 mb-5">{{__('master.verify your email')}}</h1>
                    <div class="mb-11">
                        <form method="POST" action="{{ route('admin.verification.send') }}">
                            @csrf

                            <div>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <span> {{__('master.resend verification email')}} </span>
                                </button>
                            </div>
                        </form>
                        {{-- <a href="../../demo1/dist/index.html" class="btn btn-sm btn-primary">Skip for now</a> --}}
                    </div>

                    <div class="mb-0">
                        <img src="{{asset('assets/media/auth/please-verify-your-email.png')}}" class="mw-100 mh-300px theme-light-show" alt="" />
                        <img src="{{asset('assets/media/auth/please-verify-your-email-dark.png')}}" class="mw-100 mh-300px theme-dark-show" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@push('script')

@endpush
