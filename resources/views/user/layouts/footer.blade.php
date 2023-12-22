<footer class="axil-footer-area footer-style-1 footer-dark">
    <!-- Start Footer Top Area  -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- Start Single Widget  -->
                <div class="col-md-3 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">{{__('master.by/sell')}}</h5>
                        <div class="inner">
                            <ul>
                                {{-- <li><a href="about-us.html">الخطط</a></li>
                                <li><a href="about-us.html">كيف تبيع</a></li> --}}
                                <li><a href="{{route('howtoby')}}" >{{__('master.how by')}} </a></li>
                                <li><a href="{{route('category')}}">{{__('master.categories')}}</a></li>
                                <li><a href=""> {{__('master.customer review')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-md-3 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">{{__('master.services')}}</h5>
                        <div class="inner">
                            <ul>
                                <li><a href="#">{{__('master.shipping services')}} </a></li>
                                <li><a href="#">{{__('master.money transfer services')}}  </a></li>
                                <li><a href="#">{{__('master.translation')}} </a></li>
                                <li><a href="#">{{__('master.trade shows')}} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-md-3 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">{{__('master.about dealcom')}} </h5>
                        <div class="inner">
                            <ul>
                                <li><a href="{{route('about')}}">{{__('master.who we are')}} </a></li>
                                <li><a href="{{route('commercial')}}">{{__('master.special brand')}}   </a></li>
                                {{-- <li><a href="cart.html">خدمات</a></li> --}}
                                <li><a href="">{{__('master.blogs')}} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-md-3 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">{{__('master.customer service')}} </h5>
                        <div class="inner">
                            <ul>
                                {{-- <li><a href="privacy-policy.html">التعليمات</a></li> --}}
                                <li><a href="">{{__('master.privacy policy')}} </a></li>
                                <li><a href="{{route('contact')}}">{{__('master.contact us')}} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
            </div>
        </div>
    </div>
    <!-- End Footer Top Area  -->
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-default separator-top">
        <div class="container">
            <div class="row align-items-right justify-content-right">
                <div class=" col-12 col-md-6">
                    <div class="copyright-right d-flex flex-wrap align-items-center">
                        <ul class="payment-icons-bottom quick-link">
                            <li><span>2023 &copy;</span><span>All Rights Reserved To <a href="https://lifetekno.net/"><span style="color: #3ec0c2;">Lifetekno</span></a></span></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-12 col-md-6">
                    <div class="copyright-left d-flex flex-wrap align-items-left">
                        <ul class="payment-icons-bottom quick-link">
                            <li><span><a href="https://www.facebook.com/dealcomar/"><img src="{{asset('assets/logo/facebook.png')}}" alt=""></a></span></li>
                            <li><span><a href="https://www.instagram.com/dealcom_ar/"><img src="{{asset('assets/logo/instagram.png')}}" alt=""></a></span></li>
                            {{-- <li><span><a href=""><img src="{{asset('assets/logo/cross.png')}}" alt=""></a></span></li> --}}
                            <li><span><a href="https://www.youtube.com/channel/UCSRNCYgOei0h4I5TNa0FOSA"><img src="{{asset('assets/logo/youtube.png')}}" alt=""></a></span></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Copyright Area  -->
</footer>
