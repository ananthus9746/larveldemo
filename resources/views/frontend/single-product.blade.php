<?php
    $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

?>
@php
    $images = json_decode($product->images);
@endphp


@php
    use App\Helpers\CategoryHelper;
    use App\Helpers\SubCategoryHelper;
    use App\Helpers\FinishHelper;
    use App\Helpers\ColorHelper;
    use App\Helpers\SizeHelper;
@endphp


@extends('frontend.layouts.app')

@section('content')

    
<div class="single-product-page py-20">
    <section class="bs-container">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-20">
            <div class="col-span-7 relative">
                <!-- Slider main container -->
                <div class=" product-slider swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($images as $img)
                            <div class="swiper-slide">
                                <a href="{{ url('uploads/'.$img) }}" data-fancybox="product-gallery">
                                    <img src="{{ url('uploads/'.$img) }}" alt="{{ $product->name }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-container mt-3 product-thumbs cursor-pointer">
                    <div class="swiper-wrapper">
                        @foreach ($images as $img)
                            <div class="swiper-slide">
                                <img src="{{ url('uploads/'.$img) }}" alt="{{ $product->name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="col-span-5">
                <div class="m">                        
                    <h1 class="text-3xl font-bold">{{ $product->name }}</h1>

                    <p class="mt-8"><strong>Type</strong> : {{ CategoryHelper::getCategoryName($product->category_id) }}</p>
                    <p class="mt-3"><strong>Brand</strong> : {{ SubCategoryHelper::getSubCategoryName($product->sub_category_id) }}</p>
                    @if ($product->finish_id)
                        <p class="mt-3"><strong>Finish</strong> : {{ FinishHelper::getFinishName($product->finish_id) }}</p>                    
                    @endif
                    @if ($product->color_id)
                        <p class="mt-3"><strong>Color</strong> : {{ ColorHelper::getColorName($product->color_id) }}</p>                    
                    @endif
                    @if ($product->size_id)
                        <p class="mt-3"><strong>Size</strong> : {{ SizeHelper::getSizeName($product->size_id) }}</p>                  
                    @endif
                    <a href="{{ url('contact-us') }}" class="mt-4 btn-style btn-style-fill">Enquire About this Product</a>
                </div>
            </div>
        </div>
        @if ($product->description)
            <div class="mt-8">
                <h2 class="text-3xl font-bold mb-3">Description</h2>
                <p>{!! nl2br($product->description) !!}</p>
            </div>
        @endif
        

        @if ($product->youtube_url && strpos($product->youtube_url, 'youtube.com'))
            @php
                $parts = parse_url($product->youtube_url);
                parse_str($parts['query'], $query);
            @endphp
            @if (isset($query['v']))
            <div class="post-video mt-16">
                <iframe width="100%" height="<?= $isMob ? '190px' : '550px' ?>" src="https://www.youtube.com/embed/{{ $query['v'] }}" class="yt-iframe" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            @endif
        @endif
    </section>
</div>


@endsection