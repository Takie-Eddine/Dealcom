<header class="header axil-header header-style-5 dealcom-header ">

    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="mobile-menu me-5">
                    <button id="toggleMenu">☰</button>
                    <ul id="menuList" >
                        <li><a class="{{request()->routeIs('login') ? 'active' : ''}}" href="{{route('login')}}">دخول</a></li>
                        <li><a class="{{request()->routeIs('category') ? 'active' : ''}}" href="{{route('category')}}">الفئات</a></li>
                        <li><a class="{{request()->routeIs('about') ? 'active' : ''}}" href="{{route('about')}}">حول ديلكوم</a></li>
                        <li><a class="{{request()->routeIs('https://blogs.dealcom.com.tr') ? 'active' : ''}}" href="https://blogs.dealcom.com.tr">مقالات</a></li>
                        <li><a class="{{request()->routeIs('contact') ? 'active' : ''}}" href="{{route('contact')}}">تواصل معنا</a></li>
                    </ul>
                </div>
                <div class="header-brand">
                    <a href="{{route('index')}}" class="logo logo-dark">
                        <img src="{{asset('assets/logo/Asset 15 (1).png')}}" class="w-50" alt="Site Logo">
                    </a>
                    <a href="{{route('index')}}" class="logo logo-light">
                        <img src="{{asset('assets/logo/Asset 15 (1).png')}}" class="w-50" alt="Site Logo">
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav ">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="{{route('index')}}" class="logo">
                                <img src="{{asset('frontend/assets/images/logo/logo.png')}}" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu me-5">
                            <li><a class="{{request()->routeIs('category') ? 'active' : ''}}" href="{{route('category')}}">{{__('master.category')}}</a></li>
                            <li><a class="{{request()->routeIs('about') ? 'active' : ''}}" href="{{route('about')}}">{{__('master.about dealcom')}}</a></li>
                            <li><a class="{{request()->routeIs('https://blogs.dealcom.com.tr') ? 'active' : ''}}" href="https://blogs.dealcom.com.tr">{{__('master.blogs')}}</a></li>
                            <li><a class="{{request()->routeIs('contact') ? 'active' : ''}}" href="{{route('contact')}}">{{__('master.contact us')}} </a></li>
                        </ul>


                    </nav>
                </div>
                <div class="header-action d-flex mr-2">
                    <div class="auth ms-2 d-none d-lg-inline-block">
                        @auth
                            <div class="dropdown">
                                <button style="background-color: #3ec0c2;color: white;" class="dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('assets/logo/user.png')}}" alt="">
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('profile')}}">{{__('master.profile')}}</a></li>
                                    <li><a href="{{route('logout')}}">{{__('master.logout')}}</a></li>
                                </ul>
                            </div>
                        @endauth

                        @guest
                            <a id="loginButton" href="{{route('login')}}" style="color: #3ec0c2;" class="m-5">{{__('master.login')}}</a>
                        @endguest
                    </div>

                    <div class="dropdown">
                        <button style="background-color: #3ec0c2;color: white;" class="dropdown-toggle"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('master.language')}}
                        </button>
                        <ul class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li><a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"  data-language="{{ $localeCode }}">{{ $properties['native'] }}</a> </li>
                                    @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
