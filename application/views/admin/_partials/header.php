<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php if (!isset($title)) $title = 'application'; ?>
    <title><?php echo ucwords($title); ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    
    <!-- datatables css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>">
    
    <!-- jquery -->
    <script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- baseUrl global variable -->
      <script>
        const __baseUrl = '<?php echo base_url() ?>'
    </script>


</head>
