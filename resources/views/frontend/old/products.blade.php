@extends('frontend.layouts.app')


@section('content')
<?php
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
// BREADCRUMB
$breadcrumb = true;
$image_url = 'assets/img/breadcrumb/products.webp';
$title = 'Products';
$home_text = "Home";
$current_page = "Products";
$position = $isMob ? 'center right' : 'center';

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

<div class="product-page" id="products">
    <section class="section-products section-py">
        <div class="bs-container">
            <div class="heading flex flex-col items-center">
                <h6 class="h-tag md:mb-2 mb-4 wow animate__fadeInLeft"> Explore </h6>
                <h1 class="section-heading mb-4 wow animate__fadeInRight">
                    The Complete
                    <span class="text-gradient-dark"> Collection </span>
                </h1>
            </div>

            <!--Tabs navigation-->
            <ul class="product-tabs mb-12 wow animate__fadeInUp" role="tablist" data-te-nav-ref>
                <li role="presentation">
                    <a href="#product-adicon" class="product-tab active">Adicon <span>(10)</span></a>
                </li>
                <li role="presentation">
                    <a href="#product-atlas-plan" class="product-tab">Atlas Plan <span>(29)</span></a>
                </li>
                <li role="presentation">
                    <a href="#product-casla-quartz" class="product-tab">Casla Quartz <span>(17)</span></a>
                </li>
                <li role="presentation">
                    <a href="#product-castle-stones" class="product-tab">Castle Stones <span>(12)</span></a>
                </li>
                <li role="presentation">
                    <a href="#product-terrazzo" class="product-tab">Terrazzo <span>(14)</span></a>
                </li>
            </ul>

            <!--Tabs content-->
            <div>
                <div class="product-wrapper md:px-0 px-5 wow animate__fadeInUpBig">
                    <div class="product-content">
                        <div class="product-row grid md:grid-cols-4 grid-cols-1 gap-12 section-pb">
                            <div class="col-span-1">
                                <div class="product-item">
                                    <div class="product-img-cont">
                                        <div class="product-img">
                                            <img src="{{ url('/assets/img/products/adicon/apollo-white.webp') }}">
                                        </div>
                                    </div>
                                    <div class="product-name mt-5">
                                        <div class="product-heading">
                                            <h5 class="text-lg"> Apollo White </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="product-item">
                                    <div class="product-img-cont">
                                        <div class="product-img">
                                            <img src="{{ url('/assets/img/products/adicon/atlantic-bianco.webp') }}">
                                        </div>
                                    </div>
                                    <div class="product-name mt-5">
                                        <div class="product-heading">
                                            <h5 class="text-lg"> Atlantic Bianco </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="product-item">
                                    <div class="product-img-cont">
                                        <div class="product-img">
                                            <img src="{{ url('/assets/img/products/adicon/botanic-blue.webp') }}">
                                        </div>
                                    </div>
                                    <div class="product-name mt-5">
                                        <div class="product-heading">
                                            <h5 class="text-lg"> Botanic Blue </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="product-item">
                                    <div class="product-img-cont">
                                        <div class="product-img">
                                            <img src="{{ url('/assets/img/products/adicon/calacatta-belisimo.webp') }}">
                                        </div>
                                    </div>
                                    <div class="product-name mt-5">
                                        <div class="product-heading">
                                            <h5 class="text-lg"> Calacatta Belisimo </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="product-item">
                                    <div class="product-img-cont">
                                        <div class="product-img">
                                            <img src="{{ url('/assets/img/products/adicon/estilo-onyx.webp') }}">
                                        </div>
                                    </div>
                                    <div class="product-name mt-5">
                                        <div class="product-heading">
                                            <h5 class="text-lg"> Estilo Onyx </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="product-item">
                                    <div class="product-img-cont">
                                        <div class="product-img">
                                            <img src="{{ url('/assets/img/products/adicon/patagonia-bianco.webp') }}">
                                        </div>
                                    </div>
                                    <div class="product-name mt-5">
                                        <div class="product-heading">
                                            <h5 class="text-lg"> Patagonia Bianco </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="product-item">
                                    <div class="product-img-cont">
                                        <div class="product-img">
                                            <img src="{{ url('/assets/img/products/adicon/pearl-white.webp') }}">
                                        </div>
                                    </div>
                                    <div class="product-name mt-5">
                                        <div class="product-heading">
                                            <h5 class="text-lg"> Pearl White </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="product-item">
                                    <div class="product-img-cont">
                                        <div class="product-img">
                                            <img src="{{ url('/assets/img/products/adicon/statuario-natural.webp') }}">
                                        </div>
                                    </div>
                                    <div class="product-name mt-5">
                                        <div class="product-heading">
                                            <h5 class="text-lg"> Statuario Natural </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="product-item">
                                    <div class="product-img-cont">
                                        <div class="product-img">
                                            <img src="{{ url('/assets/img/products/adicon/turkey-onyx.webp') }}">
                                        </div>
                                    </div>
                                    <div class="product-name mt-5">
                                        <div class="product-heading">
                                            <h5 class="text-lg"> Turkey Onyx </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="product-item">
                                    <div class="product-img-cont">
                                        <div class="product-img">
                                            <img src="{{ url('/assets/img/products/adicon/viola-onyx.webp') }}">
                                        </div>
                                    </div>
                                    <div class="product-name mt-5">
                                        <div class="product-heading">
                                            <h5 class="text-lg"> Viola Onyx </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="result-gallery">
                            <div class="heading flex flex-col items-center mb-12">
                                <h6 class="h-tag md:mb-2 mb-4"> Transformed Spaces </h6>
                                <h1 class="section-heading mb-4">
                                    Results of
                                    <span class="text-gradient-dark"> Our Offerings </span>
                                </h1>
                            </div>
                            <div class="grid md:grid-cols-3 grid-cols-1 gap-12 result-gallery-row">
                                <div class="col-span-1 result-item">
                                    <a data-fancybox="adicon-gallery" href="{{ url('/assets/img/products/adicon/results/lg/apollo-white.webp') }}">
                                        <div class="result-img-cont">
                                            <div class="result-img">
                                                <img src="{{ url('/assets/img/products/adicon/results/apollo-white.webp') }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-span-1 result-item">
                                    <a data-fancybox="adicon-gallery" href="{{ url('/assets/img/products/adicon/results/lg/atlantic-bianco.webp') }}">
                                        <div class="result-img-cont">
                                            <div class="result-img">
                                                <img src="{{ url('/assets/img/products/adicon/results/atlantic-bianco.webp') }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-span-1 result-item">
                                    <a data-fancybox="adicon-gallery" href="{{ url('/assets/img/products/adicon/results/lg/botanic-blue.webp') }}">
                                        <div class="result-img-cont">
                                            <div class="result-img">
                                                <img src="{{ url('/assets/img/products/adicon/results/botanic-blue.webp') }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-span-1 result-item">
                                    <a data-fancybox="adicon-gallery" href="{{ url('/assets/img/products/adicon/results/lg/calacatta-belisimo.webp') }}">
                                        <div class="result-img-cont">
                                            <div class="result-img">
                                                <img src="{{ url('/assets/img/products/adicon/results/calacatta-belisimo.webp') }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-span-1 result-item">
                                    <a data-fancybox="adicon-gallery" href="{{ url('/assets/img/products/adicon/results/lg/estilo-onyx.webp') }}">
                                        <div class="result-img-cont">
                                            <div class="result-img">
                                                <img src="{{ url('/assets/img/products/adicon/results/estilo-onyx.webp') }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-span-1 result-item">
                                    <a data-fancybox="adicon-gallery" href="{{ url('/assets/img/products/adicon/results/lg/patagonia-bianco.webp') }}">
                                        <div class="result-img-cont">
                                            <div class="result-img">
                                                <img src="{{ url('/assets/img/products/adicon/results/patagonia-bianco.webp') }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-span-1 result-item">
                                    <a data-fancybox="adicon-gallery" href="{{ url('/assets/img/products/adicon/results/lg/pearl-white.webp') }}">
                                        <div class="result-img-cont">
                                            <div class="result-img">
                                                <img src="{{ url('/assets/img/products/adicon/results/pearl-white.webp') }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-span-1 result-item">
                                    <a data-fancybox="adicon-gallery" href="{{ url('/assets/img/products/adicon/results/lg/statuario-natural.webp') }}">
                                        <div class="result-img-cont">
                                            <div class="result-img">
                                                <img src="{{ url('/assets/img/products/adicon/results/statuario-natural.webp') }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-span-1 result-item">
                                    <a data-fancybox="adicon-gallery" href="{{ url('/assets/img/products/adicon/results/lg/turkey-onyx.webp') }}">
                                        <div class="result-img-cont">
                                            <div class="result-img">
                                                <img src="{{ url('/assets/img/products/adicon/results/turkey-onyx.webp') }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-span-1 result-item">
                                    <a data-fancybox="adicon-gallery" href="{{ url('/assets/img/products/adicon/results/lg/viola-onyx.webp') }}">
                                        <div class="result-img-cont">
                                            <div class="result-img">
                                                <img src="{{ url('/assets/img/products/adicon/results/viola-onyx.webp') }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection