@section("title", "Pages")

@extends('control-panel.layouts.app')

@section('content')

<div class="container">

	<div class="row">

        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold text-primary">Create</h5>
                </div>
                <div class="card-body">
                    <form class="floating-labels" action="<?= route('pages.store') ?>" method="post" autocomplete="off" id="create-page-form" novalidate>
                        <div class="row">
                            <div class="col-md-3" style="padding: 0px 20px;">
                                <div class="form-group">
                                    <label>Page Name</label>
                                    <input type="text" class="form-control form-control-sm" name="name" required>
                                    <span class="bar"></span>
                                </div>
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
                                <input type="text" class="form-control form-control-sm pageTableSearchInput">
                                <span class="bar"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Search By</label>
                                <select class="form-control form-control-sm pageTableSearchBySelect">
                                    <option value="name">Name</option>
                                </select>
                                <span class="bar"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pageTable">
                                    <thead>
                                        <tr>
                                            <th>Sr.#</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                <div class="pageTablePagination za-margin-top noselect"></div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>

		</div>

	</div>

    <!-- Edit Page -->

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Page</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= route('pages.update','?') ?>" class="floating-labels edit-form" method="put" autocomplete="off" id="edit-page-form">
                    <div class="modal-body pt-5">
                        <div class="form-group">
                            <label>Page Name</label>
                            <input type="text" class="form-control form-control-sm" name="name" id="name" required>
                            <span class="bar"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-info" type="submit">Submit</button>
                        <button class="btn btn-red" type="button" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Delete Page -->

    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Page</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= route('pages.destroy','?') ?>" class="delete-form">
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
	<script class="after-script" src="{{ url('assets/js/control-panel/pages/products/page.js') }}"></script>
@endsection