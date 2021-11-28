<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User Login</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome">Home</a></li>
                        <li class="breadcrumb-item active">Data User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div style="text-align: right;">
                            <a href="<?php echo base_url() ?>masterdata/add_users" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                Tambah Users
                            </a>
                        </div>

                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-users" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Email</th>
                                        <th>Role User</th>
                                        <th>Status User</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data_user as $user) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no = $no + 1 ?></td>
                                            <td><?php echo $user['email'] ?></td>
                                            <td>
                                                <?php
                                                if ($user['role'] == 1) {
                                                    echo 'Superadmin';
                                                } else {
                                                    echo 'Pelanggan';
                                                }

                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($user['isAktif'] == 1) {
                                                    echo 'Aktif';
                                                } else {
                                                    echo 'Non Aktif';
                                                }

                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() ?>masterdata/edit_users/<?php echo sha1($user['id_user']) ?>" class="btn btn-icon btn-success" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-danger" title="Hapus" onclick="doDelete('<?php echo sha1($user['id_user']) ?>')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script>
    function doDelete(id) {
        swal({
                title: "Delete Data Users ?",
                text: "Data ini akan terhapus permanent",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
            .then(ok => {
                if (ok) {
                    window.location.href = '<?php echo base_url() ?>masterdata/hapusUser/' + id;
                } else {
                    $(this).removeAttr('disabled')
                }
            })
    }
</script>