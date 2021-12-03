<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Mobil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>datamobil">Mobil</a></li>
                        <li class="breadcrumb-item active">Data Mobil</li>
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
                            <a href="<?php echo base_url() ?>masterdata/add_mobil" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                Tambah Data Mobil
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
                                        <th>Nama Mobil</th>
                                        <th>Merek </th>
                                        <th>No Polisi</th>
                                        <th>Tahun Pembuatan</th>
                                        <th>Kapasitas</th>
                                        <th>Foto Mobil</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data_mobil as $mobil) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no = $no + 1 ?></td>
                                            <td><?php echo $mobil['nama_mobil'] ?></td>
                                            <td><?php echo $mobil['merek'] ?></td>
                                            <td><?php echo $mobil['nopol'] ?></td>
                                            <td><?php echo $mobil['tahun_buat'] ?></td>
                                            <td><?php echo $mobil['kapasitas'] ?></td>
                                            <td>
                                                <img src="<?php echo base_url() ?>/upload/mobil/<?php echo $mobil['img_mobil'] ?>" width="100">
                                            </td>


                                            <td>
                                                <a href="<?php echo base_url() ?>masterdata/edit_mobil/<?php echo sha1($mobil['id_mobil']) ?>" class="btn btn-icon btn-success" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-danger" title="Hapus" onclick="doDelete('<?php echo sha1($mobil['id_mobil']) ?>')">
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
                title: "Delete Data Mobil ?",
                text: "Data ini akan terhapus permanent",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
            .then(ok => {
                if (ok) {
                    window.location.href = '<?php echo base_url() ?>masterdata/hapusMobil/' + id;

                } else {
                    $(this).removeAttr('disabled')
                }
            })
    }
</script>