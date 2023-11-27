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
                    <form action="<?php echo base_url('masterdata/update_data_customer'); ?>" method="post">
                        <div class="card card-info card-outline">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Data Login Customer</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Email address</label>
                                                    <input type="hidden" name="idCust" value="<?php echo $data_customer['Id_cust'] ?>">
                                                    <input type="email" class="form-control" name="email" value="<?php echo isset($data_customer['email']) ? $data_customer['email'] : ''; ?>" placeholder="Enter email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Role User</label>
                                                    <select class="form-control" name="roleUser">
                                                        <?php
                                                        foreach ($data_role as $role) {
                                                        ?>
                                                            <option value="<?php echo $role['Id_role'] ?>" <?php echo isset($data_customer['role']) ? ($role['Id_role'] == $data_customer['role'] ? 'selected' : '') : ''; ?>><?php echo $role['role_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status User</label>
                                                    <select class="form-control" name="statusUser">
                                                        <option value="1" <?php echo isset($data_customer['isAktif']) ? (1 == $data_customer['isAktif'] ? 'selected' : '') : ''; ?>>Aktif</option>
                                                        <option value="0" <?php echo isset($data_customer['isAktif']) ? (0 == $data_customer['isAktif'] ? 'selected' : '') : ''; ?>>Non Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-6">

                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Data Pribadi Customer</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Nama Customer</label>
                                                    <input type="text" class="form-control" name="nama" value="<?php echo isset($data_customer['nama']) ? $data_customer['nama'] : ''; ?>" placeholder="Masukkan Nama Sesuai KTP">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat (Sesuai KTP)</label>
                                                    <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="5"><?php echo isset($data_customer['alamat']) ? $data_customer['alamat'] : ''; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>No Telfon Aktif</label>
                                                    <input type="text" class="form-control" name="no_telfon" value="<?php echo isset($data_customer['no_telfon']) ? $data_customer['no_telfon'] : ''; ?>" placeholder="Masukkan No Telfon Aktif">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="L" name="j_kelamin" <?php echo isset($data_customer['j_kelamin']) ? ('L' == $data_customer['j_kelamin'] ? 'checked' : '') : ''; ?>>
                                                            <label class="form-check-label">Laki Laki</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="P" name="j_kelamin" <?php echo isset($data_customer['j_kelamin']) ? ('P' == $data_customer['j_kelamin'] ? 'checked' : '') : ''; ?>>
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
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>