@extends('control-panel.layouts.app')

@section('title', ' Profile')

@section('content')

<div class="row">

    <div class="col-md-3">
        <div class="card h-100 m-0">
            <div class="card-body pb-0">

                <img src="{{ url('assets/img/users/'.auth('admin')->user()->profile_image) }}" id="profile-image" class="avatar d-block mx-auto">
                <input type="file" name="profile_image" hidden id="profile-image-uploader" accept="image/*">
                <button class="btn btn-info my-3 change-profile-image" style="width: -webkit-fill-available;" type="button">Change Profile Image</button>
            </div>
        </div>
        
    </div>

    <div class="col-md-9">
        <div class="card h-100 m-0">
            <div class="card-header">
                <h5 class="mb-0 text-info fw-bold">My Profile</h5>
            </div>
            <div class="card-body">
                <form class="row floating-labels" action="<?= url('control-panel/update-profile') ?>" method="POST" id="edit-profile-form">
                    <div class="col-md-6">                                    
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control form-control-sm" value="{{ auth()->user()->first_name }}" required>
                            <span class="bar"></span>
                        </div>
                    </div>
                    <div class="col-md-6">                                    
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control form-control-sm" value="{{ auth()->user()->last_name }}" required>
                            <span class="bar"></span>
                        </div>
                    </div>
                    <div class="col-md-6">     
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-sm" value="{{ auth()->user()->email }}" readonly required>
                            <span class="bar"></span>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3"> 
                        @csrf
                        <button class="btn btn-info">Save Changes</button>  
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection

@section('script')
    <script class="after-script" src="{{ url('assets/js/control-panel/pages/auth/profile.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UpdateProfileRequest', '#edit-profile-form') !!}
@endsection