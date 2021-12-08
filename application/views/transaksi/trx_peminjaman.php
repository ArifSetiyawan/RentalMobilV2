<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Transaksi Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome">Home</a></li>
                        <li class="breadcrumb-item active">Data Transaksi Peminjaman</li>
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
                                Tambah Transaksi
                            </a>
                        </div>

                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-trx" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Peminjam</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Nama Mobil</th>
                                        <th>Tahun Buat</th>
                                        <th>Pembayaran</th>
                                        <th>Durasi Pinjam</th>
                                        <th>Diskon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data_pinjam as $pinjam) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no = $no + 1 ?></td>
                                            <td><?php echo $pinjam['nama'] ?></td>
                                            <td><?php echo $pinjam['tgl_pinjam'] ?></td>
                                            <td><?php echo $pinjam['nama_mobil'] ?></td>
                                            <td><?php echo $pinjam['tahun_buat'] ?></td>
                                            <td><?php echo $pinjam['metode_pembayaran'] ?></td>
                                            <td><?php echo $pinjam['durasi_peminjaman'] ?></td>
                                            <td><?php echo $pinjam['diskon'] ?></td>
                                            <td>
                                                <a href="<?php echo base_url() ?>transaksi/edit_trx/<?php echo sha1($pinjam['id_pinjam']) ?>" class="btn btn-sm btn-success" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus" onclick="doDelete('<?php echo sha1($pinjam['id_pinjam']) ?>')">
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
                title: "Delete Data Transaksi ?",
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