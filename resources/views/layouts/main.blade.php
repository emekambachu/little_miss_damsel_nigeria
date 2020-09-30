<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Little miss damsel nigeria, beauty pageant, modeling agency, port hacourt" />
    <meta name="description" content="Little miss damsel nigeria. beauty pageant" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Little Miss Damsel Nigeria (LMDN)</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ asset('main/lmdn_logo_500.png') }}" />

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/bootstrap.min.css') }}"/>

    <!-- animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/animate.css') }}"/>

    <!-- owl-carousel -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/owl.carousel.css') }}">

    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/font-awesome.css') }}"/>

    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/themify-icons.css') }}"/>

    <!-- flaticon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/flaticon.css') }}"/>

    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/revolution/css/layers.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('main/revolution/css/settings.css') }}">

    <!-- prettyphoto -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/prettyPhoto.css') }}">

    <!-- shortcodes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/shortcodes.css') }}"/>

    <!-- main -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/main.css') }}"/>

    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/responsive.css') }}"/>

</head>

<body>

<!--page start-->
<div class="page">

    <!-- preloader start -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- preloader end -->

    <!--header start-->
    <header id="masthead" class="header ttm-header-style-classic">

        <!--topbar start-->
        <div class="ttm-topbar-wrapper ttm-bgcolor-skincolor ttm-textcolor-white clearfix">
            <div class="container-fluid">
                <div class="ttm-topbar-content">
                    <ul class="top-contact text-left">
                        <li class="list-inline-item"><i class="fa fa-map-marker"></i>
                            Plot f6 Abacha road GRA, Port Harcourt, Rivers state, Nigeria</li>
                        <li class="list-inline-item"><strong><i class="fa fa-phone"></i>
                                Call:</strong> 08091304065, 08181073065, 09014818914</li>
                    </ul>
                    <div class="topbar-right text-right">
                        <ul class="top-contact">
                            <li class="list-inline-item"><strong><i class="fa fa-envelope-o"></i>Email :</strong>
                                <a href="mailto:info@example.com"> info@littlemissdamsel.com</a>
                            </li>
                        </ul>
                        <div class="ttm-social-links-wrapper list-inline">
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/Lmdn-167051790625335/">
                                        <i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/littlemissdamselnigeria/">
                                        <i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--topbar end-->

        <!-- ttm-header-wrap -->
        <div id="ttm-header-wrap">
            <!-- ttm-stickable-header-w -->
            <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                <div id="site-header-menu" class="site-header-menu">
                    <div class="site-header-menu-inner ttm-stickable-header">
                        <div class="container">
                            <div class="site-header-main">
                                <!-- site-branding -->
                                <div class="site-branding">
                                    <a class="home-link" href="{{ url('/') }}" title="Little Miss Damsel Nigeria" rel="home">
                                        <img id="logo" class="img-center" src="{{ asset('main/lmdn_logo_500.png') }}" alt="">
                                    </a>
                                </div><!-- site-branding end -->
                                <!--site-navigation -->
                                <div id="site-navigation" class="site-navigation">
                                    <div class="ttm-menu-toggle">
                                        <input type="checkbox" id="menu-toggle-form" />
                                        <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                            <span class="toggle-block toggle-blocks-1"></span>
                                            <span class="toggle-block toggle-blocks-2"></span>
                                            <span class="toggle-block toggle-blocks-3"></span>
                                        </label>
                                    </div>
                                    <nav id="menu" class="menu">
                                        <ul class="dropdown">
                                            <li><a href="{{ url('/') }}">Home</a></li>
                                            <li><a href="{{ route('vote-contestants.index') }}">Contestants</a></li>
                                            <li><a href="{{ url('fashion-exhibition') }}">Fashion Exhibition</a></li>
{{--                                            <li><a href="{{ url('about') }}">About us</a></li>--}}
                                            <li><a href="{{ url('registration') }}">Registration</a></li>
                                            <li><a href="{{ url('contact') }}">Contact us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!--site-navigation end-->
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- ttm-stickable-header-w end-->
        </div><!--ttm-header-wrap end -->

        @yield('contents')

    <!--footer-->
    <footer class="footer widget-footer bg-img11 ttm-bgcolor-black ttm-bg ttm-bgimage-yes clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>

        <div class="second-footer">
            <div class="container">
                <div class="second-footer-inner">
                    <div class="row">

                        <div class="widget-area col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="widget widget-out-link clearfix ">
                                <div class="company-info">
                                    <div class="company-logo">
                                        <img src="{{ asset('main/lmdn_logo_500.png') }}" alt="company-logo">
                                    </div>
                                </div>

                                <div class="ttm-social-link-wrapper">
                                    <ul class="social-icons">
                                        <li><a href="https://www.facebook.com/Lmdn-167051790625335/"
                                               target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://www.instagram.com/littlemissdamselnigeria/"
                                               target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="widget-area col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="widget widget_nav_menu clearfix">
                                <h4 class="widget-title">Quick Links </h4>
                                <ul class="menu-footer-services">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('fashion-exhibition') }}">Fashion Exhibition</a></li>
{{--                                    <li><a href="{{ url('about') }}">About</a></li>--}}
                                    <li><a href="{{ url('registration') }}">Registration</a></li>
                                    <li><a href="{{ url('contact') }}">Contact us</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget-area col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="widget widget-out-link clearfix">
                                <h4 class="widget-title">Contact Us</h4>
                                <ul class="widget-contact">
                                    <li><i class="fa fa-map-marker"></i> Plot f6 Abacha road GRA, Port Harcourt, Rivers state, Nigeria</li>
                                    <li><i class="fa fa-envelope-o"></i><a href="#">info@littlemissdamselnigeria.com</a></li>
                                    <li><i class="fa fa-phone"></i>08091304065, <br>08181073065, <br>09014818914  </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-footer-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12 ttm-footer2-right">
                        <p align="center">Copyright © {{ date('Y') }} Little Miss Damsel Nigeria. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer-END-->

</div><!-- page end -->

<!--back-to-top start-->
<a id="totop" href="#top">
    <i class="fa fa-angle-up"></i>
</a>
<!--back-to-top end-->

<!-- Javascript -->
<script src="{{ asset('main/js/jquery.min.js') }}"></script>
<script src="{{ asset('main/js/tether.min.js') }}"></script>
<script src="{{ asset('main/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('main/js/jquery.easing.js') }}"></script>
<script src="{{ asset('main/js/jquery-waypoints.js') }}"></script>
<script src="{{ asset('main/js/owl.carousel.js') }}"></script>
<script src="{{ asset('main/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('main/js/numinate.min6959.js?ver=4.9.3') }}"></script>
<script src="{{ asset('main/js/main.js') }}"></script>

<!-- Revolution Slider -->
<script src="{{ asset('main/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('main/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('main/revolution/js/slider.js') }}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->

<script src="{{ asset('main/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('main/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('main/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('main/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('main/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('main/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('main/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('main/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Oct 24, 2020 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

@yield('bottom-scripts')

<!-- Javascript end-->

</body>

</html>
