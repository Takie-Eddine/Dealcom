{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" direction="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}" dir="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}" style="direction: {{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}">
	<head>
		<title>Verify Email</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="{{asset('assets/logo/logo.png')}}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        @if ( app() -> getLocale() === 'ar')
            <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        @else
            <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        @endif

	</head>

	<body id="kt_body" class="app-blank">
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
                                <form method="POST" action="{{ route('verification.send') }}">
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

        @yield('content')


		<script>var hostUrl = "{{asset('assets//')}}";</script>

		<script src="{{asset('assets/plugins/global/plugins.bundle.js/')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js/')}}"></script>



	</body>

</html>

