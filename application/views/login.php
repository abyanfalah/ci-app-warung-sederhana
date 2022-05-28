<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Penggajian | Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
        <div class="row w-100 vh-100 d-flex justify-content-center align-items-center bg-primary">
            <div class="col pl-5 text-center text-white">
                <span class="display-3" style="font-family: ubuntu;">Warung CI</span>
            </div>

            <div class="col-4 mr-5 pr-5">
                <?php 
                    if ($message = $this->session->flashdata('login_message')) {
                ?>
                        <div class="alert alert-danger alert-dismissable fade show text-center"><?php echo $message; ?> <button class="close text-danger" data-dismiss="alert">&times;</button></div>
                <?php
                    }
                ?>
                <div class="card bg-white">
                    <div class="card-body">
                        <h3 class="mb-3">Login</h3>
                        <form method="post">
                            <input type="text" class="form-control mb-3" name="username" placeholder="Username">
                            <input type="password" class="form-control mb-3" name="password" placeholder="Password">
                            <input type="submit" class="btn btn-primary" name="btn_login" value="Login">
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

</body>

</html>