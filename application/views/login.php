<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Warung - CI | Login</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
		<div class="row w-100 vh-100 d-flex justify-content-center align-items-center bg-primary">
			<div class="col pl-5 text-center text-white">
				<div class="card d-inline-block">
					<div class="card-body">
						<span class="display-3 text-primary" style="font-family: ubuntu; font-weight: 400;">Warung</span>
					</div>
				</div>
			</div>

			<div class="col-4 mr-5 pr-5">
				<div 
				class="
				alert alert-danger fade text-center"
				>
					<span id="alertMessage"></span>
					<!-- <button class="close text-danger" data-dismiss="alert">
						&times;
					</button> -->
				</div>
				<div class="card bg-white">
					<div class="card-body">
						<h3 class="mb-3">Login</h3>
						<form method="post">
							<input type="text" class="form-control mb-3" name="username" placeholder="Username">
							<input type="password" class="form-control mb-3" name="password" placeholder="Password">
						   
							<button id="btnLogin" class="btn btn-primary">Login</button>    

						</form>
					</div>
				</div>
			</div>
		</div>
	<!-- End of Page Wrapper -->

  

  

	<!-- Bootstrap core JavaScript-->

	<script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/script/login.js') ?>"></script>

</body>

</html>