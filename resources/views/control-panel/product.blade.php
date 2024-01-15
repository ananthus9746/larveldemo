@section("title", "Products")

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
    use App\Helpers\PageHelper;
    use App\Helpers\ColorHelper;
@endphp

<div class="container">

	<div class="row">

        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold text-primary">Create</h5>
                </div>
                <div class="card-body">
                    <form class="floating-labels" action="<?= route('products.store') ?>" method="post" autocomplete="off" id="create-product-form" novalidate>
                        <div class="row">
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control form-control-sm" name="name" required>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="category_id" data-select="true" data-width="100%" required>
                                        <option value=""></option>
                                        {!! CategoryHelper::getCategoryOptions() !!}
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="sub_category_id" data-select="true" data-width="100%" required>
                                        <option value=""></option>
                                        <option value="" disabled>Please select Type first.</option>
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Finish</label>
                                    <select name="finish_id" data-select="true" data-width="100%" required>
                                        <option value=""></option>
                                        {!! FinishHelper::getFinishOptions() !!}
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Color</label>
                                    <select name="color_id" data-select="true" data-width="100%">
                                        <option value=""></option>
                                        {!! ColorHelper::getColorOptions() !!}
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Size</label>
                                    <select name="size_id" data-select="true" data-width="100%">
                                        <option value=""></option>
                                        {!! SizeHelper::getSizeOptions() !!}
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Destination</label>
                                    <input type="text" class="form-control form-control-sm" name="destination" required>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Page</label>
                                    <select name="page_id" data-select="true" data-width="100%">
                                        <option value=""></option>
                                        {!! PageHelper::getPageOptions() !!}
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Youtube Url</label>
                                    <input type="text" class="form-control form-control-sm" name="youtube_url" required>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label style="position: static;font-weight:bold;color:black;margin-bottom: 15px;">Description</label>
                                    <textarea name="description" class="form-control form-control-sm"></textarea>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 25px;">
                                
                                <input type="file" name="images[]" id="images" multiple/>
                            </div>
                            <div class="col-md-12" style="margin-top: 55px;">
                                <button type="submit"  class="btn btn-info">Submit</button>	
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

		<div class="col-md-12">

            <div class="card shadow">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold text-primary">Records</h5>
                </div>
                <div class="card-body">
                    <div class="row floating-labels">
                        <div class="col-md-3 mb-md-0 mb-3">
                            <div class="form-group">
                                <label>Search</label>
                                <input type="text" class="form-control form-control-sm productTableSearchInput">
                                <span class="bar"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Search By</label>
                                <select class="form-control form-control-sm productTableSearchBySelect">
                                    <option value="products.name">Name</option>
                                    <option value="categories.name">Type Name</option>
                                    <option value="sub_categories.name">Brand Name</option>
                                    <option value="finishes.name">Finish</option>
                                    <option value="colors.name">Color</option>
                                    <option value="pages.name">Page</option>
                                </select>
                                <span class="bar"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="productTable">
                                    <thead>
                                        <tr>
                                            <th>Sr.#</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Brand</th>
                                            <th>Finish</th>
                                            <th>Color</th>
                                            <th>Page</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                <div class="productTablePagination za-margin-top noselect"></div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>

		</div>

	</div>


    <!-- Delete Product -->

    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Product</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= route('products.destroy','?') ?>" class="delete-form">
                    <div class="modal-body">
                        <p>Are you really want to delete this row.</p>
                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-info" type="submit">Submit</button>
                        <button class="btn btn-red" type="button" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
	
@endsection

@section('script')

    {!! JsValidator::formRequest('App\Http\Requests\StoreProductRequest', '#create-product-form') !!}
    <script>        
        const files = [];
    </script>
    <script src="{{ url('assets/plugins/filepond/js/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ url('assets/plugins/filepond/js/filepond.min.js') }}"></script>
    <script src="{{ url('assets/plugins/filepond/js/filepond.jquery.js') }}"></script>
	<script class="after-script" src="{{ url('assets/js/control-panel/pages/products/product.js') }}"></script>
@endsection