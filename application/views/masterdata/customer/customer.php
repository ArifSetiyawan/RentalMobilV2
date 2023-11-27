<!-- Content Wrapper. Contains page content -->
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome"><?php echo $prev_menu ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $active_menu ?></li>
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
                            <a href="<?php echo base_url() ?>masterdata/add_customer" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                Tambah Pengguna
                            </a>
                        </div>

                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-customers" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status Pengguna</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data_customer as $customer) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no = $no + 1 ?></td>
                                            <td><?php echo $customer['nama'] ?></td>
                                            <td><?php echo $customer['email'] ?></td>
                                            <td><?php echo $customer['role_name'] ?></td>
                                            <td>
                                                <?php if ($customer['isAktif'] == 1) { ?>
                                                    <div class="badge badge-success">Aktif</div>

                                                <?php } else { ?>
                                                    <div class="badge badge-danger">Non Aktif</div>

                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() ?>masterdata/edit_customer/<?php echo sha1($customer['Id_cust']) ?>" class="btn btn-icon btn-success btn-sm" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-danger btn-sm" title="Hapus" onclick="doDelete('<?php echo sha1($customer['Id_cust']) ?>')">
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