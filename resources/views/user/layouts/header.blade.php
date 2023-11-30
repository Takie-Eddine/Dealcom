<header class="header axil-header header-style-5 dealcom-header ">

    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-brand">
                    <a href="{{route('index')}}" class="logo logo-dark">
                        <img src="{{asset('frontend/assets/dealcom/images/logos/logo-light.png')}}" class="w-50" alt="Site Logo">
                    </a>
                    <a href="{{route('index')}}" class="logo logo-light">
                        <img src="{{asset('frontend/assets/dealcom/images/logos/logo-dark.png')}}" class="w-50" alt="Site Logo">
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

                            <li><a class="me-5 active" href="{{route('index')}}">الرئيسية</a></li>
                            <li><a href="contact.html">الفئات</a></li>
                            <li><a href="contact.html">مقالات</a></li>
                            <li><a href="contact.html">حول ديلكوم</a></li>
                            <li><a href="contact.html">تواصل معنا</a></li>
                            <li class="menu-item-has-children d-lg-none">
                                <a href="#">اللغة</a>
                                <ul class="axil-submenu">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li><a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"  data-language="{{ $localeCode }}">العربية</a></li>
                                    @endforeach
                                </ul>
                            </li>

                        </ul>


                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action d-flex ">
                    <!-- <ul class="action-list me-5">
                        <li class="my-account d-none d-lg-inline-block">
                            <a href="javascript:void(0)" class=" language-button btn btn-light">
                                اللغة
                            </a>
                            <div class="my-account-dropdown">
                                <ul>
                                    <li>
                                        <a href="#">العربية</a>
                                    </li>
                                    <li>
                                        <a href="#">English</a>
                                    </li>
                                </ul>

                            </div>
                        </li>

                        <li style="margin: 0;" class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler text-white">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul> -->

                    <div class="auth ms-2 d-none d-lg-inline-block">
                        <a id="loginButton" href="{{route('login')}}" style="color: #3ec0c2;" class="m-5">دخول</a>
                        <!-- <a href="#" class="btn-lg btn-danger text-white me-3"
                            style="background-color: #3ec0c2;">دخول</a> -->

                    </div>

                    <div class="dropdown">
                        <button style="background-color: #3ec0c2;color: white;" class="dropdown-toggle"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            اللغة
                        </button>
                        <ul class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li><a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"  data-language="{{ $localeCode }}">{{ $properties['native'] }}</a> </li>
                                    @endforeach
                            <!-- <li><a class="dropdown-item" href="#">Spanish</a></li> -->
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
