<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="@yield('meta_description', 'Solviera - Solusi Digital Terpercaya')">
    <meta name="keywords" content="@yield('meta_keywords', 'solviera, solusi digital, web development')">
    <meta name="author" content="Solviera">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    <title>@yield('title', config('app.name', 'Solviera'))</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontweb/images/favicon.png') }}">

    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="{{ asset('frontweb/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="{{ asset('frontweb/css/slicknav.min.css') }}" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{ asset('frontweb/css/swiper-bundle.min.css') }}">
    <!-- Font Awesome Icon Css-->
    <link href="{{ asset('frontweb/css/all.min.css') }}" rel="stylesheet" media="screen">
    <!-- Animated Css -->
    <link href="{{ asset('frontweb/css/animate.css') }}" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="{{ asset('frontweb/css/magnific-popup.css') }}">
    <!-- Mouse Cursor Css File -->
    <link rel="stylesheet" href="{{ asset('frontweb/css/mousecursor.css') }}">
    <!-- Main Custom Css -->
    <link href="{{ asset('frontweb/css/custom.css') }}" rel="stylesheet" media="screen">

    @stack('styles')
</head>

<body>

    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="{{ asset('frontweb/images/loader.svg') }}" alt=""></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">
            <nav class="container">
                <div class="navbar navbar-expand-lg">
                    <!-- Logo Start -->
                    <a class="navbar-brand" href="{{ route('front.home') }}">
                        <img src="{{ asset('frontweb/images/logo.svg') }}" alt="Logo">
                    </a>
                    <!-- Logo End -->

                    <!-- Main Menu Start -->
                    <div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item {{ request()->routeIs('front.home') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('front.home') }}">Home</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('front.about') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('front.about') }}">About Us</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('front.services') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('front.services') }}">Services</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('front.projects') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('front.projects') }}">Projects</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('front.blog') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('front.blog') }}">Blog</a>
                                </li>
                                <li class="nav-item submenu">
                                    <a class="nav-link" href="#">Pages</a>
                                    <ul>
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('front.gallery') }}">Gallery</a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('front.faqs') }}">FAQs</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item {{ request()->routeIs('front.contact') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('front.contact') }}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Header Btn Start -->
                        <div class="header-btn d-inline-flex">
                            <a href="{{ route('front.contact') }}" class="btn-default">get in touch</a>
                        </div>
                        <!-- Header Btn End -->
                    </div>
                    <!-- Main Menu End -->
                    <div class="navbar-toggle"></div>
                </div>
            </nav>
            <div class="responsive-menu"></div>
        </div>
    </header>
    <!-- Header End -->

    @yield('content')

    <!-- Footer Start -->
    <footer class="main-footer">
        <div class="container">
            <!-- Footer Header Start -->
            <div class="footer-header">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <!-- Footer Logo Start -->
                        <div class="footer-logo">
                            <img src="{{ asset('frontweb/images/footer-logo.svg') }}" alt="Footer Logo">
                        </div>
                        <!-- Footer Logo End -->
                    </div>

                    <div class="col-lg-8">
                        <div class="footer-header-right">
                            <!-- Footer Contact Start -->
                            <div class="footer-mail">
                                <a href="mailto:info@solviera.com">info@solviera.com</a>
                            </div>
                            <!-- Footer Contact End -->

                            <!-- Footer Social Link Start -->
                            <div class="footer-social-links">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                </ul>
                            </div>
                            <!-- Footer Social Link End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Header End -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Footer Links Start -->
                    <div class="footer-links">
                        <h3>information</h3>
                        <ul>
                            <li><a href="{{ route('front.about') }}">about our company</a></li>
                            <li><a href="{{ route('front.services') }}">view our service</a></li>
                            <li><a href="{{ route('front.blog') }}">read our blog</a></li>
                            <li><a href="{{ route('front.projects') }}">our latest projects</a></li>
                        </ul>
                    </div>
                    <!-- Footer Links End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Footer Links Start -->
                    <div class="footer-links">
                        <h3>quick links</h3>
                        <ul>
                            <li><a href="{{ route('front.home') }}">home</a></li>
                            <li><a href="{{ route('front.gallery') }}">gallery</a></li>
                            <li><a href="{{ route('front.faqs') }}">faqs</a></li>
                            <li><a href="{{ route('front.contact') }}">contact us</a></li>
                        </ul>
                    </div>
                    <!-- Footer Links End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Footer Contact Box Start -->
                    <div class="footer-contact-box footer-links">
                        <h3>contact us</h3>
                        <!-- Footer Contact Item Start -->
                        <div class="footer-contact-item">
                            <div class="icon-box">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="footer-contact-content">
                                <p>+62 21 1234 5678</p>
                            </div>
                        </div>
                        <!-- Footer Contact Item End -->

                        <!-- Footer Contact Item Start -->
                        <div class="footer-contact-item">
                            <div class="icon-box">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="footer-contact-content">
                                <p>info@solviera.com</p>
                            </div>
                        </div>
                        <!-- Footer Contact Item End -->

                        <!-- Footer Contact Item Start -->
                        <div class="footer-contact-item">
                            <div class="icon-box">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="footer-contact-content">
                                <p>Jl. Sudirman No. 123, Jakarta Selatan 12190</p>
                            </div>
                        </div>
                        <!-- Footer Contact Item End -->
                    </div>
                    <!-- Footer Contact Box End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Footer Newsletter Form Start -->
                    <div class="footer-latest-news footer-links">
                        <h3>get the latest trending news</h3>

                        <div class="footer-newsletter-form">
                            <p>Get Exclusive Design Straight Your Inbox!</p>
                            <form id="newslettersForm" action="#" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="mail"
                                        placeholder="Enter your email" required>
                                    <button type="submit"><i class="fa-solid fa-arrow-right-long"></i> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Footer Newsletter Form End -->
                </div>
            </div>

            <!-- Footer Copyright Section Start -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Footer Copyright Start -->
                        <div class="footer-copyright-text">
                            <p>Copyright © {{ date('Y') }} {{ config('app.name', 'Solviera') }}. All Rights
                                Reserved.</p>
                        </div>
                        <!-- Footer Copyright End -->
                    </div>
                </div>
            </div>
            <!-- Footer Copyright Section End -->
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Jquery Library File -->
    <script src="{{ asset('frontweb/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js file -->
    <script src="{{ asset('frontweb/js/bootstrap.min.js') }}"></script>
    <!-- Validator js file -->
    <script src="{{ asset('frontweb/js/validator.min.js') }}"></script>
    <!-- SlickNav js file -->
    <script src="{{ asset('frontweb/js/jquery.slicknav.js') }}"></script>
    <!-- Swiper js file -->
    <script src="{{ asset('frontweb/js/swiper-bundle.min.js') }}"></script>
    <!-- Counter js file -->
    <script src="{{ asset('frontweb/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontweb/js/jquery.counterup.min.js') }}"></script>
    <!-- Isotop js file -->
    <script src="{{ asset('frontweb/js/isotope.min.js') }}"></script>
    <!-- Magnific js file -->
    <script src="{{ asset('frontweb/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- SmoothScroll -->
    <script src="{{ asset('frontweb/js/SmoothScroll.js') }}"></script>
    <!-- Parallax js -->
    <script src="{{ asset('frontweb/js/parallaxie.js') }}"></script>
    <!-- MagicCursor js file -->
    <script src="{{ asset('frontweb/js/gsap.min.js') }}"></script>
    <script src="{{ asset('frontweb/js/magiccursor.js') }}"></script>
    <!-- Text Effect js file -->
    <script src="{{ asset('frontweb/js/SplitText.js') }}"></script>
    <script src="{{ asset('frontweb/js/ScrollTrigger.min.js') }}"></script>
    <!-- YTPlayer js File -->
    <script src="{{ asset('frontweb/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <!-- Wow js file -->
    <script src="{{ asset('frontweb/js/wow.min.js') }}"></script>
    <!-- Main Custom js file -->
    <script src="{{ asset('frontweb/js/function.js') }}"></script>

    @stack('scripts')
</body>

</html>
