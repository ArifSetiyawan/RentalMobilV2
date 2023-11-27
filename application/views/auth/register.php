<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Murifiya Rental Car</title>
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
        background-image: url('<?php echo base_url(); ?>assets/images/Mobil.jpg');
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

    .register-box {
        width: 60%;
    }
</style>

<body class="hold-transition register-page">
    <div class="register-box">

        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <img src="<?php echo base_url(); ?>assets/userpage/images/logo.png" alt="AdminLTE Logo" class="" width="250">

            </div>
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new customer</p>

                <form action="<?php echo base_url('auth/registered') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="pass">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span><i toggle="#pass" class="fa fa-eye toggle-password"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" placeholder="No Telfon" name="noTelfon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <select name="j_kelamin" id="j_kelamin" class="form-control">
                                <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" name="keperluan">
                                <option value="" selected disabled>-- Pilih Keperluan --</option>
                                <option value="Perseorangan">Perseorangan</option>
                                <option value="Perusahaan">Perusahaan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="alamat" class="form-control" id="alamat" cols="45" rows="2" placeholder="Masukkan Alamat Lengkap Sesuai Domisili"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-2">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <div class="col-12">
                            <a href="<?php echo base_url('auth') ?>" class="btn btn-success btn-block">Saya sudah punya akun</a>

                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>

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
                swal("", "<?php echo $_SESSION['error'] ?>", "error");
            });
        </script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('warning')) : ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal("", "<?php echo $_SESSION['warning'] ?>", "warning");
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