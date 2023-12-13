<footer class="axil-footer-area footer-style-1 footer-dark">
    <!-- Start Footer Top Area  -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- Start Single Widget  -->
                <div class="col-md-3 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">بيع/شراء</h5>
                        <div class="inner">
                            <ul>
                                {{-- <li><a href="about-us.html">الخطط</a></li>
                                <li><a href="about-us.html">كيف تبيع</a></li> --}}
                                <li><a href="blog.html">كيف اشتري</a></li>
                                <li><a href="{{route('category')}}">فئات</a></li>
                                <li><a href=""> أراء العملاء</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-md-3 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">خدمات</h5>
                        <div class="inner">
                            <ul>
                                <li><a href="">خدمات الشحن</a></li>
                                <li><a href="">خدمات تحويل الاموال</a></li>
                                <li><a href="">ترجمة</a></li>
                                <li><a href="">معارض تجارية</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-md-3 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">حول ديلكوم</h5>
                        <div class="inner">
                            <ul>
                                <li><a href="{{route('about')}}">من نحن</a></li>
                                <li><a href="">لماذا ديلكوم</a></li>
                                {{-- <li><a href="cart.html">خدمات</a></li> --}}
                                <li><a href="">المدونات</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-md-3 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">خدمة العملاء</h5>
                        <div class="inner">
                            <ul>
                                {{-- <li><a href="privacy-policy.html">التعليمات</a></li> --}}
                                <li><a href="terms-of-service.html">سياسة الخصوصية</a></li>
                                <li><a href="{{route('contact')}}">اتصل بنا</a></li>
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
