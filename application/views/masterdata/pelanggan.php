<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pelanggan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome">Home</a></li>
                        <li class="breadcrumb-item active">Data Pelanggan</li>
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
                            <a href="<?php echo base_url() ?>masterdata/add_pelanggan" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                Tambah Pelanggan
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
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat </th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No telefon</th>
                                        <th>No KTP</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data_pelanggan as $pelanggan) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no = $no + 1 ?></td>
                                            <td><?php echo $pelanggan['nama'] ?></td>
                                            <td><?php echo $pelanggan['alamat'] ?></td>
                                            <td><?php echo $pelanggan['jenis_kelamin'] ?></td>
                                            <td><?php echo $pelanggan['tempat_lahir'] ?></td>
                                            <td><?php echo $pelanggan['tanggal_lahir'] ?></td>
                                            <td><?php echo $pelanggan['no_telfon'] ?></td>
                                            <td><?php echo $pelanggan['no_ktp'] ?></td>
                                            <td>
                                                <a href="<?php echo base_url() ?>masterdata/edit_pelanggan/<?php echo sha1($pelanggan['id_pelanggan']) ?>" class="btn btn-sm btn-success" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus" onclick="doDelete('<?php echo sha1($pelanggan['id_pelanggan']) ?>')">
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
                title: "Delete Data Pelanggan ?",
                text: "Data ini akan terhapus permanent",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
            .then(ok => {
                if (ok) {
                    window.location.href = '<?php echo base_url() ?>masterdata/hapusPelanggan/' + id;
                } else {
                    $(this).removeAttr('disabled')
                }
            })
    }
</script>