@php
    use App\Helpers\CategoryHelper;
    use App\Helpers\SubCategoryHelper;
    use App\Helpers\ColorHelper;
@endphp


@extends('frontend.layouts.app')
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

@section('content')
    

<?php if ($breadcrumb) : ?>
    <div class="breadcrumb breadcrumb-wrapper" style="background-image: url({{ url($image_url) }}); background-position: <?= $position ?>">
        <div class="black-bg">
            <h3 class="title"><?= $title ?></h3>
            <p class="breadcrumb_text"><a href="{{ url('/') }}"><?= $home_text ?></a> &nbsp; / &nbsp; <a href="#"> <?= $current_page ?></a> </p>
        </div>
    </div>
<?php endif ?>

<div class="product-page" id="products">
    <section class="section-pt pb-20">
        <div class="bs-container">
            <div class="grid md:grid-cols-4 grid-cols-1 gap-12">
                <div>
                    <label>Type</label>
                    <select name="category_id" class="form-control form-control-sm category_dropdown" data-select="true" data-width="100%">
                        <option value="0" selected>All</option>
                        {!! CategoryHelper::getCategoryOptions($category_id ?? null) !!}
                    </select>
                </div>
                <div>
                    <label>Brand</label>
                    <select name="sub_category_id" class="form-control form-control-sm sub_category_dropdown" data-select="true" data-width="100%">
                        <option value="0" selected>All</option>
                        @if (isset($category_id))
                            {!! SubCategoryHelper::getSubCategoryOptions($category_id, $sub_category_id ?? null) !!}
                        @endif
                    </select>
                </div>
                <div>
                    <label>Color</label>
                    <select name="color_id" class="form-control form-control-sm color_dropdown" data-select="true" data-width="100%">
                        <option value="0" selected>All</option>
                        {!! ColorHelper::getColorOptions($color_id ?? null) !!}
                    </select>
                </div>
                <div class="pt-4">
                    <button type="button" class="btn-style reset-btn py-2">Reset</button>
                </div>
            </div>

        </div>
    </section>

    <section class="section-products section-mb" id="products">
        <div class="bs-container">
            <div class="grid md:grid-cols-4 grid-cols-1 gap-12">

                @if ($products->count() > 0)
                        
                    @foreach ($products as $product)

                    @php
                        $images = json_decode($product->images, true);

                        $img_arr = explode('.', $images[0]);
                        
                        $img_name = $img_arr[0];
                        $img_ext = $img_arr[1];
                    @endphp
                    
                    <div>
                        <a href="{{ url('product/'.$product->slug) }}">

                            <div class="product-img" style="background-image: url({{ url('uploads/'.$img_name.'-sm.'.$img_ext) }});"></div>

                            <p class="mt-2">{{ $product->name }}</p>
                        </a>
                    </div>

                    @endforeach

                @else

                    <div class="col-span-4">
                        <p class="text-center text-lg">No Products Available</p>
                    </div>

                @endif

            </div>

            <div class="mt-5">
                {{ $products->links('pagination.custom-tailwind') }}
            </div>
        </div>
    </section>
</div>

@endsection