<!--Main Footer-->
<footer class="main-footer">
    <!--Footer Bottom-->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Column-->
                <div class="column col-md-3 col-sm-12 col-xs-12">
                    <div class="logo" style="background-image: url('{{ asset(imagePath($about->site_logo, 'abouts')) }}');background-size: contain;">
                        <a href="{{ route('frontend.home') }}"></a>
                    </div>
                </div>
                <!--Column-->
                <div class="column col-md-6 col-sm-12 col-xs-12">
                    <div class="text desc">{!! Str::limit($about->site_description, '300', '....') !!}
                        <a href="{{ route('frontend.about') }}">Read More</a>
                    </div>
                </div>
                <!--Column-->
                <div class="column col-md-3 col-sm-12 col-xs-12">
                    <ul class="social-icon-one">
                        <li><a href="{{ $about->facebook }}"><span class="fa fa-facebook"></span></a></li>
                        <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li class="g_plus"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                        <li class="linkedin"><a href="#"><span class="fa fa-linkedin"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Copyright Section-->
        <div class="copyright-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <ul class="footer-nav">
                            <li><a href="{{ route('frontend.policies') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('frontend.about') }}">About</a></li>
                            <li><a href="{{ route('frontend.terms') }}">Terms & Contidions</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="copyright">&copy; Copyright {{ $about->site_name }}. All rights reserved.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End Main Footer-->

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up" style="color: white"></span></div>

<!--End Scroll to top-->

<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox-media.js') }}"></script>
<script src="{{ asset('frontend/js/owl.js') }}"></script>
<script src="{{ asset('frontend/js/appear.js') }}"></script>
<script src="{{ asset('frontend/js/wow.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('frontend/js/color-settings.js') }}"></script>
<script src="{{ asset('frontend/js/script.js') }}"></script>
@section('footerelements')
@show
</body>
</html>

