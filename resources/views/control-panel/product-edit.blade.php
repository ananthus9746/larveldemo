@section("title", "Edit Product")

@extends('control-panel.layouts.app')

@section('head')
	<link rel="stylesheet" href="{{ url('assets/plugins/filepond/css/filepond.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/plugins/filepond/css/filepond-plugin-image-preview.min.css') }}">
@endsection


@section('content')

@php
    use App\Helpers\CategoryHelper;
    use App\Helpers\SubCategoryHelper;
    use App\Helpers\FinishHelper;
    use App\Helpers\SizeHelper;
    use App\Helpers\ColorHelper;
    use App\Helpers\PageHelper;
@endphp

<div class="container">

	<div class="row">

        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold text-primary">Edit</h5>
                </div>
                <div class="card-body">
                    <form class="floating-labels" action="<?= url('control-panel/update-product') ?>" method="post" autocomplete="off" id="edit-product-form" novalidate>
                        <div class="row">
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control form-control-sm" name="name" value="{{ $product->name }}" required>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3 focused" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="category_id" data-select="true" data-width="100%">
                                        <option value=""></option>
                                        {!! CategoryHelper::getCategoryOptions($product->category_id) !!}
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3 focused" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="sub_category_id" data-select="true" data-width="100%">
                                        <option value=""></option>
                                        {!! SubCategoryHelper::getSubCategoryOptions($product->category_id, $product->sub_category_id) !!}
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3 focused" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Finish</label>
                                    <select name="finish_id" data-select="true" data-width="100%">
                                        <option value=""></option>
                                        {!! FinishHelper::getFinishOptions($product->finish_id) !!}
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3 focused" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Color</label>
                                    <select name="color_id" data-select="true" data-width="100%">
                                        <option value=""></option>
                                        {!! ColorHelper::getColorOptions($product->color_id) !!}
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3 focused" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Size</label>
                                    <select name="size_id" data-select="true" data-width="100%">
                                        <option value=""></option>
                                        {!! SizeHelper::getSizeOptions($product->size_id) !!}
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Destination</label>
                                    <input type="text" class="form-control form-control-sm" name="destination" value="{{ $product->destination }}" required>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group focused">
                                    <label>Page</label>
                                    <select name="page_id" data-select="true" data-width="100%">
                                        <option value=""></option>
                                        {!! PageHelper::getPageOptions($product->page_id) !!}
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Youtube Url</label>
                                    <input type="text" class="form-control form-control-sm" name="youtube_url" value="{{ $product->youtube_url }}" required>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label style="position: static;font-weight:bold;color:black;margin-bottom: 15px;">Description</label>
                                    <textarea name="description" class="form-control form-control-sm">{!! $product->description !!}</textarea>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 25px;">
                                <label style="position: static;font-weight:bold;color:black;margin-bottom: 25px;">Images</label>
                                <input type="file" name="images[]" id="images" multiple/>
                            </div>
                            <div class="col-md-12" style="margin-top: 55px;">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-info">Submit</button>	
                                <a href="{{ url('control-panel/products') }}" class="btn btn-red">Back</a>	
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

	</div>

</div>
	
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateProductRequest', '#edit-product-form') !!}
    @php
        $images = json_decode($product->images);
    @endphp

    <script>
        const files = [
            @foreach ($images as $image_name)
            {
                source: "{{ url('uploads/'.$image_name) }}"
            },
            @endforeach
        ];
    </script>
    <script src="{{ url('assets/plugins/filepond/js/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ url('assets/plugins/filepond/js/filepond.min.js') }}"></script>
    <script src="{{ url('assets/plugins/filepond/js/filepond.jquery.js') }}"></script>
	<script class="after-script" src="{{ url('assets/js/control-panel/pages/products/product.js') }}"></script>
@endsection