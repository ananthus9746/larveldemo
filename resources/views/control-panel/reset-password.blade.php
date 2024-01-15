<?php
$base_url= url('/').'/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Reset Password | {{ env("APP_NAME") }}</title>
	<link rel="icon" href="<?= $base_url ?>assets/img/logo/favicon.ico" sizes="32x32">
	<link rel="stylesheet" href="<?= $base_url ?>assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $base_url ?>assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="<?= $base_url ?>assets/plugins/animate/animate.min.css">
	<link rel="stylesheet" href="<?= $base_url ?>assets/plugins/aos/css/aos.css">
	<link rel="stylesheet" href="<?= $base_url ?>assets/css/load_fonts.css">
	<link rel="stylesheet" href="<?= $base_url ?>assets/css/login.css">
</head>
<body>
<div class="wrapper">
	<div class="container-login" style="background-image: url(<?= url('assets/img/bg/login-bg.jpg') ?>);">
		<div class="wrap-login p-l-55 p-r-55 p-t-65 p-b-54">
			<form action="{{ url('/control-panel/change-password') }}" method="post">
				<span class="login-form-title p-b-49">
				Reset Password
				</span>
                <?php if (session()->get('status') == 'error') { ?>
                    <div class="alert mt-3 alert-danger">
                        <?= session()->get('msg') ?>
                    </div>
                <?php } ?>
                <?php if (session()->get('status') == 'success') { ?>
                    <div class="alert mt-3 alert-success">
                        <?= session()->get('msg') ?>
                    </div>
                <?php } ?>
				<div class="form-group wrap-input validate-input" data-validate="Password is required">
					<span class="label">Password</span>
					<input class="input" type="password" name="password" placeholder="Type your password">
					<span class="focus-input" data-symbol="&#xf190;"></span>
				</div>
				<?php if($errors->has('password')) {?>               
					<div class="invalid-feedback mb-1" style="display: block;">
						<?= $errors->get('password')[0] ?>
					</div>
				<?php } ?>
				<div class="form-group mt-3 wrap-input validate-input" data-validate="Password is required">
					<span class="label">Confirm Password</span>
					<input class="input" type="password" name="password_confirmation" placeholder="Type your password">
					<span class="focus-input" data-symbol="&#xf190;"></span>
				</div>
				<div class="container-login-form-btn mt-3">
					@csrf
					<input type="hidden" name="token" value="<?= $token ?>">
					<div class="wrap-login-form-btn">
						<div class="login-form-bgbtn"></div>
						<button class="login-form-btn">
						Submit 
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<script src="<?= $base_url ?>assets/plugins/jquery/jquery-2.2.4.min.js"></script>
<script src="<?= $base_url ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $base_url ?>assets/js/functions.js"></script>
</body>
</html>