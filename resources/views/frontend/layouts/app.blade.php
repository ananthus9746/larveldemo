<?php
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Archistone LLC </title>

    <!-- PLUGINS -->
    <link rel="shortcut icon" href="{{ url('assets/img/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ url('assets/plugins/tailwind/css/tailwind-bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/tw-elements/css/tw-elements.min.css') }}">

    <link rel="stylesheet" href="{{ url('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/select2/css/select2-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ url('assets/plugins/wow/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome/css/all.css') }}">

    <link rel="stylesheet" href="{{ url('assets/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/slick/slick-theme.css') }}">

    <link rel="stylesheet" href="{{ url('assets/plugins/swiper/css/swiper-bundle.min.css') }}">

    <link rel="stylesheet" href="{{ url('assets/plugins/fancybox/css/jquery.fancybox.min.css') }}">

    <!-- <link rel="stylesheet" href="{{ url('assets/plugins/revolution/css/settings.css" /> -') }}->
    <!-- <link rel="stylesheet" href="{{ url('assets/plugins/intltel-input/intlTelInput.min.css"> -') }}->
    <!-- <link rel="stylesheet" href="{{ url('assets/plugins/revolution-addons/particles/css/revolution.addon.particles.css?ver=1.0.3" type="text/css" media="all"" /> -') }}->

    <link rel="stylesheet" href="{{ url('assets/plugins/slider-revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/slider-revolution/css/navigation.css') }}">

    <!-- STYLES -->

    <link rel=" stylesheet" href="{{ url('assets/css/front/style.css') }}">
    <link rel=" stylesheet" href="{{ url('assets/css/front/responsive.css') }}">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>
    <div class="full-body">
        <div class="preloader" id="preloader">
            <div class="preloader-bg">
                <!-- <img src="{{ url('/') }}assets/img/gif/loading.gif" alt=""> -->
            </div>
        </div>

        <header class="header">
            <div class="mob_top_bar md:!hidden">
                <!-- <p>Get 10% discount on Digital Marketing Packages</p> -->
                <div class="flex gap-5 flex-wrap">
                    <p class="mb-0 text-center">
                        <i class="fas fa-phone-alt"></i> (+971) 52 301 4846
                    </p>

                    <!-- <p class="mb-0">
                        <i class="fas fa-envelope"></i> info@archistone.ae
                    </p> -->
                </div>
            </div>

            <div class="sticky_padding  md:pb-0 pb-[51px]"></div>

            <div class="bs-container md:block hidden">
                <div class="navbar">
                    <div class="logo wow animate__fadeIn">
                        <a href="{{ url('/') }}">
                            <img class="header_logo" src="{{ url('/assets/img/logo/logo.png') }}">
                        </a>
                    </div>
                    <div class="flex flex-col gap-5 items-end wow animate__fadeIn">
                        <div class="flex gap-x-7">
                            <span class="text-[14px] font-bold">
                                <a href="tel:+971523014846"><i class="text-sm mr-1 fas fa-phone-alt"></i>(+971) 52 301 4846</a>
                            </span>
                            <span class="text-[14px]  font-bold">
                                <a href="mailto:info@archistone.ae"><i class="text-sm mr-1 fas fa-envelope"></i>info@archistone.ae</a>
                            </span>
                        </div>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">
                                    <span class="line">
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/why-us') }}"><span class="line"> Why Us </span></a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/products') }}"><span class="line"> Products </span></a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/whats-new') }}"><span class="line"> What's New </span></a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/about-us') }}"><span class="line"> About Us </span></a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/contact-us') }}"><span class="line"> Contact Us </span></a></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="sticky_nav md:block hidden">
                <div class="bs-container">
                    <div class="navbar ">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img class="header_logo" src="{{ url('/assets/img/logo/logo_text.png') }}">
                            </a>
                        </div>
                        <ul class="nav">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">
                                    <span class="line">
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/why-us') }}"><span class="line"> Why Us </span></a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/products') }}"><span class="line"> Products </span></a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/whats-new') }}"><span class="line"> What's New </span></a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/about-us') }}"><span class="line"> About Us </span></a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/contact-us') }}"><span class="line"> Contact Us </span></a></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="mob-navbar md:hidden" data-te-navbar-ref>
                <div class="flex flex-col w-full items-center md:py-5 py-0">
                    <div class="flex md:mb-5 mb-2">
                        <a class="flex flex-col items-center text-gray-900 hover:text-gray-900 focus:text-gray-900 mt-2 lg:mt-0 mr-auto" href="{{ url('/') }}">
                            <img class="w-[250px] md:p-0 p-5" src="{{ url('/assets/img/logo/logo.png') }}" loading="lazy" />
                        </a>
                    </div>
                </div>
                <div class="flex items-center w-full justify-between border-b-[1px] border-white nav-menu-btn">
                    <button class="navbar-toggler py-3 px-5" type="button" data-target="#main_nav">
                        <span class="font-semibold font-martel">Menu</span> <i class="far fa-bars bar-icon"></i>
                    </button>
                </div>
                <div class="navbar-collapse w-full collapsed hidden close" id="main_nav">
                    <ul class="navbar-nav">
                        <div class="overflow-hidden">
                            <li class="mob-nav-item">
                                <a class="mob-nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="mob-nav-item">
                                <a class="mob-nav-link" href="{{ url('/products') }}">
                                    Products
                                </a>
                            </li>
                            <li class="mob-nav-item">
                                <a class="mob-nav-link" href="{{ url('/why-us') }}">
                                    Why Us
                                </a>
                            </li>
                            <li class="mob-nav-item">
                                <a class="mob-nav-link" href="{{ url('/about-us') }}">
                                    About Us
                                </a>
                            </li>
                            <li class="mob-nav-item">
                                <a class="mob-nav-link" href="{{ url('/contact-us') }}">
                                    Contact Us
                                </a>
                            </li>

                        </div>
                    </ul>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <div class="section-newsletter <?= isset($newsletterBgGray) ? 'bg-section-gray' :  '' ?>">
            <div class="bs-container md:px-3 px-0 md:!mb-0 md:!mt-[-71px] section-pb-mob">
                <div class="newsletter md:mb-0">
                    <div class="newsletter-textbox">
                        <h3 class="sub-heading">Get Updates</h3>
                        <h1 class="heading"><span>Subscribe to</span> the Newsletter</h1>
                    </div>
                    <div class="newsletter-box">
                        <form name="newsletter_signup" id="newsletter_signup">
                            <input type="text" class="newsletter-box-input" id="emailaddress" name="emailaddress" placeholder="Type your email address">
                            <button class="main_btn btn_effect" title="SUBSCRIBE"> <span>SUBSCRIBE</span> </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="black-bg">
                <div class="bs-container footer-cont">
                    <div class="flex md:flex-row flex-col justify-between md:gap-[100px] gap-12">
                        <div class="footer-col-1 md:max-w-[27%] wow animate__fadeInUp">
                            <h2 class="footer-heading font-bold mb-5">We're on a mission.</h2>
                            <p class="font-medium text-justify leading-7 md:mb-5 mb-0">
                                At Archistone, We are fueled by an unwavering passion for architectural design and craftsmanship. Our dedication to creating spaces that inspire and awe is the cornerstone of our work.
                                With an acute attention to detail and an eye for elegance, we meticulously curate the finest selection of stone and marble.
                            </p>

                        </div>
                        <div class="footer-col-2 wow animate__fadeInUp">
                            <h2 class="footer-heading font-bold mb-7"> Products </h2>
                            <ul class="f_services_links">
                                <li><a href="{{ url('/products#products') }}"> Adicon </a></li>
                                <li><a href="{{ url('/products#products') }}"> Atlas Plan </a></li>
                                <li><a href="{{ url('/products#products') }}"> Casla Quartz </a></li>
                                <li><a href="{{ url('/products#products') }}"> Castle Stones </a></li>
                                <li><a href="{{ url('/products#products') }}"> Terrazzo </a></li>
                            </ul>
                        </div>
                        <div class="footer-col-3 wow animate__fadeInUp">
                            <h2 class="footer-heading font-bold mb-7"> Quick Links </h2>
                            <ul class="quick_links">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/products') }}">Products</a></li>
                                <li><a href="{{ url('/why-us') }}">Why Us</a></li>
                                <li><a href="{{ url('/about-us') }}">About Us</a></li>
                                <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="footer-col-4 contact_details md:max-w-[27%] wow animate__fadeInUp">
                            <h2 class="footer-heading font-bold mb-7"> Contact Details </h2>
                            <p><span class="font-semibold">Address:</span> &nbsp; 62 22nd St - Al Quoz - Al Quoz Industrial <br class="hidden md:block"> Area 3 - Dubai, United Arab Emirate</p>
                            <div class="flex gap-2">
                                <div>
                                    <p class="font-semibold">
                                        Phone:
                                    </p>
                                </div>
                                <div class="flex md:flex-row flex-col mb-5 md:gap-5 gap-1">
                                    <p class="!mb-0">(+971) 52 301 4846</p>
                                </div>
                            </div>

                            <p class="!mb-7"> <span class="font-semibold"> Email:</span> &nbsp; info@archistone.ae</p>

                            <div class="social_media_link">
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://www.instagram.com/archistone.llc/" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://www.linkedin.com/company/archistone-piedra/" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="https://twitter.com/Archistone_">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bs-container">
                    <div class="footer_copyright">
                        <p>Copyright © 2023 All Rights Reserved</p>
                        <p class="leading-6">Designed &amp; Developed by <br class="md:hidden"> <span><a href="https://ulegendarydigital.com/">ULEGENDARY DIGITAL</a> </span></p>
                    </div>
                </div>
            </div>
        </footer>


        <div class="widget-call-wrap minimize" style="z-index: 1000">
            <a href="https://api.whatsapp.com/send?phone=+971523014846&amp;text=Hi" target="_blank" class="btn-chat fade-in contact1" data-toggle="tooltip" title="" data-placement="right" data-original-title="WhatsApp"><i class="fab fa-whatsapp fa-2x"></i></a>
            <a href="https://www.facebook.com/" target="_blank" class="contact2 btn-chat fade-in" data-toggle="tooltip" title="" data-placement="right" data-original-title="Facebook"><i class="fab fa-facebook-f fa-2x"></i></a>
            <a style="background-color: #113F6D;" href="tel:+971523014846" class="contact2 btn-chat fade-in" data-toggle="tooltip" title="" data-placement="right" data-original-title="Call Now"><i class="fa fa-phone-alt fa-2x"></i></a>
            <a style="background-color: #4ec248;" href="javascript:;" id="asfar-widget-social" class="action !mb-0"><i class="btn-icon-open fa fa-phone-alt fa-2x"></i> <i class="btn-icon-close fa fa-times fa-2x"></i> </a>
        </div>


        <div class="progress-wrap cursor-pointer active-progress">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 284.733;"></path>
            </svg>
            <i class="far fa-angle-up back-top-icon"></i>
        </div>
    </div>

    <!-- PLUGINS -->
    <script src="{{ url('assets/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- <script src="{{ url('assets/plugins/country-states/js/country-states.js"></') }}script> -->
    <script src="{{ url('assets/plugins/counterup2/js/counterup.js') }}"></script>
    <script src="{{ url('assets/plugins/smooth-scroll/js/smoothscroll.min.js') }}"></script>
    <script src="{{ url('assets/plugins/jquery-sticky/js/jquery.sticky.min.js') }}"></script>
    <script src="{{ url('assets/plugins/tailwind/js/tailwind.min.js') }}"></script>
    <script src="{{ url('assets/plugins/tw-elements/js/tw-elements.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ url('assets/plugins/swiper/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('assets/plugins/fancybox/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ url('assets/plugins/wow/js/wow.min.js') }}"></script>
    <script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slider-revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slider-revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{ url('assets/plugins/slider-revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slider-revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slider-revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slider-revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slider-revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slider-revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slider-revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slider-revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slider-revolution/js/extensions/revolution.extension.video.min.js') }}"></script>


    <script src="{{ url('assets/js/front/script.js') }}"></script>


    </body>

</html>