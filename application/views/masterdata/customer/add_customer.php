<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $active_menu ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterdata/customer"><?php echo $prev_menu ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $active_menu ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <form action="<?php echo base_url('masterdata/simpan_data_customer'); ?>" method="post">
                        <div class="card card-info card-outline">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Data Login Pengguna</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Email address</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <label>Role User</label>
                                                    <select class="form-control" name="roleUser">
                                                        <?php
                                                        foreach ($data_role as $role) {
                                                        ?>
                                                            <option value="<?php echo $role['Id_role'] ?>"><?php echo $role['role_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-6">

                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Data Pribadi Pengguna</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Nama Pengguna</label>
                                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Sesuai KTP">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat (Sesuai KTP)</label>
                                                    <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="5"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>No Telfon Aktif</label>
                                                    <input type="text" class="form-control" name="no_telfon" placeholder="Masukkan No Telfon Aktif">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="L" name="j_kelamin">
                                                            <label class="form-check-label">Laki Laki</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="P" name="j_kelamin">
                                                            <label class="form-check-label">Perempuan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary">Save data</button>
                                <a href="<?php echo base_url('masterdata/customer'); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>


                            </div>
                        </div>
                    </form>
                    <!-- general form elements -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>