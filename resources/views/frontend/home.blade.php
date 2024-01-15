@extends('frontend.layouts.app')

@section('content')


<?php
    $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
?>

<div class="home-page">

    {{-- <section class="section-home-carousel">
        <article class="content">
            <div id="rev_slider_1050_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="webproduct-light" data-source="gallery" style="background-color: transparent; padding: 0px">
                <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                <div id="rev_slider_1050_1" class="rev_slider fullscreenbanner" style="display: none" data-version="5.4.1">
                    <ul>
                        <!-- SLIDE  -->
                        <li data-index="rs-2938" data-transition="slideovertotop" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="1500" data-thumb="../assets/images/express_bglight-100x50.jpg" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ url('assets/img/home/slider/1.webp') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina />
                            <!-- LAYERS -->
                        </li>
                        <!-- SLIDE  -->
                        <li data-index="rs-2939" data-transition="papercut" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="1500" data-thumb="../assets/images/desktopbg1-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Examples" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ url('assets/img/home/slider/2.webp') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina />
                            <!-- LAYERS -->
                        </li>
                        <!-- SLIDE  -->
                        <li data-index="rs-2940" data-transition="flyin" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="1500" data-thumb="../assets/images/mountainbg-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Easy to Use" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ url('assets/img/home/slider/3.webp') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina />
                            <!-- LAYERS -->
                        </li>
                        <!-- SLIDE  -->
                        <li data-index="rs-2941" data-transition="slideremovevertical" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="1500" data-thumb="../assets/images/officeloop_cover-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Get a License" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ url('assets/img/home/slider/4.webp') }}" alt="" data-bgposition="center center" data-bgfit="cover" class="rev-slidebg" data-no-retina />
                            <!-- LAYERS -->
                        </li>
                        <!-- SLIDE  -->
                        <li data-index="rs-2942" data-transition="slideremovevertical" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="1500" data-thumb="../assets/images/officeloop_cover-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Get a License" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ url('assets/img/home/slider/5.webp') }}" alt="" data-bgposition="center center" data-bgfit="cover" class="rev-slidebg" data-no-retina />
                            <!-- LAYERS -->
                        </li>
                    </ul>
                    <div style="" class="tp-static-layers">
                        <!-- LAYER NR. 29 -->
                        <div class="tp-caption - tp-static-layer" id="slider-1050-layer-1" data-x="['right','right','right','right']" data-hoffset="['30','30','30','30']" data-y="['top','top','top','top']" data-voffset="['30','30','30','30']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-actions='[{"event":"click","action":"toggleclass","layer":"slider-1050-layer-1","delay":"0","classname":"open"},{"event":"click","action":"togglelayer","layerstatus":"hidden","layer":"slider-1050-layer-3","delay":"0"},{"event":"click","action":"togglelayer","layerstatus":"hidden","layer":"slider-1050-layer-4","delay":"0"},{"event":"click","action":"togglelayer","layerstatus":"hidden","layer":"slider-1050-layer-5","delay":"0"},{"event":"click","action":"togglelayer","layerstatus":"hidden","layer":"slider-1050-layer-6","delay":"0"}]' data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-startslide="0" data-endslide="3" data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"auto:auto;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="
                                z-index: 33;
                                white-space: nowrap;
                                font-size: 20px;
                                line-height: 22px;
                                font-weight: 400;
                                color: rgba(255, 255, 255, 1);
                            ">
                            <div id="rev-burger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <!-- LAYER NR. 32 -->
                        <div class="tp-caption WebProduct-Menuitem tp-static-layer" id="slider-1050-layer-3" data-x="['right','right','right','right']" data-hoffset="['120','120','120','120']" data-y="['top','top','top','top']" data-voffset="['30','30','30','30']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-2938","delay":""},{"event":"click","action":"simulateclick","layer":"slider-1050-layer-7","delay":"0"}]' data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-startslide="0" data-endslide="3" data-frames='[{"delay":"bytrigger","speed":800,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"x:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Linear.easeNone","force":true,"to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(153, 153, 153, 1.00);bg:rgba(255, 255, 255, 1.00);bw:0 0 0 0;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[3,3,3,3]" data-paddingright="[5,5,5,5]" data-paddingbottom="[3,3,3,3]" data-paddingleft="[8,8,8,8]" data-lasttriggerstate="keep" style="
                                z-index: 36;
                                white-space: nowrap;
                                border-width: 0px 0px 0px 0px;
                                cursor: pointer;
                            ">
                            INTRO
                        </div>

                        <!-- LAYER NR. 33 -->
                        <div class="tp-caption WebProduct-Menuitem tp-static-layer" id="slider-1050-layer-4" data-x="['right','right','right','right']" data-hoffset="['120','120','120','120']" data-y="['top','top','top','top']" data-voffset="['61','61','61','61']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-2939","delay":""},{"event":"click","action":"simulateclick","layer":"slider-1050-layer-7","delay":"0"}]' data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-startslide="0" data-endslide="3" data-frames='[{"delay":"bytrigger","speed":800,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"x:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Linear.easeNone","force":true,"to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(153, 153, 153, 1.00);bg:rgba(255, 255, 255, 1.00);bw:0 0 0 0;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[3,3,3,3]" data-paddingright="[5,5,5,5]" data-paddingbottom="[3,3,3,3]" data-paddingleft="[8,8,8,8]" data-lasttriggerstate="keep" style="
                                z-index: 37;
                                white-space: nowrap;
                                border-width: 0px 0px 0px 0px;
                                cursor: pointer;
                            ">
                            EXAMPLES
                        </div>

                        <!-- LAYER NR. 34 -->
                        <div class="tp-caption WebProduct-Menuitem tp-static-layer" id="slider-1050-layer-5" data-x="['right','right','right','right']" data-hoffset="['120','120','120','120']" data-y="['top','top','top','top']" data-voffset="['92','92','92','92']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-2940","delay":""},{"event":"click","action":"simulateclick","layer":"slider-1050-layer-7","delay":"0"}]' data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-startslide="0" data-endslide="3" data-frames='[{"delay":"bytrigger","speed":800,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"x:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Linear.easeNone","force":true,"to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(153, 153, 153, 1.00);bg:rgba(255, 255, 255, 1.00);bw:0 0 0 0;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[3,3,3,3]" data-paddingright="[5,5,5,5]" data-paddingbottom="[3,3,3,3]" data-paddingleft="[8,8,8,8]" data-lasttriggerstate="keep" style="
                                z-index: 38;
                                white-space: nowrap;
                                border-width: 0px 0px 0px 0px;
                                cursor: pointer;
                            ">
                            EASY TO USE
                        </div>

                        <!-- LAYER NR. 35 -->
                        <div class="tp-caption WebProduct-Menuitem tp-static-layer" id="slider-1050-layer-6" data-x="['right','right','right','right']" data-hoffset="['120','120','120','120']" data-y="['top','top','top','top']" data-voffset="['123','123','123','123']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-2941","delay":"0"},{"event":"click","action":"simulateclick","layer":"slider-1050-layer-7","delay":"0"}]' data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-startslide="0" data-endslide="3" data-frames='[{"delay":"bytrigger","speed":800,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"x:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Linear.easeNone","force":true,"to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(153, 153, 153, 1.00);bg:rgba(255, 255, 255, 1.00);bw:0 0 0 0;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[3,3,3,3]" data-paddingright="[5,5,5,5]" data-paddingbottom="[3,3,3,3]" data-paddingleft="[8,8,8,8]" data-lasttriggerstate="keep" style="
                                z-index: 39;
                                white-space: nowrap;
                                border-width: 0px 0px 0px 0px;
                                cursor: pointer;
                            ">
                            BUY LICENSE
                        </div>
                    </div>
                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important"></div>
                </div>
            </div>
        </article>
    </section> --}}

    <div class="hero-section">
        <video autoplay muted loop class="hero-section-video">
            <source src="{{ url("assets/video/hero-section.mp4") }}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>

        <div class="content">
            <div class="bs-container">
                <div class="content-wrapper">
                    <h1 class="heading md:text-2xl text-lg leading-5 mb-6 wow animate__fadeInRight"> Elevating Spaces with Stone and Marble </h1>
                    <p class="text md:text-lg text-sm md:mb-8 wow animate__fadeInLeft">
                        Immerse yourself in the timeless beauty of stone and marble. Archistone crafts exceptional architectural designs, transforming your spaces into works of enduring artistry
                    </p>
                    <a href="{{ url('/about-us') }}" class="btn-style ">Know More</a>
                </div>
            </div>
        </div>
    </div>

    <section class="section-info">
        <div class="grid md:grid-cols-3 grid-cols-1">
            <div class="col-span-1 info-box wow animate__bounceInLeft" style="background-image: url('{{ url('/assets/img/home/bars/map-bg.jpg') }}'); background-size: cover;">
                <h4 class="text-xl font-bold mb-4">Maps, Directions & Locations</h4>
                <p class="md:mb-6 mb-4">62 22nd St - Al Quoz - Al Quoz Industrial Area 3 - Dubai, United Arab Emirate</p>
                <div>
                    <a href="{{ url('/contact-us#section-map') }}" class="btn-style btn-style-fill">Get Directions</a>
                </div>
            </div>
            <div class="col-span-1 info-box wow animate__bounceInUp" style="background-image: url('{{ url('/assets/img/home/bars/health-bg.jpg') }}'); background-size: cover; background-position: top;">
                <h4 class="text-xl font-bold mb-4">Our Exquisite Collection</h4>
                <p class="md:mb-6 mb-4"> Immerse yourself in the exceptional quality and versatility of our showcased stone and marble. </p>
                <div>
                    <a href="{{ url('/products') }}" class="btn-style btn-style-fill">View Products</a>
                </div>
            </div>
            <div class="col-span-1 info-box wow animate__bounceInRight" style="background-image: url('{{ url('/assets/img/home/bars/appoint-bg.jpg') }}'); background-size: cover;">
                <h4 class="text-xl font-bold mb-4">Get a Quote</h4>
                <p class="md:mb-6 mb-4">Request a Quote Today and transform your space with our exceptional stone and marble designs.</p>
                <div>
                    <a href="{{ url('/contact-us') }}" class="btn-style btn-style-fill">Get a Quote</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-about section-py md:mb-0 mb-5">
        <div class="bs-container">
            <div class="grid md:grid-cols-12 grid-cols-1 md:gap-20 gap-16">
                <div class="md:col-span-6 flex items-center wow animate__fadeInRight">
                    <div>
                        {{-- <h6 class="h-tag md:mb-2 mb-4"> About Us </h6> --}}
                        <h1 class="section-heading mb-6">
                            Our
                            <span class="text-gradient-dark"> Story</span>
                        </h1>
                        <p class="mb-8 md:pl-10 home-about-text">
                            At Archistone, We are fueled by an unwavering passion for architectural design and craftsmanship. Our dedication to creating spaces that inspire and awe is the cornerstone of our work. With an acute attention to detail and an eye for elegance, we meticulously curate the finest selection of stone and marble. Harnessing the expertise of our skilled artisans, we breathe life into visions, transforming mundane spaces into remarkable works of art. <br><br> Our commitment to excellence permeates every aspect of our projects, ensuring the fulfillment of our clients' dreams and the creation of enduring beauty. Step into a world where imagination meets precision, and let us redefine what's possible in architectural design.
                        </p>
                        <a class="btn btn-base btn-style md:ml-10" href="{{ url('/products') }}" title="View Products"><span>View Products</span></a>
                    </div>
                </div>
                <div class="md:col-span-6">
                    <div class="home-about-slider">
                        <div class="home-about-slider-item">
                            <img src="{{ url('/assets/img/home/about-slider/1.webp') }}">
                        </div>
                        <div class="home-about-slider-item">
                            <img src="{{ url('/assets/img/home/about-slider/2.webp') }}">
                        </div>
                        <div class="home-about-slider-item">
                            <img src="{{ url('/assets/img/home/about-slider/3.webp') }}">
                        </div>
                        <div class="home-about-slider-item">
                            <img src="{{ url('/assets/img/home/about-slider/4.webp') }}">
                        </div>
                        <div class="home-about-slider-item">
                            <img src="{{ url('/assets/img/home/about-slider/5.webp') }}">
                        </div>
                        <div class="home-about-slider-item">
                            <img src="{{ url('/assets/img/home/about-slider/6.webp') }}">
                        </div>
                        <div class="home-about-slider-item">
                            <img src="{{ url('/assets/img/home/about-slider/7.webp') }}">
                        </div>
                        <div class="home-about-slider-item">
                            <img src="{{ url('/assets/img/home/about-slider/8.webp') }}">
                        </div>
                        <div class="home-about-slider-item">
                            <img src="{{ url('/assets/img/home/about-slider/9.webp') }}">
                        </div>
                        <div class="home-about-slider-item">
                            <img src="{{ url('/assets/img/home/about-slider/10.webp') }}">
                        </div>
                    </div>
                </div>
                {{-- <div class="home-about-col md:col-span-6 md:block flex flex-col-reverse relative  wow animate__fadeInLeft ">
                    <div class="experience">
                        <span class="year">12+</span>
                        <span class="text">Years Experience</span>
                    </div>
                    <div class="description">
                        <p>
                            Experience awe-inspiring architectural design and craftsmanship. Trust our expertise in transforming ordinary spaces into extraordinary works of art.
                        </p>
                    </div>
                    <div class="about-img">
                        <img src="{{ url('/assets/img/home/about.webp') }}" alt="">
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- <section class="section-py">
        <div class="bs-container">
            <div class="grid grid-cols-12 gap-24">
                <div class="col-span-5">
                    <div class="about-us-img-cont">
                        <div class="about-us-img-pattern"></div>
                        <div class="about-us-img-btm"></div>
                        <div class="about-us-img h-full bg-cover bg-center" style="background-image:url('assets/img/about-us/1.jpg');">
                        
                        </div>
                    </div>
                </div>
                <div class="col-span-7 flex items-center py-12">
                    <div>
                        <h6 class="h-tag mb-2"> About Us </h6>
                        <h1 class="section-heading mb-4">
                            Know About
                            <span class="text-gradient-dark"> Blue Orange</span>
                        </h1>
                        <p class="mb-8">
                            We specialize in Restaurant, Retail, and Hospitality Real Estate Brokerage. Working with clients to find and negotiate deals on leases and sales for commercial spaces.
                            <br><br>
                            In addition to real estate sales and marketing, focus on help market existing businesses for sale, key money, provide consulting services for restaurants, hotels and hospitality groups.
                            <br><br>
                            Our expertise is in developing highly effective operational systems, management procedures, hospitality services, staff training, beverage, menu & mystery shopping programs.
                        </p>
                        <button type="submit" class="website_btn_black btn_effect" title="View Services"><span>View Services</span></button>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="section-pb">
        <div class="bs-container">
            <div class="heading flex flex-col items-center mb-12">
                <h6 class="h-tag md:mb-2 mb-4 wow animate__fadeInLeft"> Explore </h6>
                <h1 class="section-heading mb-4 wow animate__fadeInRight">
                    The Complete
                    <span class="text-gradient-dark"> Collection </span>
                </h1>
            </div>
            
            <section class="section-strips mb-16">
                <div class="strips">
                    <div class="strip-container wow animate__fadeInLeft">
                        <a href="{{ url('products/sintered-stone/adicon/#products') }}">
                            <div class="strip" style="background-image: url(/assets/img/products/adicon/apollo-white.webp);">
                                <div class="strip-content">
                                    <h1>Adicon</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="strip-container wow animate__fadeInUp">
                        <a href="{{ url('/products/sintered-stone/atlasplan/#products') }}">
                            <div class="strip" style="background-image: url(/assets/img/products/atlas-plan/basaltina-volcano.webp);">
                                <div class="strip-content">
                                    <h1>Atlas Plan</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="strip-container wow animate__fadeInDown">
                        <a href="{{ url('/products#products') }}">
                            <div class="strip" style="background-image: url(/assets/img/products/casla-quartz/athena-slab.webp);">
                                <div class="strip-content">
                                    <h1>Casla Quartz</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="strip-container wow animate__fadeInUp">
                        <a href="{{ url('/products#products') }}">
                            <div class="strip" style="background-image: url(/assets/img/products/castle-stones/amazon-green.webp);">
                                <div class="strip-content">
                                    <h1>Castle Stones</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="strip-container wow animate__fadeInRight">
                        <a href="{{ url('/products/terrazzo/#products') }}">
                            <div class="strip" style="background-image: url(/assets/img/products/terrazzo/diamond-ice.webp);">
                                <div class="strip-content">
                                    <h1>Terrazzo</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            {{-- <div class="product-row grid md:grid-cols-5 grid-cols-1 gap-8 md:px-0 px-5 mb-12">
                <div class="col-span-1 wow animate__rotateInDownLeft">
                    <a href="{{ url('/products#products') }}">
                        <div class="product-item">
                            <div class="product-img-cont">
                                <div class="product-img">
                                    <img src="{{ url('/assets/img/products/adicon/apollo-white.webp') }}" alt="">
                                </div>
                            </div>
                            <div class="product-name mt-5">
                                <div class="product-heading">
                                    <h5 class="text-lg"> Adicon </h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-1 wow animate__fadeInLeft">
                    <div class="product-item">
                        <div class="product-img-cont">
                            <div class="product-img">
                                <img src="{{ url('/assets/img/products/atlas-plan/basaltina-volcano.webp') }}" alt="">
                            </div>
                        </div>
                        <div class="product-name mt-5">
                            <div class="product-heading">
                                <a href="{{ url('/products#products') }}">
                                    <h5 class="text-lg"> Atlas Plan </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 wow animate__fadeInUp">
                    <div class="product-item">
                        <div class="product-img-cont">
                            <div class="product-img">
                                <img src="{{ url('/assets/img/products/casla-quartz/athena-slab.webp') }}" alt="">
                            </div>
                        </div>
                        <div class="product-name mt-5">
                            <div class="product-heading">
                                <a href="{{ url('/products#products') }}">
                                    <h5 class="text-lg"> Casla Quartz </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 wow animate__fadeInRight">
                    <div class="product-item">
                        <div class="product-img-cont">
                            <div class="product-img">
                                <img src="{{ url('/assets/img/products/castle-stones/amazon-green.webp') }}" alt="">
                            </div>
                        </div>
                        <div class="product-name mt-5">
                            <div class="product-heading">
                                <a href="{{ url('/products#products') }}">
                                    <h5 class="text-lg"> Castle Stones </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 wow animate__rotateInDownRight">
                    <div class="product-item">
                        <div class="product-img-cont">
                            <div class="product-img">
                                <img src="{{ url('/assets/img/products/terrazzo/diamond-ice.webp') }}" alt="">
                            </div>
                        </div>
                        <div class="product-name mt-5">
                            <div class="product-heading">
                                <a href="{{ url('/products#products') }}">
                                    <h5 class="text-lg"> Terrazzo </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="flex items-center justify-center">
                <!-- <a href="{{ url('/') }}products" class="btn-style btn-style-fill">View All Products</a> -->
                <a href="{{ url('/products') }}" class="btn btn-base btn-style wow animate__hinge animate__jackInTheBox">View All Products</a>
            </div>
        </div>
    </section>

    
    <section class="section-marquee cp_wrapper section-pb">
        <div id="marquee">
            <div class="marquee" data-text="The Artistry of Stone: Redefining Interior and Exterior">
                <span class="sr-only">
                    The Artistry of Stone: Redefining Interior and Exterior
                </span>
            </div>
        </div>
    </section>

    <!-- <section class="section-section section-pb">
        <div class="bs-container">
            <div class="text-center">
                <h6 class="h-tag mb-3"> Process </h6>
            </div>
            <h1 class="section-heading text-center mb-12">Our <span class="text-gradient-dark">Services</span></h1>
            <div class="grid md:grid-cols-12 grid-cols-1 md:gap-0 gap-12 items-center">
                <div class="md:col-span-6">
                    <img class="w-full" src="{{ url('/') }}assets/img/home/services/1.jpg">
                </div>
                <div class="md:col-span-6 md:pl-11">
                    <h1 class="section-heading md:text-2xl text-xl mb-3">Consul<span class="text-gradient-dark">ting</span></h1>
                    <p class="mb-4 leading-7">We have successfully worked with a number of companies on concept development, operations improvements, and new products. <br><br>

                        By applying restaurant knowledge and background, we are able to develop innovative solutions for our clients and guide them on their journey every step of the way, combining experience to map out solutions that target each client's individual needs. With focus at:
                    </p>
                    <ul class="list-disc list-inside md:mb-0 mb-6">
                        <li>Real Estate Alanysis</li>
                        <li>Operational Plan & Development</li>
                        <li>Marketing</li>
                    </ul>
                </div>
            </div>
            <div class="grid md:grid-cols-12 grid-cols-1 md:mb-0 mb-10">
                <div class="md:col-span-3">
                    <img class="h-full object-cover" src="{{ url('/') }}assets/img/home/services/2.jpg">
                </div>
                <div class="md:col-span-3">
                    <div class="bg-gold h-full md:p-7 py-7 px-5">
                        <h1 class="section-heading text-white md:text-2xl text-xl mb-3">Real Estate Alanysis</h1>
                        <p class="text-white leading-7">Our mission to find the perfect location to meet all your needs and match your restaurant concept to ensure that your facility is situated in the right place...</p>
                    </div>
                </div>
                <div class="md:col-span-3">
                    <img class="h-full object-cover" src="{{ url('/') }}assets/img/home/services/3.jpg">
                </div>
                <div class="md:col-span-3">
                    <div class="bg-gold h-full md:p-7 py-7 px-5">
                        <h1 class="section-heading text-white md:text-2xl text-xl mb-3">Operational Plan & Development</h1>
                        <p class="text-white leading-7">We understand how challenging this period is, and for this reason, ready offer arrangement services, including staff training, and establishing procedures...</p>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-12 grid-cols-1 items-center">
                <div class="md:col-span-6 md:pr-11">
                    <h1 class="section-heading md:text-2xl text-xl mb-3">Marke<span class="text-gradient-dark">ting</span></h1>
                    <p class="mb-4 leading-7">We offer a full range of social media marketing services — content development, daily activity, monitoring of engagement, advertising and ensure that social media campaigns increase your brand awareness by targeting the right audience and converting them into loyal customers.</p>
                </div>
                <div class="md:col-span-6">
                    <img class="w-full" src="{{ url('/') }}assets/img/home/services/4.jpg">
                </div>
            </div>
        </div>
    </section> -->


    <section class="section-fixed">
        <div class="fixed-bg section-py" style="background-image: linear-gradient(to bottom,  #0000, #000000e0) , url('assets/img/home/fixed.jpg'); background-size: cover; background-position: center;">
        </div>
    </section>


    <section class="section-testimonial section-py">
        <div class="bs-container">
            <div class="text-center">
                <h6 class="h-tag md:mb-3 mb-5 wow animate__fadeInLeft"> Our Testimonial </h6>
            </div>
            <h1 class="section-heading text-center mb-10 wow animate__fadeInRight">Clients Feedback</h1>
            <div class="testimonial-slider wow animate__fadeInUp">
                <div class="testimonial-item">
                    <div class="testimonial-info">
                        <p><i class="far fa-quote-left"></i>
                            Archistone transformed our space into a masterpiece. Their passion for design and craftsmanship is evident in every detail. From the exquisite stone selection to the skilled artistry, our project exceeded our expectations. Archistone is our go-to for turning ordinary spaces into extraordinary works of art.
                        </p>
                        <div class="testimonial-info-bottom">
                            <div class="testimonial-img">
                                <img src="{{ url('/assets/img/testimonial/1.jpg') }}">
                            </div>
                            <div class="testimonial-name-designation">
                                <h5>Jacob William</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-info">
                        <p><i class="far fa-quote-left"></i> Choosing Archistone was a game-changer for our project. Their expertise in stone and marble, coupled with their commitment to customer satisfaction, set them apart. The results speak for themselves – elegant, breathtaking spaces that leave a lasting impression. Archistone is the pinnacle of timeless beauty and craftsmanship.</p>
                        <div class="testimonial-info-bottom">
                            <div class="testimonial-img">
                                <img src="{{ url('/assets/img/testimonial/2.jpg') }}">
                            </div>
                            <div class="testimonial-name-designation">
                                <h5>Kelian Anderson</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-info">
                        <p><i class="far fa-quote-left"></i> We trusted Archistone with our dream project, and they delivered beyond our imagination. Their meticulous attention to detail and superior craftsmanship turned our vision into reality. Archistone's passion for design and commitment to excellence is unmatched. We are forever grateful for their expertise.</p>
                        <div class="testimonial-info-bottom">
                            <div class="testimonial-img">
                                <img src="{{ url('/assets/img/testimonial/3.jpg') }}">
                            </div>
                            <div class="testimonial-name-designation">
                                <h5>Adam Joseph</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-info">
                        <p><i class="far fa-quote-left"></i> Working with Archistone was an incredible experience. Their passion for architectural design and craftsmanship truly shines in their work. The attention to detail and quality of materials used in our project were outstanding. Archistone exceeded our expectations, and we couldn't be happier with the end result.</p>
                        <div class="testimonial-info-bottom">
                            <div class="testimonial-img">
                                <img src="{{ url('/assets/img/testimonial/4.jpg') }}">
                            </div>
                            <div class="testimonial-name-designation">
                                <h5>James Carter</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-clients-section section-gray section-py">
        <div class="bs-container">
            <div class="text-center">
                <h6 class="h-tag md:mb-2 mb-5 wow animate__fadeInLeft"> Our Loyal </h6>
            </div>
            <h1 class="section-heading text-center mb-6 wow animate__fadeInRight">Trusted <span class="text-gradient-dark"> Clients</span></h1>
            <div class="grid md:grid-cols-12 grid-cols-1">
                <div class="md:col-span-12 wow animate__fadeInUp">
                    <div class="first-clients-slider marquee">
                        <div>
                            <div class="inner">
                                <img src="{{ url('assets/img/clients/1.jpg') }}" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="{{ url('assets/img/clients/2.jpg') }}" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="{{ url('assets/img/clients/3.jpg') }}" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="{{ url('assets/img/clients/4.jpg') }}" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="{{ url('assets/img/clients/5.jpg') }}" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="{{ url('assets/img/clients/6.jpg') }}" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="{{ url('assets/img/clients/7.jpg') }}" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="{{ url('assets/img/clients/8.jpg') }}" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="{{ url('assets/img/clients/9.jpg') }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="section-contact section-py">
        <div class="bs-container">
            {{-- <div class="text-center">
                <h6 class="h-tag md:mb-3 mb-5 wow animate__fadeInLeft"> Join Us </h6>
            </div> --}}
            <div class="grid md:grid-cols-12 gap-14 md:px-12 px-0">
                <div class="md:col-span-6">
                    <h1 class="section-heading text-black text-start md:mb-12 mb-8 wow animate__fadeInRight">Get In <span class="text-gradient-dark"> Touch</span></h1>
                    <div class="contact_us_form flex flex-col items-center">
                        <form class="form w-full grid grid-cols-2 gap-6 items-center wow" action="{{ url('/contact-us') }}" method="POST">
                            <div class="block contact-msg-cont">
                                <?php if (isset($error)) : ?>

                                    <?php if ($error == false && !empty($msg)) : ?>
                                        <div class="contact-msg bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-gold-900 mb-3" role="alert">
                                            <p> <?= $msg ?> </p>
                                            <i class="close-btn far fa-times"></i>
                                        </div>
                                    <?php elseif ($error != false) : ?>
                                        <div class="contact-msg bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                                            <p> <?= $error ?></p>
                                            <i class="close-btn far fa-times"></i>
                                        </div>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </div>
                            <div class="form-control md:col-span-1 col-span-2 wow animate__fadeInUp">
                                <input type="text" name="first_name" placeholder="First Name *" required id="firstName" class="form-input">
                                <label for="firstName" class="form-label">First Name *</label>
                            </div>
                            <div class="form-control md:col-span-1 col-span-2 wow animate__fadeInUp">
                                <input type="text" name="last_name" placeholder="Last Name *" required id="lastName" class="form-input">
                                <label for="lastName" class="form-label">Last Name *</label>
                            </div>
                            <div class="form-control col-span-2 wow animate__fadeInUp">
                                <input type="text" name="email" placeholder="Email *" id="email" class="form-input">
                                <label for="email" class="form-label">Email *</label>
                            </div>
                            <div class="form-control col-span-2 wow animate__fadeInUp">
                                <input type="text" name="phone" placeholder="Phone *" id="phone" class="form-input">
                                <label for="phone" class="form-label">Phone *</label>
                            </div>
                            <div class="form-control col-span-2 w-full wow animate__fadeInUp">
                                <textarea class="form-input" name="message" id="message" rows="3" placeholder="Message *"></textarea>
                                <label for="message" class="form-label form-label-msg">Message *</label>
                            </div>

                            <input type="hidden" name="important_field" value="">
                            <input type="hidden" name="action" value="contact-us">
                            <div class="col-span-2 wow animate__fadeInUp">
                                <button type="submit" class="website_btn_black btn_effect" title="Submit"><span>Submit</span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="md:col-span-6 wow animate__bounceInRight">
                    
                    <h1 class="section-heading text-black text-start md:mb-12 mb-8 wow animate__fadeInRight"> Loca<span class="text-gradient-dark">tions</span></h1>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28898.303011316464!2d55.1819897743164!3d25.125956499999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6bdad4474add%3A0x7f2068a75244e865!2sARCHISTONE%20(L.LC)!5e0!3m2!1sen!2sus!4v1689319527133!5m2!1sen!2sus" width="100%" height="<?= $isMob ? '250' : '295' ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="flex flex-col gap-3 mt-5">
                        <div class="flex items-center gap-4">
                            <i class="fas fa-map-marker-alt text-2xl text-gold"></i>
                            
                            <p class="text-[14px] text-black font-semibold">
                                62 22nd St - Al Quoz - Al Quoz Industrial Area 3 - Dubai, United Arab Emirate
                            </p>
                        </div>
                        <div class="flex gap-8">
                            <div class="flex items-center gap-4">
                                <i class="fas fa-phone-alt text-2xl text-gold"></i>
                                
                                <p class="text-center text-[14px] text-black font-semibold">
                                    (+971) 52 301 4846
                                </p>
                            </div>
                            <div class="flex items-center gap-4">
                                <i class="fas fa-envelope text-2xl text-gold"></i>
                                
                                <p class="text-center text-[14px] text-black font-semibold">
                                    info@archistone.ae
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection