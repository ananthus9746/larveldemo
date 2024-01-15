@extends('frontend.layouts.app')


@section('content')
<?php
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
// BREADCRUMB
$breadcrumb = true;
$image_url = 'assets/img/breadcrumb/why-us.jpg';
$title = 'Why Us';
$home_text = "Home";
$current_page = "Why Us";
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

<div class="why-us-page">

    <section class="section-gray section-py">
        <div class="bs-container">
            <div class="grid md:grid-cols-12 grid-cols-1 md:gap-24 gap-16">
                <div class="md:col-span-5 wow animate__bounceInLeft">
                    <div class="about-us-img-cont">
                        <div class="about-us-img-pattern"></div>
                        <div class="about-us-img-btm"></div>
                        <div class="about-us-img h-full min-h-[250px] bg-cover bg-center" style="background-image:url('assets/img/why-us/1.webp');">

                        </div>
                    </div>
                </div>
                <div class="md:col-span-7 flex items-center md:py-6 wow animate__bounceInRight">
                    <div>
                        <h6 class="h-tag md:mb-2 mb-4"> Your Needs </h6>
                        <h1 class="section-heading mb-4">
                            Why
                            <span class="text-gradient-dark"> Choose Us </span>
                        </h1>
                        <p>
                            Archistone is your go-to partner for architectural design and craftsmanship. With years of experience and a trusted reputation, we have a deep understanding of stone and marble. Our meticulous selection process ensures the highest quality standards are met, and our skilled artisans excel in transforming raw materials into works of art. <br><br>

                            Whether it's a residential or commercial project, we have the expertise and resources to deliver exceptional results. From elegant marble countertops to intricate stone flooring, our craftsmanship speaks for itself. Our commitment to customer satisfaction, timely project delivery, and competitive pricing sets us apart. <br><br>

                            Choose Archistone as your trusted partner in stone and marble. Experience the timeless beauty and durability our products bring to any space. Let us turn your vision into a stunning reality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-accordion section-py">
        <div class="bs-container">
            <div class="text-center">
                <h6 class="h-tag mb-3 wow animate__fadeInLeft"> Frequently </h6>
            </div>
            <h1 class="section-heading mb-12 text-center wow animate__fadeInRight"> Asked <span class="text-gradient-dark"> Questions</span></h1>

            <div class="accordion-grid md:grid-cols-2 grid-cols-1">
                <div class="accordion-col wow animate__fadeInUp">
                    <div class="accordion-item wow animate__bounceInLeft">
                        <button class="accordion-design-btn">
                            <span class="accordion-question">
                                What types of projects do you specialize in?
                            </span>
                            <i class="fas fa-chevron-down accordion-icon"></i>
                        </button>
                        <div class="accordion-content">
                            <p class="accordion-text">
                                At Archistone, we specialize in a wide range of projects, including residential homes, commercial developments, and architectural endeavors. Our expertise covers everything from elegant marble countertops and intricate stone flooring to stunning sculptures and detailed mosaics.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item wow animate__bounceInLeft">
                        <button class="accordion-design-btn">
                            <span class="accordion-question">How long have you been in the stone and marble industry?</span>
                            <i class="fas fa-chevron-down accordion-icon"></i>
                        </button>
                        <div class="accordion-content">
                            <p class="accordion-text">
                                We are proud to have been serving our customers since 2004. With over a decade of experience, we have developed a rich legacy in the industry and established ourselves as a trusted name.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item wow animate__bounceInLeft">
                        <button class="accordion-design-btn">
                            <span class="accordion-question">Where do you source your materials from?</span>
                            <i class="fas fa-chevron-down accordion-icon"></i>
                        </button>
                        <div class="accordion-content">
                            <p class="accordion-text">
                                We source our materials from reputable suppliers who share our commitment to quality. We ensure that the stone and marble we select meet the highest standards, allowing us to deliver exquisite works of art to our clients.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item wow animate__bounceInLeft">
                        <button class="accordion-design-btn">
                            <span class="accordion-question">Can you customize your products to suit our unique preferences?</span>
                            <i class="fas fa-chevron-down accordion-icon"></i>
                        </button>
                        <div class="accordion-content">
                            <p class="accordion-text">
                                Absolutely! At Archistone, we understand that every client has unique preferences and requirements. Our experienced team of craftsmen excels in transforming raw materials into tailor-made works of art, ensuring that your vision is brought to life.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item wow animate__bounceInLeft">
                        <button class="accordion-design-btn">
                            <span class="accordion-question">Do you offer competitive pricing?</span>
                            <i class="fas fa-chevron-down accordion-icon"></i>
                        </button>
                        <div class="accordion-content">
                            <p class="accordion-text">
                                Yes, we are committed to offering competitive pricing without compromising on quality. We believe that everyone should have access to exceptional stone and marble craftsmanship, and we strive to deliver value to our clients.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-col">
                    <div class="accordion-item wow animate__bounceInRight">
                        <button class="accordion-design-btn">
                            <span class="accordion-question">How long does a project typically take to complete?</span>
                            <i class="fas fa-chevron-down accordion-icon"></i>
                        </button>
                        <div class="accordion-content">
                            <p class="accordion-text">
                                The timeline for each project can vary depending on its complexity and scale. However, we are dedicated to timely project delivery and work closely with our clients to establish realistic timelines and meet their expectations.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item wow animate__bounceInRight">
                        <button class="accordion-design-btn">
                            <span class="accordion-question">Can you handle both residential and commercial projects?</span>
                            <i class="fas fa-chevron-down accordion-icon"></i>
                        </button>
                        <div class="accordion-content">
                            <p class="accordion-text">
                                Absolutely! We have the knowledge and resources to handle projects of all sizes and scopes, whether it's a residential project, commercial development, or any other architectural endeavor.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item wow animate__bounceInRight">
                        <button class="accordion-design-btn">
                            <span class="accordion-question">Do you provide warranties for your products?</span>
                            <i class="fas fa-chevron-down accordion-icon"></i>
                        </button>
                        <div class="accordion-content">
                            <p class="accordion-text">
                                Yes, we stand behind the quality of our products. We offer warranties to provide our clients with peace of mind and ensure their satisfaction with the durability and longevity of our stone and marble installations.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item wow animate__bounceInRight">
                        <button class="accordion-design-btn">
                            <span class="accordion-question">How can I get started with a project?</span>
                            <i class="fas fa-chevron-down accordion-icon"></i>
                        </button>
                        <div class="accordion-content">
                            <p class="accordion-text">
                                Getting started is easy. Simply reach out to our team, and we will be delighted to discuss your project, understand your requirements, and provide you with a tailored solution that meets your needs.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item wow animate__bounceInRight">
                        <button class="accordion-design-btn">
                            <span class="accordion-question">Can I see examples of your past work?</span>
                            <i class="fas fa-chevron-down accordion-icon"></i>
                        </button>
                        <div class="accordion-content">
                            <p class="accordion-text">
                                Certainly! We have a <a href="{{ url('/') }}"> portfolio </a> showcasing our past projects that demonstrate the range and quality of our work. We invite you to explore our portfolio and see firsthand the exceptional craftsmanship and timeless beauty we bring to every space.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-fixed">
        <div class="fixed-bg section-py" style="background-image: linear-gradient(to bottom,  #0000, #000000e0) , url('assets/img/why-us/fixed.webp'); background-size: cover; background-position: center;">
        </div>
    </section>

    <section class="section-py section-gray">
        <div class="bs-container">
            <div class="text-center">
                <h6 class="h-tag mb-3 wow animate__fadeInLeft"> Features </h6>
            </div>
            <h1 class="section-heading text-center md:mb-12 mb-8 wow animate__fadeInRight">Why <span class="text-gradient-dark"> Choose Us</span></h1>
            <div class="grid md:grid-cols-12 grid-cols-1 md:gap-8 gap-6 ">
                <div class="md:col-span-4 wow animate__rotateInDownLeft">
                    <div class="choose-us-item">
                        <img src="{{ url('assets/img/icons/why-us/1.png') }}" alt="Bulb Icon">
                        <h1 class="text-gold font-extrabold mb-4">Exquisite Selection</h1>
                        <p>Our meticulous process involves handpicking the most exquisite stone and marble from reputable suppliers, ensuring that only the highest quality materials are used in projects.</p>
                    </div>
                </div>
                <div class="md:col-span-4 wow animate__fadeInUp">
                    <div class="choose-us-item">
                        <img src="{{ url('assets/img/icons/why-us/2.png') }}" alt="Craftman Icon">
                        <h1 class="text-gold font-extrabold mb-4">Masterful Craftsmanship</h1>
                        <p>Our experienced team of artisans brings visions to life through their exceptional craftsmanship, transforming raw materials into extraordinary works of art that exceed expectations.</p>
                    </div>
                </div>
                <div class="md:col-span-4 wow animate__rotateInDownRight">
                    <div class="choose-us-item">
                        <img src="{{ url('assets/img/icons/why-us/3.png') }}" alt="Relationships Icon">
                        <h1 class="text-gold font-extrabold mb-4">Lasting Relationships</h1>
                        <p>Building trust and fostering long-term relationships with our clients is at the core of our values. We prioritize customer satisfaction, ensuring that each project is executed well.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection