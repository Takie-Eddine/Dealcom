<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" direction="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}" dir="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}" style="direction: {{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}">
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="{{asset('assets/logo/Asset 3.png')}}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        @if ( app() -> getLocale() === 'ar')
            <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        @else
            <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        @endif

	</head>

	<body id="kt_body" class="app-blank">
		@include('admin.auth.layouts.init')


        @yield('content')


		<script>var hostUrl = "{{asset('assets//')}}";</script>

		<script src="{{asset('assets/plugins/global/plugins.bundle.js/')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js/')}}"></script>



	</body>

</html>
