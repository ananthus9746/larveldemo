@extends('frontend.layouts.app')


@section('content')

<?php
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

// BREADCRUMB
$breadcrumb = true;
$image_url = 'assets/img/breadcrumb/about-us.webp';
$title = 'About Us';
$home_text = "Home";
$current_page = "About Us";
$position = $isMob ? 'center right' : 'center';
$newsletterBgGray = true;

// END
?>

<?php if ($breadcrumb) : ?>
    <div class="breadcrumb breadcrumb-wrapper" style="background-image: url({{ url($image_url) }}); background-position: <?= $position ?>">
        <div class="black-bg">
            <h3 class="title"><?= $title ?></h3>
            <p class="breadcrumb_text"><a href="{{ url('/') }}"><?= $home_text ?></a> &nbsp; / &nbsp; <a href="#"> <?= $current_page ?></a> </p>
        </div>
    </div>
<?php endif ?>

<div class="about-us-page-design-1">

    <section class="section-py">
        <div class="bs-container">
            <div class="grid md:grid-cols-12 grid-cols-1 md:gap-24 gap-16">
                <div class="md:col-span-5 wow animate__bounceInLeft">
                    <div class="about-us-img-cont">
                        <div class="about-us-img-pattern"></div>
                        <div class="about-us-img-btm"></div>
                        <div class="about-us-img h-full min-h-[250px] bg-cover bg-center" style="background-image:url('assets/img/about-us/1.webp');">
                            <div class="about-us-img-2">
                                <img src="{{ url('assets/img/about-us/1-2.webp') }}" class="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-7 flex items-center md:py-12 wow animate__bounceInRight">
                    <div>
                        <h6 class="h-tag md:mb-2 mb-4"> About Us </h6>
                        <h1 class="section-heading mb-4">
                            Know About
                            <span class="text-gradient-dark"> Archistone </span>
                        </h1>
                        <p class="mb-8">
                            At Archistone, We are fueled by an unwavering passion for architectural design and craftsmanship. Our dedication to creating spaces that inspire and awe is the cornerstone of our work. With an acute attention to detail and an eye for elegance, we meticulously curate the finest selection of stone and marble. Harnessing the expertise of our skilled artisans, we breathe life into visions, transforming mundane spaces into remarkable works of art. Our commitment to excellence permeates every aspect of our projects, ensuring the fulfillment of our clients' dreams and the creation of enduring beauty. Step into a world where imagination meets precision, and let us redefine what's possible in architectural design.
                        </p>
                        <a class="btn btn-base btn-style" href="{{ url('/') }}products.php" title="View Products"><span>View Products</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-message section-py section-gray">
        <div class="bs-container">
            <div class="text-center">
                <h6 class="h-tag mb-3 wow animate__fadeInLeft"> Our Goals </h6>
            </div>
            <h1 class="section-heading text-center mb-12 wow animate__fadeInRight">Our Main <span class="text-gradient-dark"> Focus</span></h1>
            <div class="grid md:grid-cols-12 gap-8">
                <div class="md:col-span-4 wow animate__rotateInDownLeft">
                    <div class="banner-item">
                        <div class="banner-content" data-count="01">
                            <h3 class="title mb-4">Our Mission</h3>
                            <p class="short-desc"> To exceed expectations by combining our passion for architectural design and craftsmanship with the finest selection of stone and marble, delivering exceptional works of art and create enduring beauty in every space. </p>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-4 wow animate__fadeInUp">
                    <div class="banner-item orange_bg">
                        <div class="banner-content" data-count="02">
                            <h3 class="title mb-4">Our Vision</h3>
                            <p class="short-desc"> Transforming spaces into timeless masterpieces, Archistone combines passion, expertise, and exceptional craftsmanship to create awe-inspiring environments that surpass expectations. </p>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-4 wow animate__rotateInDownRight">
                    <div class="banner-item">
                        <div class="banner-content" data-count="03">
                            <h3 class="title mb-4">Our Expertise</h3>
                            <p class="short-desc"> Masters of architectural design and craftsmanship, we transform stone and marble into extraordinary works of art, redefining spaces with our meticulous selection and skilled craftsmanship.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="section-py">
        <div class="bs-container">
            <div class="grid md:grid-cols-12 grid-cols-1 md:gap-24 gap-16">
                <div class="md:col-span-7 flex items-center wow animate__fadeInRight">
                    <div>
                        <h6 class="h-tag md:mb-2 mb-4"> Story </h6>
                        <h1 class="section-heading mb-4">
                            Know Our
                            <span class="text-gradient-dark"> Story </span>
                        </h1>
                        <p>
                            <span class="font-bold">
                                With a rich legacy in the stone and marble industry, we have been proudly serving our customers since 2004. Over the years, our expertise and dedication have allowed us to establish ourselves as a trusted name in the market.
                            </span> <br><br>

                            At our company, we have a deep understanding of the nuances and intricacies of stone and marble. We source our materials from reputable suppliers, ensuring the highest quality standards are met. Our experienced team of craftsmen excels in transforming these raw materials into exquisite works of art, tailored to suit the unique preferences and requirements of our clients. <br><br>

                            Whether it’s a residential project, commercial development, or architectural endeavor, we have the knowledge and resources to deliver exceptional results. From elegant marble countertops and intricate stone flooring to stunning sculptures and detailed mosaics, our craftsmanship speaks for itself. <br><br>

                            Throughout the years, we have built lasting relationships with our clients, who continue to trust us for their stone and marble needs. We take pride in our commitment to customer satisfaction, timely project delivery, and competitive pricing. <br><br>

                            Choose us as your partner in stone and marble, and experience the timeless beauty and durability that our products bring to any space.
                        </p>
                    </div>
                </div>
                <div class="md:col-span-5 wow animate__fadeInLeft">
                    <div class="about-us-img-cont">
                        <div class="about-us-img-pattern"></div>
                        <div class="about-us-img-btm"></div>
                        <div class="about-us-img h-full min-h-[250px] bg-cover bg-center" style="background-image:url('assets/img/about-us/3.webp');">
                            <!-- <div class="about-us-img-2">
                                <img src="{{ url('/') }}assets/img/about-us/3-2.webp" class="" alt="">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-fixed section-counter-up">
        <div class="fixed-bg !min-h-0 md:py-16" style="background-image: linear-gradient(to bottom,  #0000, #000000e0) , url('assets/img/about-us/counter-bg.webp'); background-size: cover; background-position: bottom;">
            <div class="bs-container">
                <div class="fixed-content">
                    <div class="grid md:grid-cols-12 grid-cols-1 md:gap-0 gap-20 mt-11">
                        <div class="md:col-span-3">
                            <div class="counter-item">
                                <h3 class="counter mb-0" data-counterup-time="1500">985</h3>
                                <h2 class="counter-inner-text mb-0">985</h2>
                                <h4 class="counter-title mb-0">Projects</h4>
                            </div>
                        </div>
                        <div class="md:col-span-3">
                            <div class="counter-item">
                                <h3 class="counter mb-0" data-counterup-time="2000">527</h3>
                                <h2 class="counter-inner-text mb-0">527</h2>
                                <h4 class="counter-title mb-0">Clients</h4>
                            </div>
                        </div>
                        <div class="md:col-span-3">
                            <div class="counter-item">
                                <h3 class="counter mb-0" data-counterup-time="2500">856</h3>
                                <h2 class="counter-inner-text mb-0">856</h2>
                                <h4 class="counter-title mb-0">Success</h4>
                            </div>
                        </div>
                        <div class="md:col-span-3">
                            <div class="counter-item">
                                <h3 class="counter mb-0" data-counterup-time="3000">120</h3>
                                <h2 class="counter-inner-text mb-0">120</h2>
                                <h4 class="counter-title mb-0">Awards</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="section-py our-team-area" id="section-team">
        <div class="bs-container">
            <div class="secton_title_area md:mb-20">
                <div class="section_title">
                    <h6 class="h-tag mb-4"> Team </h6>
                    <h2 class="section-heading">Our Talented <br class="md:block hidden">
                        <span class="text-gradient-dark"> Team members </span>
                    </h2>
                </div>
                <div class="section_desc">
                    <p class="leading-7 md:mb-0 mb-5">
                        Bound by a common dream, Our Team embarks on a relentless pursuit of excellence, Fueled by a shared passion and a commitment to empowering one another.
                    </p>
                </div>
            </div>

            <div class="team-hover mb-20">
                <div class="flip-card">
                    <div class="imgBox">
                        <img src="{{ url('/') }}assets/img/our-team/2.jpg">
                        <img src="{{ url('/') }}assets/img/our-team/2.jpg">
                    </div>
                    <div class="details">
                        <div class="content">
                            <h2>Regina Nurtdinova</h2>
                            <h4>
                                Co-Founder, Head of Commercial Real Estate, Chief People Officer
                            </h4>
                            <div class="social-icons">
                                <a href="tel:+971509073421"><i class="fas fa-phone-alt"></i></a>
                                <a href="mailto:info@archistone.ae"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flip-card">
                    <div class="imgBox">
                        <img src="{{ url('/') }}assets/img/our-team/1.jpg">
                        <img src="{{ url('/') }}assets/img/our-team/1.jpg">
                    </div>
                    <div class="details">
                        <div class="content">
                            <h2>Salvatore Camuti</h2>
                            <h4>
                                Co-founder, Head of Technical Operations, Chef with more than 25 Years Experience, Project Manager
                            </h4>
                            <div class="social-icons">
                                <a href="tel:+971585154130"><i class="fas fa-phone-alt"></i></a>
                                <a href="mailto:info@archistone.ae"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-hover mb-20">
                <div class="flip-card">
                    <div class="imgBox">
                        <img src="{{ url('/') }}assets/img/our-team/4.jpg">
                        <img src="{{ url('/') }}assets/img/our-team/4.jpg">
                    </div>
                    <div class="details">
                        <div class="content">
                            <h2>Muhammad Asif Pervaiz</h2>
                            <h4>
                                Marketing Manager
                            </h4>
                            <div class="social-icons">
                                <a href="tel:+971554118178"><i class="fas fa-phone-alt"></i></a>
                                <a href="mailto:info@archistone.ae"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flip-card">
                    <div class="imgBox">
                        <img src="{{ url('/') }}assets/img/our-team/3.jpg" class="md:object-center object-top">
                        <img src="{{ url('/') }}assets/img/our-team/3.jpg">
                    </div>
                    <div class="details">
                        <div class="content">
                            <h2>Antony Samuel </h2>
                            <h4>
                                Accountant & Auditor
                            </h4>
                            <div class="social-icons">
                                <a href="mailto:info@archistone.ae"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-hover">
                <div class="flip-card">
                    <div class="imgBox">
                        <img src="{{ url('/') }}assets/img/our-team/5.jpg">
                        <img src="{{ url('/') }}assets/img/our-team/5.jpg">
                    </div>
                    <div class="details">
                        <div class="content">
                            <h2>Shirish Kumar</h2>
                            <h4>
                                Architect & Projects Engineer
                            </h4>
                            <div class="social-icons">
                                <a href="mailto:info@archistone.ae"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="section-py">
        <div class="bs-container">
            <div class="grid md:grid-cols-12 grid-cols-1 md:gap-24 gap-16">
                <div class="md:col-span-5 wow animate__bounceInLeft">
                    <div class="about-us-img-cont">
                        <div class="about-us-img-pattern"></div>
                        <div class="about-us-img-btm"></div>
                        <div class="about-us-img h-full min-h-[250px] bg-cover bg-center" style="background-image:url('assets/img/about-us/2.jpg');">
                            <!-- <div class="about-us-img-2">
                                <img src="{{ url('/') }}assets/img/about-us/3-2.webp" class="" alt="">
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="md:col-span-7 flex items-center wow animate__bounceInRight">
                    <div>
                        <h6 class="h-tag md:mb-2 mb-4"> Process </h6>
                        <h1 class="section-heading mb-4">
                            How
                            <span class="text-gradient-dark"> It's Work </span>
                        </h1>
                        <p>
                            At Archistone, Our passion for architectural design and craftsmanship fuels our journey to create extraordinary spaces. With a deep understanding of stone and marble, we meticulously select the finest materials sourced from reputable suppliers.<br><br>

                            Our skilled craftsmen transform these raw materials into exquisite works of art, tailored to your unique preferences <br><br>

                            From elegant countertops to intricate mosaics, our commitment to excellence is evident in every detail. With a focus on customer satisfaction, timely project delivery, and competitive pricing, choose Archistone as your trusted partner in creating timeless spaces that inspire awe.
                        </p>
                    </div>
                </div>
            </div>
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
                                <img src="{{ url('assets/img/testimonial/1.jpg') }}">
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
                                <img src="{{ url('assets/img/testimonial/2.jpg') }}">
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
                                <img src="{{ url('assets/img/testimonial/3.jpg') }}">
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
                                <img src="{{ url('assets/img/testimonial/4.jpg') }}">
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


    <section class="our-clients-section section-py section-gray">
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
                                <img src="assets/img/clients/1.jpg" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="assets/img/clients/2.jpg" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="assets/img/clients/3.jpg" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="assets/img/clients/4.jpg" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="assets/img/clients/5.jpg" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="assets/img/clients/6.jpg" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="assets/img/clients/7.jpg" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="assets/img/clients/8.jpg" class="img-fluid">
                            </div>
                        </div>
                        <div>
                            <div class="inner">
                                <img src="assets/img/clients/9.jpg" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>


@endsection