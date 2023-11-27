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
                            <a href="<?php echo base_url() ?>masterdata/add_bank" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                Tambah Bank
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
                                        <th>Nama Bank</th>
                                        <th>No. Rekening</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data_bank as $bank) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no = $no + 1 ?></td>
                                            <td><?php echo $bank['nama_bank'] ?></td>
                                            <td><?php echo $bank['no_rekening'] ?></td>
                                            <td>
                                                <a href="<?php echo base_url() ?>masterdata/edit_bank/<?php echo sha1($bank['Id_bank']) ?>" class="btn btn-icon btn-success" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-danger" title="Hapus" onclick="doDelete('<?php echo sha1($bank['Id_bank']) ?>')">
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
                title: "Delete Data Bank ?",
                text: "Data ini akan terhapus permanent",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
            .then(ok => {
                if (ok) {
                    window.location.href = '<?php echo base_url() ?>masterdata/hapusBank/' + id;
                } else {
                    $(this).removeAttr('disabled')
                }
            })
    }
</script>