<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>transaksi/add_trx">Transaksi Mobil</a></li>
                        <li class="breadcrumb-item active">Form Transaksi</li>
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
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Data Peminjam</h3>
                        </div>
                        <!-- form start -->
                        <form action="<?php echo base_url('masterdata/simpan_data_pelanggan'); ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pelanggan Lama / Baru</label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="BARU">BARU</option>
                                        <option value="LAMA">LAMA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" cols="10" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>No Telefon</label>
                                    <input type="text" class="form-control" name="no_telfon" placeholder="Masukkan No Telefon" required>
                                </div>
                                <div class="form-group">
                                    <label>No KTP</label>
                                    <input type="text" class="form-control" name="no_ktp" placeholder="Masukkan KTP Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir Anda" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Anda" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin </label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="PRIA">PRIA</option>
                                        <option value="WANITA">WANITA</option>
                                    </select>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Data Transaksi Pinjam</h3>
                        </div>
                        <!-- form start -->
                        <form action="<?php echo base_url('masterdata/simpan_data_user'); ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Mobil</label>
                                    <select class="form-control" name="mobil" required>
                                        <option value="">-- Pilih Mobil --</option>
                                        <?php foreach ($data_mobil as $mobil) { ?>
                                            <option value="<?php echo $mobil['id_mobil'] ?>"><?php echo $mobil['nama_mobil'] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pinjam</label>
                                    <input type="date" class="form-control" name="tgl_pinjam" placeholder="Tanggal Pinjam">
                                </div>
                                <div class="form-group">
                                    <label>Metode Pembayaran</label>
                                    <select class="form-control" name="roleUser">
                                        <option value="CASH">CASH</option>
                                        <option value="NON CASH">NON CASH</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Durasi Pinjam Perhari</label>
                                    <input type="text" class="form-control" name="durasi_pinjam">
                                </div>
                                <div class="form-group">
                                    <label>Diskon %</label>
                                    <input type="text" class="form-control" name="diskon" readonly>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a class="btn btn-secondary" href="<?php echo base_url(); ?>transaksi/add_trx">Back</a>
                                <button type="submit" class="btn btn-primary">Save data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>