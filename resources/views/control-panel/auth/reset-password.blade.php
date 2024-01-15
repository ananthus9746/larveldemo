
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="With this Admin Panel you can easily customize your products, orders and shipping.">
    <meta name="robots" content="noindex,nofollow">
    <title>Reset Password | Admin Panel</title>
    <link rel="canonical" href="<?= url('/') ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= url('favicon.ico') ?>">
    <!-- Admin Panel Layout -->
    <link href="{{ url('assets/css/control-panel/layout.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ url('assets/css/control-panel/style.css') }}" rel="stylesheet">
    <!-- Auth CSS -->
    <link href="{{ url('assets/css/control-panel/auth.css') }}" rel="stylesheet">
</head>


<body class="fix-header fix-sidebar reset_password_page card-no-border">

    <section id="wrapper">
        <div class="auth-register px-4 px-md-0"  style="background-image:url(<?= url('/assets/img/background/login-register-1.jpg') ?>);">
            <div class="auth-box card">
                <div class="card-body auth-card-body">
                    <?php if (!empty($message)): ?>
                        <div class="alert alert-info"><?php echo $message;?></div>
                    <?php endif ?>
                    <?php 
                        if (!isset($errors)) {
                            $errors = [];
                        }

                    ?>
                    <form action="<?= url('control-panel/reset-password') ?>" class="floating-labels" id="reset-password-form" method="post" autocomplete="off" accept-charset="utf-8">
                        
                        <h3 class="p-2 rounded-title font-weight-bold text-black-100 text-center mb-3">Reset Password</h3>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" value="{{ isset($remember_me) ? ($remember_me ? $password : '') : '' }}" required>
                            <span class="bar"></span>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control form-control-sm" value="{{ isset($remember_me) ? ($remember_me ? $password : '') : '' }}" required>
                            <span class="bar"></span>
                        </div>
                        
                        <div class="form-group mt-3">
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-info btn-lg w-100 text-uppercase waves-effect waves-light" type="submit">Submit</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        <input type="hidden" name="token" value="{{ $token }}">
                        <?php if (isset($_GET['redirect_url'])): ?>
                            <input type="hidden" name="redirect_url" value="<?= $_GET['redirect_url']; ?>">
                        <?php endif ?>
                    </form>

                    <p class="mb-1">
                        <a href="login">Remembered your password? Login</a>
                    </p>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
            
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!--Jqurey Ajax Form -->
    <script src="{{ url('assets/plugins/jquery-form/jquery.form.min.js') }}"></script>
    <!-- Sweet alert 2 -->
    <script src="{{ url('assets/plugins/sweetalert2/js/sweetalert2.all.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <!-- PJAX -->
    <script src="{{ url('assets/plugins/pjax/jquery.pjax.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('assets/js/control-panel/utils.js') }}"></script>        
    <script class="after-script" src="{{ url('assets/js/control-panel/reset-password.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ResetPasswordRequest', '#reset-password-form') !!}

</body>
</html>
