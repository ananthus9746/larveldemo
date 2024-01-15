@extends('frontend.layouts.app')


@section('content')

<?php
$isMob  = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

// BREADCRUMB

$breadcrumb = true;
$image_url = 'assets/img/breadcrumb/whats-new.webp';
$title = "What's New";
$home_text = "Home";
$current_page = "What's New";
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

<section class="section-whats-new section-py">
    <div class="bs-container">
        <div class="all-posts">

            @if ($posts->count() > 0)
                        
                @foreach ($posts as $p)

                @php
            
                    $images = json_decode($p->images, true);
                                
                @endphp

                <div class="post">
                    <a href="{{ url('whats-new/'.$p->slug) }}" class="post-image" style="background-image:url({{ url('uploads/'.$images[0])}});"></a>
                    <div class="post-content">
                        <div class="profile">
                            <div class="profile-picture">
                                <img src="{{ url('assets/img/whats-new/profile.png')}}" alt="Profile Picture">
                            </div>
                            <div class="profile-info">
                                <div class="profile-name">Archistone</div>
                                <div class="post-date">{!! date('M d, Y', strtotime($p->created_at)) !!}</div>
                            </div>
                        </div>
                        <div class="post-info">
                            <a href="{{ url('whats-new/'.$p->slug) }}">
                                <h2 class="post-heading">{{ $p->name }}{{ !empty($p->destination) ? (" at ". $p->destination) : ""  }}</h2>
                                <p class="post-text">
                                    {!! $p->description !!}
                                </p>
                            </a>
                        </div>
                        <div class="post-stats">
                            <div class="views">{{ $p->view_count }} views</div>
                            <div class="heart-icon" data-id="{{ $p->id }}">
                                <p class="likes-count">{{ $p->like_count }}</p>
                                <i class="far fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endforeach

            @else

                <div class="col-span-4">
                    <p class="text-center text-lg">No Posts Available</p>
                </div>

            @endif
        </div>
    </div>
</section>

@endsection