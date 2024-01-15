@extends('frontend.layouts.app')

@php
    $images = json_decode($post->images);
@endphp

@section('content')

<?php
    $isMob  = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
?>

<section class="section-whats-new-single section-py">
    <div class="bs-container">
        <div class="single-post">
            
        <div class="post-content">
            <div class="profile mb-5">
                <div class="profile-picture">
                    <img src="{{ url('assets/img/whats-new/profile.png')}}" alt="Profile Picture">
                </div>
                <div class="profile-info">
                    <div class="profile-name">Archistone</div>
                    <div class="post-date">{!! date('M d, Y', strtotime($post->created_at)) !!}</div>
                </div>
            </div>
            
            <h2 class="post-heading mb-12">{{ $post->name }}{{ !empty($post->destination) ? (" at ". $post->destination) : ""  }}</h2>


            <div class="post-img mb-16">
                <!-- Slider main container -->
                <div class="whats-new-slider product-slider swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($images as $img)
                            <div class="swiper-slide">
                                <a href="{{ url('uploads/'.$img) }}" data-fancybox="product-gallery">
                                    <img src="{{ url('uploads/'.$img) }}" alt="{{ $post->name }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="swiper-container mt-3 product-thumbs cursor-pointer">
                    <div class="swiper-wrapper">
                        @foreach ($images as $img)
                            <div class="swiper-slide">
                                <img src="{{ url('uploads/'.$img) }}" alt="{{ $post->name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="post-content mb-16">
                <p class="post-description">
                    {!! nl2br($post->description) !!}
                </p>
            </div>

            @if ($post->youtube_url && strpos($post->youtube_url, 'youtube.com'))
                @php
                    $parts = parse_url($post->youtube_url);
                    parse_str($parts['query'], $query);
                @endphp
                @if (isset($query['v']))
                <div class="post-video">
                    <iframe width="100%" height="<?= $isMob ? '190px' : '550px' ?>" src="https://www.youtube.com/embed/{{ $query['v'] }}" class="yt-iframe" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                @endif
            @endif
        </div>
    </div>
</section>

@endsection