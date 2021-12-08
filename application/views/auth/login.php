<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UBSI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    .login-page,
    .register-page {
        background-image: url('<?php echo base_url(); ?>assets/images/bg-3.png');
        background-size: cover;
    }

    .login-card-body,
    .register-card-body {
        border-radius: 4px;
    }

    .login-logo a,
    .register-logo a {
        color: #fff;
    }
</style>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>UBSI</b>RENTCAM</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start application</p>

                <form action="<?php echo base_url('auth/login') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-2">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!--<div class="col-12">
                            <a href="<?php echo base_url('auth/register') ?>" class="btn btn-success btn-block">Don't have an account ? Register Now</a>

                        </div> -->
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <?php if ($this->session->flashdata('success')) : ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal("Success!", "<?php echo $_SESSION['success'] ?>", "success");
            });
        </script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal("Sorry!", "<?php echo $_SESSION['error'] ?>", "error");
            });
        </script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('warning')) : ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal("Warning!", "<?php echo $_SESSION['warning'] ?>", "warning");
            });
        </script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('info')) : ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal("Info!", "<?php echo $_SESSION['info'] ?>", "info");
            });
        </script>
    <?php endif; ?>
</body>

</html>