<!DOCTYPE html>
<html lang="en">

<head>
  <title>Murifiya RentCar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/animate.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/magnific-popup.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/aos.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/jquery.timepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/jquery-ui.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatable/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatable/responsive.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/flaticon.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/icomoon.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/userpage/css/style.css">
</head>

<body>

  <?php $this->load->view('partials/userpartial/navbar'); ?>

  <?php echo $body; ?>

  <?php $this->load->view('partials/userpartial/footer'); ?>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <?php $this->load->view('partials/userpartial/script'); ?>


</body>

</html>