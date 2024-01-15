@extends('control-panel.layouts.app')

@section('title', 'Change Password')

@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="card h-100 m-0">
            <div class="card-header">
                <h5 class="mb-0 text-info fw-bold">Change your Password</h5>
            </div>
            <div class="card-body">
                <form class="row floating-labels" action="<?= url('control-panel/change-password') ?>" method="POST" id="change-password-form">
                    <div class="col-md-4">                                    
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="text" id="old_password" name="old_password" class="form-control form-control-sm" value="" required>
                            <span class="bar"></span>
                        </div>
                    </div>
                    <div class="col-md-4">                                    
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" id="password" name="password" class="form-control form-control-sm" value="" required>
                            <span class="bar"></span>
                        </div>
                    </div>
                    <div class="col-md-4">                                    
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="text" id="confirm_password" name="confirm_password" class="form-control form-control-sm" value="" required>
                            <span class="bar"></span>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3"> 
                        @csrf
                        <button class="btn btn-info">Submit</button>  
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection

@section('script')
    <script class="after-script" src="{{ url('assets/js/control-panel/pages/auth/change-password.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\ChangePasswordRequest', '#change-password-form') !!}
@endsection