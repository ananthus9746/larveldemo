/**========================================================================
 *                           FUNCTIONS
 *========================================================================**/

function base_url() {
    const getUrl = window.location;
    if (getUrl.host == "localhost") {
        var baseUrl =
            getUrl.protocol +
            "//" +
            getUrl.host +
            "/" +
            getUrl.pathname.split("/")[1] +
            "/";
    } else {
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
    }

    return baseUrl;
}

$(document).ready(function () {
    ("use strict");

    /**========================================================================
     *                              WOW ANIMATION
     *========================================================================**/

    const wow = new WOW({
        boxClass: "wow", // animated element css class (default is wow)
        animateClass: "animate__animated", // animation css class (default is animated)
        offset: 0, // distance to the element when triggering the animation (default is 0)
        mobile: true, // trigger animations on mobile devices (default is true)
        live: true, // act on asynchronously loaded content (default is true)
        scrollContainer: null, // optional scroll container selector, otherwise use window,
        resetAnimation: true, // reset animation on end (default is true)
    });

    wow.init();
    
    /**========================================================================
    // Setup Ajax 
     *========================================================================**/

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json'
    });


    /**========================================================================
     *                              Select 2
     *========================================================================**/

    $('[data-select="true"]').each(function () {
        $(this).select2({
            theme: "bootstrap",
            dropdownParent: $(this).parent(),
        });
    });

    /**========================================================================
     *                              PRELOADER
     *========================================================================**/

    $("#preloader") && $("#preloader")?.addClass("hide");
    setTimeout(() => {
        $("#preloader").remove();
    }, 300);

    /**========================================================================
     *                           Scroll back to top
     *========================================================================**/

    const progressPath = document.querySelector(".progress-wrap path");
    const pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition =
        "none";
    progressPath.style.strokeDasharray = pathLength + " " + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition =
        "stroke-dashoffset 10ms linear";
    const updateProgress = function () {
        const scroll = $(window).scrollTop();
        const height = $(document).height() - $(window).height();
        const progress = pathLength - (scroll * pathLength) / height;
        progressPath.style.strokeDashoffset = progress;
    };
    updateProgress();
    $(window).scroll(updateProgress);
    const offset = 300;
    const duration = 550;
    jQuery(window).on("scroll", function () {
        if (jQuery(this).scrollTop() > offset) {
            jQuery(".progress-wrap").addClass("active-progress");
        } else {
            jQuery(".progress-wrap").removeClass("active-progress");
        }
    });
    jQuery(".progress-wrap").on("click", function (event) {
        event.preventDefault();
        jQuery("html, body").animate({ scrollTop: 0 }, duration);
        return false;
    });

    /**========================================================================
     *                           SMOOTH SCROLL
     *========================================================================**/

    SmoothScroll({ animationTime: 1000 });

    /**========================================================================
     *                              HOME SLIDER
     *========================================================================**/

    var tpj = jQuery;

    var revapi1050;
    tpj(document).ready(function () {
        if (tpj("#rev_slider_1050_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_1050_1");
        } else {
            revapi1050 = tpj("#rev_slider_1050_1")
                .show()
                .revolution({
                    sliderType: "standard",
                    jsFileLocation: "revolution/js/",
                    // sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 4000,
                    draggable: true,
                    navigation: {
                        // arrows: {
                        //     enable: true,
                        //     style: 'uranus',
                        //     h_align: "left",
                        //     v_align: "bottom",
                        //     h_offset: 30,
                        //     v_offset: 0,
                        // },
                        keyboardNavigation: "on",
                        keyboard_direction: "vertical",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 50,
                            swipe_direction: "vertical",
                            drag_block_vertical: false,
                        },
                        bullets: {
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 1024,
                            style: "hephaistos",
                            hide_onleave: false,
                            direction: "vertical",
                            h_align: "right",
                            v_align: "center",
                            h_offset: 30,
                            v_offset: 0,
                            space: 5,
                            tmp: "",
                        },
                    },
                    responsiveLevels: [1240, 1024, 778, 500],
                    visibilityLevels: [1240, 1024, 778, 500],
                    gridwidth: [1400, 1240, 778, 480],
                    gridheight: [600, 600, 280, 280],
                    lazyType: "none",
                    shadow: 0,
                    spinner: "spinner2",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    },
                });
        }
    }); /*ready*/

    /**========================================================================
     *                              HEADER STICKY
     *========================================================================**/

    $(".home-about-slider").slick({
        infinite: true,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        responsive: [
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    /**========================================================================
     *                              HEADER STICKY
     *========================================================================**/

    // STICKY NAVIGATION

    function addStikcyNav() {
        if ($("body").scrollTop() > 250 || $("html").scrollTop() > 250) {
            $(".sticky_nav").addClass("show_sticky");
        } else {
            $(".sticky_nav").removeClass("show_sticky");
        }
    }

    $(window).scroll(addStikcyNav);

    /**========================================================================
     *                           MOBILE NAVIGATION
     *========================================================================**/

    let mobNavClicks = [];

    const navTogglerOnReload = function () {
        const targetName = $(".navbar-toggler").data("target");
        const target = $(targetName);

        if (target.hasClass("close")) {
            target.removeClass("close");
            target.removeClass("hidden");
            target.slideUp(0);
        }
    };

    const navToggler = function () {
        const targetName = $(".navbar-toggler").data("target");
        const target = $(targetName);

        if (target.hasClass("collapsed")) {
            target.slideDown();
            target.removeClass("collapsed");
        } else {
            target.slideUp();
            target.addClass("collapsed");
        }
    };

    $(".navbar-toggler").on("click", navToggler);

    $(document).on("click", ".mob-nav-link", function () {
        console.log("Container Clicked");
        if (!$(".mob-nav-item").find(".mob-nav-link").hasClass("show")) {
            if (mobNavClicks.length !== 0) {
                let lastOpened = mobNavClicks[mobNavClicks.length - 1];

                $(lastOpened).find(".mob-nav-link").removeClass("show");
                // $(lastOpened).find(".dropdown-menu").removeClass("show");
            }

            $(".mob-nav-item").find(".mob-nav-link").addClass("show");
            // $('.mob-nav-item').find(".dropdown-menu").addClass("show");

            mobNavClicks.push($(".mob-nav-item"));
        } else {
            $(".mob-nav-item").find(".mob-nav-link").removeClass("show");
            // $('.mob-nav-item').find(".dropdown-menu").removeClass("show");
            $(".dropdown-sub-item").removeClass("show");
            $(".dropdown-sub-item").find(".dropdown").addClass("hidden");
            mobNavClicks = [];
        }
    });

    /**========================================================================
     *                           MOBILE SUB MENU
     *========================================================================**/

    const subMenuBtn = document.querySelector(".sub-menu-open-btn");
    let lastOpened = undefined;

    $(document).on("click", ".sub-menu-open-btn", function () {
        const fullBtn = $(this).closest(".dropdown-sub-item");

        if (lastOpened != undefined && !$(lastOpened).is(fullBtn)) {
            lastOpened.removeClass("show");
            lastOpened.find(".dropdown").addClass("hidden");
        }

        fullBtn.toggleClass("show");
        fullBtn.find(".dropdown").toggleClass("hidden");
        lastOpened = fullBtn;
    });

    /**=====================================
     *   About Us Design 1 Our Team Slider
     *=====================================**/

    // $(".our-team-slider").slick({
    //   infinite: true,
    //   slidesToShow: 4,
    //   slidesToScroll: 1,
    //   arrows: false,
    //   dost: false,
    //   responsive: [
    //     {
    //       breakpoint: 500,
    //       settings: {
    //         slidesToShow: 1,
    //       },
    //     },
    //   ],
    // });

    /**===================================================================
     *                              Accordion 2
     *====================================================================**/

    $(document).on("click", ".accordion-design-btn", function () {
        const content = $(this).siblings(".accordion-content");

        if (!$(this).closest(".accordion-item").hasClass("show")) {
            $(".accordion-item.show")
                .find(".accordion-content")
                .slideUp("easeInOut");
            $(".accordion-item.show").removeClass("show");
        }

        content.slideToggle("easeIn");
        $(this).closest(".accordion-item").toggleClass("show");
    });

    /**========================================================================
     *                           HOME TESTIMONIALS
     *========================================================================**/

    $(".testimonials").slick({
        slidesToShow: 3,
        draggable: true,
        arrows: true,
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3500,
        speed: 1000,
        adaptiveHeight: true,
        prevArrow:
            '<button type="button" class="slick-prev"><i class="fal fa-angle-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="fal fa-angle-right"></i></button>',

        responsive: [
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                },
            },
        ],
    });

    $("#toggle").on("click", function () {
        var elem = $("#toggle").text();
        if (elem == "Read More") {
            //Stuff to do when btn is in the read more state
            $("#toggle").text("Read Less");
            $("#hiddenText").slideDown();
        } else {
            //Stuff to do when btn is in the read less state
            $("#toggle").text("Read More");
            $("#hiddenText").slideUp();
        }
    });

    /**========================================================================
     *                              PRODUCT GALLERY
     *========================================================================**/

    $('[data-fancybox="gallery"]').fancybox({
        toolbar: "auto",
        buttons: ["zoom", "slideShow", "fullScreen", "thumbs", "close"],
    });

    /**========================================================================
     *                           PRODUCT TABS SWITCH
     *========================================================================**/

    $(".product-tab").on("click", function () {
        const btn = $(this);
        const page = $(this).attr("href").substr(1);
        const loadingHtml = `
            <div class="product-loading">
                <img src="${base_url()}assets/img/gif/product-loading.gif" alt="Loading GIF">
            </div>
        `;

        $(".product-tab").removeClass("active");
        btn.addClass("active");

        $(".product-content").fadeOut("fast");
        $(".product-wrapper").prepend(loadingHtml);

        $.get(`${page}.php`, (gotHtml) => {
            $(".product-content").html(gotHtml);
            $(".product-loading").remove();
            $(".product-content").fadeIn("fast");
        });
        return false;
    });

    /**========================================================================
     *                              BUSES PAGE SLIDER
     *========================================================================**/

    $(".buses_page_slider").slick({
        slidesToShow: 1,
        draggable: true,
        arrows: true,
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3500,
        speed: 1000,
        adaptiveHeight: true,
        prevArrow:
            '<button type="button" class="slick-prev"><i class="fal fa-angle-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="fal fa-angle-right"></i></button>',

        responsive: [
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    /**========================================================================
     *                          HOME SERVICES SLIDER
     *========================================================================**/

    $(".services-slider").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        draggable: false,
        autoplaySpeed: 3000,
        prevArrow:
            '<button type="button" class="slick-prev"><i class="fas fa-angle-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="fas fa-angle-right"></i></button>',
        pauseOnFocus: false,
        pauseOnHover: false,
        pauseOnDotsHover: false,
        responsive: [
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    $(".services-slider-2").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        draggable: false,
        autoplaySpeed: 3000,
        prevArrow:
            '<button type="button" class="slick-prev"><i class="fas fa-angle-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="fas fa-angle-right"></i></button>',
        pauseOnFocus: false,
        pauseOnHover: false,
        pauseOnDotsHover: false,
        responsive: [
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    /**========================================================================
     *                          OUR CLIENTS
     *========================================================================**/

    $(".first-clients-slider").slick({
        speed: 5000,
        autoplay: true,
        autoplaySpeed: 0,
        centerMode: true,
        cssEase: "linear",
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        infinite: true,
        initialSlide: 1,
        pauseOnHover: false,
        pauseOnDotsHover: false,
        pauseOnFocus: false,
        arrows: false,
        buttons: false,

        responsive: [
            {
                breakpoint: 500,
                settings: {
                    pauseOnHover: false,
                    pauseOnDotsHover: false,
                    pauseOnFocus: false,
                },
            },
        ],
    });
    $(".second-clients-slider").slick({
        speed: 5000,
        autoplay: true,
        autoplaySpeed: 0,
        centerMode: true,
        cssEase: "linear",
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        infinite: true,
        initialSlide: 1,
        pauseOnHover: false,
        pauseOnDotsHover: false,
        pauseOnFocus: false,
        arrows: false,
        buttons: false,
        rtl: true,
    });

    /**========================================================================
     *                              COUNTER UP
     *========================================================================**/

    const counterUp = window.counterUp.default;

    const callback = (entries) => {
        entries.forEach((entry) => {
            const el = entry.target;
            const duration = $(el).data("counterup-time");
            if (entry.isIntersecting && !el.classList.contains("is-visible")) {
                counterUp(el, {
                    duration: duration,
                    delay: 16,
                });
                el.classList.add("is-visible");
            }
        });
    };

    const IO = new IntersectionObserver(callback, { threshold: 1 });

    document.querySelectorAll(".counter").forEach(function (el) {
        console.log(el);
        IO.observe(el);
    });

    /**========================================================================
     *                          ABOUT US TEAM SECTION
     *========================================================================**/

    // $(".our-team-slider").slick({
    //   infinite: true,
    //   slidesToShow: 4,
    //   slidesToScroll: 1,
    //   arrows: false,
    //   dost: false,
    //   responsive: [
    //     {
    //       breakpoint: 500,
    //       settings: {
    //         slidesToShow: 1,
    //       },
    //     },
    //   ],
    // });

    /**========================================================================
     *                          ABOUT US TESTIMONIAL SECTION
     *========================================================================**/

    $(".testimonial-slider").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        prevArrow:
            '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
        dost: false,
        responsive: [
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    /**========================================================================
     *                          Bottom Right Side Button
     *========================================================================**/

    if ($(window).width() > 500) {
        $("#asfar-widget-social").on("mouseenter", function (e) {
            e.preventDefault();
            let el = $(this).parent(".widget-call-wrap");
            el.hasClass("minimize") &&
                el.removeClass("minimize").addClass("active");
        });
    }

    $("#asfar-widget-social").on("click", function (e) {
        e.preventDefault();
        let el = $(this).parent(".widget-call-wrap");
        el.hasClass("active")
            ? el.removeClass("active").addClass("minimize")
            : el.removeClass("minimize").addClass("active");
    });
    /**========================================================================
     *                          Product Search
     *========================================================================**/

    let prev_category = $(".category_dropdown option:selected").data("slug");

    $(
        ".product-page .category_dropdown, .product-page .sub_category_dropdown, .product-page .color_dropdown"
    ).on("change", function () {
        const category_slug =
            $(".category_dropdown option:selected").data("slug") || "0";
        let sub_category_slug =
            $(".sub_category_dropdown option:selected").data("slug") || "0";
        const color_slug =
            $(".color_dropdown option:selected").data("slug") || "0";

        if (prev_category !== category_slug) {
            sub_category_slug = "0";
        }

        $link = `${base_url()}products/`;

        if (category_slug)

            location.href = `${base_url()}products/${category_slug}/${sub_category_slug}/${color_slug}`;

        // $.ajax({
        //     type: "GET",
        //     url: base_url() + "get_products",
        //     data: {
        //         category_id,
        //         sub_category_id,
        //         color_id,
        //     },
        //     dataType: "json",
        //     success: function (res) {
        //         const products = res.products;

        //         $(".section-products .grid").empty();

        //         if (products.length === 0) {
        //             $(".section-products .grid").append(`
        //                 <div class="col-span-4">
        //                     <p class="text-center text-lg">No Products Available</p>
        //                 </div>
        //             `);
        //         }

        //         $.each(products, function (_, product) {
        //             const images = JSON.parse(product.images);

        //             const html = `
        //                 <div>
        //                     <a href="${base_url()}products/${product.slug}">
        //                         <div class="product-img" style="background-image: url('${base_url()}uploads/${
        //                             images[0]
        //                         }')"></div>
        //                         <p class="mt-2">${product.name}</p>
        //                     </a>
        //                 </div>
        //             `;

        //             $(".section-products .grid").append(html);
        //         });
        //     },
        // });
    });

    $(".reset-btn").on("click", function () {
        $(".category_dropdown").val("0").trigger("change.select2");
        $(".sub_category_dropdown").val("0").trigger("change.select2");
        $(".color_dropdown").val("0").trigger("change");
    });

    /**
     * ========================================================================
     *                          Product Slider
     *========================================================================**/
    var productThumbs = new Swiper(".product-thumbs", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        breakpoints: {
            0: {
                slidesPerView: 2,
            },
            500: {
                slidesPerView: 4,
            }
        }
    });

    const productTop = new Swiper(".product-slider", {
        // Optional parameters
        loop: true,

        thumbs: {
            swiper: productThumbs,
        },
        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    /**
     * ========================================================================
     *            Product Page Category on Change
     *========================================================================**/

    $(".product-page .category_dropdown").change(function () {
        const category_id = Number($(this).val());

        $('[name="sub_category_id"]')
            .empty()
            .append(`<option value="0">All</option>`);

        $.ajax({
            type: "get",
            url: base_url() + "get_sub_category_options",
            data: { category_id: category_id },
            dataType: "json",
            success: function (res) {
                $('[name="sub_category_id"]')
                    .append(res.options)
                    .trigger("change");
            },
        });
    });

    /**========================================================================
     *                           WHATS NEW PAGE
     *========================================================================**/

    /**============================================
     *               LIKE BUTTON
     *=============================================**/

    $('.heart-icon').click(function () {
        const id = $(this).data('id');

        const heartIcon = $(this).find('i');
        const likesCount = $(this).find('.likes-count');
        let currentLikes = parseInt(likesCount.text()) || 0;

        if (heartIcon.hasClass('far')) {
            // Liked, change the heart icon and increment the like count
            heartIcon.removeClass('far').addClass('fas');
            likesCount.text(currentLikes + 1);

        } else {
            // Not liked, change the heart icon back and decrement the like count
            heartIcon.removeClass('fas').addClass('far');
            currentLikes === 1 ? likesCount.text("") : likesCount.text(currentLikes - 1);
            
        }

        $.ajax({
            type: "post",
            url: base_url() + (heartIcon.hasClass('fas') ? "like-post" : "dislike-post"),
            data: {id: id},
            dataType: "json",
        });
    });

    /**========================================================================
     *                           INIT FUNCTION
     *========================================================================**/

    const init = function () {
        updateProgress();
        addStikcyNav();
        navTogglerOnReload();
    };

    init();
});
