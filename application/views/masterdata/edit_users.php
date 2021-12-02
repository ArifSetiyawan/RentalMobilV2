<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterdata/users">Data User</a></li>
                        <li class="breadcrumb-item active">Edit Data User</li>
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
                    <!-- general form elements -->
                    <div class="card">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url('masterdata/update_data_user'); ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="hidden" name="idUsers" value="<?php echo $data_users['id_user'] ?>">
                                    <input type="email" class="form-control" name="email" value="<?php echo isset($data_users['email']) ? $data_users['email'] : ''; ?>" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>Role User</label>
                                    <select class="form-control" name="roleUser">
                                        <option value="1" <?php echo isset($data_users['role']) ? ('1' == $data_users['role'] ? 'selected' : '') : ''; ?>>Superadmin</option>
                                        <option value="2" <?php echo isset($data_users['role']) ? ('2' == $data_users['role'] ? 'selected' : '') : ''; ?>>Pelanggan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status User</label>
                                    <select class="form-control" name="statusUser">
                                        <option value="1" <?php echo isset($data_users['isAktif']) ? ('1' == $data_users['isAktif'] ? 'selected' : '') : ''; ?>>Aktif</option>
                                        <option value="0" <?php echo isset($data_users['isAktif']) ? ('0' == $data_users['isAktif'] ? 'selected' : '') : ''; ?>>Non Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save data</button>
                                <a href="<?php echo base_url('masterdata/users'); ?>"><button type="button" class="btn btn-danger">batal</button></a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>