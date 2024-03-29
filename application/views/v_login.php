<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SI IDUL | RSUD dr. Rehatta Provinsi Jawa Tengah</title>
	<!-- logo -->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/rehatta.png" />
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/font-awesome/css/font-awesome.min.css">
	<!-- NProgress -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/nprogress/nprogress.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/animate.css/animate.min.css">

	<!-- Custom Theme Style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/build/css/custom.min.css">
</head>

<body class="login">
	<div>
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form method="post" action="<?php echo base_url('auth/proses_login'); ?>">
						<h1>Login </h1>
						<?php echo $this->session->userdata('message') ?>
						<div>
							<input type="text" class="form-control" placeholder="Username" name="username" required />
						</div>
						<div>
							<input type="password" class="form-control" placeholder="Password" name="password" required />
						</div>
						<div>
							<button type="submit" class="btn btn-default submit"> Log in</button>
							<!-- <a class="reset_pass" href="#">Lost your password?</a> -->
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<!-- <p class="change_link">New to site?
								<a href="#signup" class="to_register"> Create Account </a>
							</p> -->

							<div class="clearfix"></div>
							<br />

							<div>
								<h1><i class="fa fa-book"></i> SI IDUL</h1>
								<p> Sistem Informasi Indikator Mutu RSUD dr. Rehatta</p>
								<p>&copy; <?php echo date('Y'); ?> RSUD dr. Rehatta Provinsi Jawa Tengah</p>
							</div>
						</div>
					</form>
				</section>
			</div>

			<div id="register" class="animate form registration_form">
				<section class="login_content">
					<form>
						<h1>Create Account</h1>
						<div>
							<input type="text" class="form-control" placeholder="Username" required="" />
						</div>
						<div>
							<input type="email" class="form-control" placeholder="Email" required="" />
						</div>
						<div>
							<input type="password" class="form-control" placeholder="Password" required="" />
						</div>
						<div>
							<a class="btn btn-default submit" href="index.html">Submit</a>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<p class="change_link">Already a member ?
								<a href="#signin" class="to_register"> Log in </a>
							</p>

							<div class="clearfix"></div>
							<br />

							<div>
								<h1><i class="fa fa-book"></i> SI IDUL </h1>
								<p>&copy;<?php echo date('Y'); ?> RSUD dr. Rehatta Provinsi Jawa Tengah. All Rights Reserved.</p>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
</body>

</html>